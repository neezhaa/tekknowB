<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex h-[500px]">

                <aside class="w-64 border-r p-4 bg-gray-50 flex flex-col">
                    <h3 class="font-semibold mb-4">Chat</h3>
                    
                    <h4 class="mb-2 text-sm font-semibold text-gray-600">Groups</h4>
                    <a href="{{ route('chat.group') }}" 
                       class="flex items-center p-2 hover:bg-gray-100 rounded-lg 
                              {{ request()->routeIs('chat.group') ? 'bg-blue-50 font-medium' : '' }}">
                        <span class="w-2 h-2 bg-gray-900 rounded-full mr-2"></span>
                        Group Chat
                    </a>
                    
                    <div class="mt-6 flex-1 overflow-y-auto">
                        <h4 class="mb-2 text-sm font-semibold text-gray-600">Users</h4>
                        <div class="space-y-1">
                            @foreach($users->where('id', '!=', Auth::id()) as $user)
                                <a href="{{ route('chat.private', $user->id) }}" 
                                   class="flex items-center p-2 hover:bg-gray-100 rounded-lg 
                                          {{ request()->routeIs('chat.private') && request()->route('id') == $user->id ? 'bg-blue-50 font-medium' : '' }}">
                                    <span class="w-2 h-2 bg-gray-900 rounded-full mr-2"></span>
                                    {{ $user->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>


                <div class="flex-1 flex flex-col">
                    @if(request()->routeIs('chat.group'))
                        <livewire:chatcomponent />
                    @elseif(request()->routeIs('chat.private'))
                        <livewire:privatechatcomponent :recipientId="request()->route('id')" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>