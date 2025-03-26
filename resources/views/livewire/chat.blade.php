<div class="py-5">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-10">
        <div class="flex mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>              
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $user->name }}</h2>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-[500px]">
            <div class="flex h-full">
                <div class="flex-1 flex flex-col">
                    <div id="messages-container"  class="flex-1 overflow-y-auto p-4 space-y-4">
                        @foreach($messages as $message)
                            <div class="{{ $message->user_id === auth()->id() ? 'text-right' : 'text-left' }}">
                                <div class="{{ $message->user_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200' }} inline-block p-3 rounded-lg max-w-[70%]">
                                    <p>{{ $message->message }}</p>
                                    <small class="opacity-70">{{ $message->created_at->format('g:i A') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="p-4 border-t">
                        <div class="flex rounded-lg">
                            <input wire:model.live="message" wire:keydown.enter="sendMessage" type="text" placeholder="Type your message..." class="py-[10px] sm:py-3 px-4 block w-full border-gray-200 rounded-s-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                            <button wire:click="sendMessage" type="button" class="size-12 shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <line x1="22" x2="11" y1="2" y2="13" />
                                    <polygon points="22 2 15 22 11 13 2 9 22 2" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    Livewire.on('latestMessages', () => {
        setTimeout(scrollToBottom, 50);
    });

    function scrollToBottom() {
        const container = document.getElementById('messages-container');
        container.scrollTo({
            top: container.scrollHeight,
            behavior: 'smooth'
        });
    }
</script>