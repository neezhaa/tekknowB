<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends Component
{
    public $user;
    public $message;
    public $senderId;
    public $recipientId;
    public $messages;

    public function mount($userId)
    {
        $this->user = $this->getUser($userId);
        $this->senderId = Auth::user()->id;
        $this->recipientId = $userId;
        $this->messages = $this->loadMessages();

        $this->dispatch('latestMessages');
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function getUser($userId)
    {
        return User::find($userId);
    }

    public function sendMessage()
    {
        $sentMessage = $this->saveMessage();

        $this->messages[] = $sentMessage;

        broadcast(new MessageSent($sentMessage))->toOthers();

        $this->message = null;

        $this->dispatch('latestMessages');
    }

    #[On('echo-private:chat.{senderId},MessageSent')]

    public function listenMessage($event)
    {
        $newMessage = Message::find($event['message']['id'])->load('user:id,name', 'recipient:id,name');
        $this->messages[] = $newMessage; 

        $this->dispatch('latestMessages');
    }

    public function saveMessage()
    {
        return Message::create([
            'user_id' => $this->senderId,
            'recipient_id' => $this->recipientId,
            'message' => $this->message
        ]);
    }

    public function loadMessages()
    {
        return Message::with('user:id,name', 'recipient:id,name')
            ->where(function ($query) {
                $query->where('user_id', $this->senderId)
                    ->where('recipient_id', $this->recipientId);
            })
            ->orWhere(function ($query) {
                $query->where('user_id', $this->recipientId)
                    ->where('recipient_id', $this->senderId);
            })
            ->get();
    }
}