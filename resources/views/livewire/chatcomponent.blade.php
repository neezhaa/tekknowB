<?php

use App\Models\Message;
use function Livewire\Volt\{state, mount};

state(['messages'=>[]]);
state(['message'=>'']);
mount(function(){
    $this->messages = Message::whereNull('recipient_id')->get();
});

$send = function(){
    Message::create([
        'message'=>$this->message, 
        'user_id'=>Auth::user()->id, 
        'recipient_id' => null
    ]);
    $this->reset('message');
    $this->messages = Message::whereNull('recipient_id')->get();
}
?>

<div class="flex h-full">
    <div class="flex-1 flex flex-col">
        <div class="flex-1 overflow-y-auto p-4 space-y-4">
            @foreach ($messages as $message)
                <div class="{{ $message->user_id === auth()->id() ? 'text-right' : 'text-left' }}">
                    <div class="{{ $message->user_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200' }} inline-block p-3 rounded-lg max-w-[70%]">
                        <p>{{ $message->message }}</p>
                        <small class="opacity-70 text-xs">{{$message->user->name}} {{ $message->created_at->format('g:i A') }}</small>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="p-4 border-t">
            <div class="flex rounded-lg">
                <input wire:model="message" type="text" placeholder="Type your message..." class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-s-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <button wire:click="send" type="button" class="size-12 shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <line x1="22" x2="11" y1="2" y2="13" />
                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
