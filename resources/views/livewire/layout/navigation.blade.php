<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 800 800" fill="none">
                            <path d="M572.8 193.6C606.4 236.8 625.6 291.2 625.6 350.4C625.6 492.8 510.4 608 368 608C328 608 291.2 598.4 257.6 582.4L246.4 593.6V689.6L305.6 630.4C339.2 646.4 376 656 416 656C558.4 656 673.6 540.8 673.6 398.4C673.6 315.2 633.6 241.6 572.8 193.6Z" fill="#4DE0F9"/>
                            <path d="M220.8 697.6V580.8C164.8 529.6 132.8 457.6 132.8 382.4C132.8 235.2 252.8 115.2 400 115.2C547.2 115.2 667.2 235.2 667.2 382.4C667.2 529.6 547.2 649.6 400 649.6C363.2 649.6 326.4 641.6 291.2 625.6L220.8 697.6ZM400 134.4C264 134.4 152 244.8 152 382.4C152 452.8 182.4 521.6 236.8 568L240 571.2V649.6L288 601.6L294.4 604.8C328 620.8 363.2 628.8 400 628.8C536 628.8 648 518.4 648 380.8C648 243.2 536 134.4 400 134.4Z" fill="#0D5FC3"/>
                            <path d="M246.4 243.2L232 230.4C238.4 222.4 246.4 216 254.4 209.6L267.2 224C260.8 230.4 252.8 236.8 246.4 243.2Z" fill="#4DE0F9"/>
                            <path d="M196.8 339.2L177.6 336C184 305.6 196.8 278.4 214.4 252.8L230.4 264C214.4 286.4 203.2 312 196.8 339.2Z" fill="#4DE0F9"/>
                            <path d="M304 376C302.4 376 302.4 376 300.8 376C299.2 387.2 291.2 395.2 280 396.8C280 398.4 280 398.4 280 400C280 412.8 291.2 424 304 424C316.8 424 328 412.8 328 400C328 387.2 316.8 376 304 376Z" fill="#4DE0F9"/>
                            <path d="M416 376C414.4 376 414.4 376 412.8 376C411.2 387.2 403.2 395.2 392 396.8C392 398.4 392 398.4 392 400C392 412.8 403.2 424 416 424C428.8 424 440 412.8 440 400C440 387.2 428.8 376 416 376Z" fill="#4DE0F9"/>
                            <path d="M528 376C526.4 376 526.4 376 524.8 376C523.2 387.2 515.2 395.2 504 396.8C504 398.4 504 398.4 504 400C504 412.8 515.2 424 528 424C540.8 424 552 412.8 552 400C552 387.2 540.8 376 528 376Z" fill="#4DE0F9"/>
                            <path d="M292.8 420.8C273.6 420.8 259.2 406.4 259.2 387.2C259.2 368 273.6 353.6 292.8 353.6C312 353.6 326.4 368 326.4 387.2C326.4 406.4 310.4 420.8 292.8 420.8ZM292.8 372.8C284.8 372.8 278.4 379.2 278.4 387.2C278.4 395.2 284.8 401.6 292.8 401.6C300.8 401.6 307.2 395.2 307.2 387.2C307.2 379.2 300.8 372.8 292.8 372.8Z" fill="#0D5FC3"/>
                            <path d="M403.2 420.8C384 420.8 369.6 406.4 369.6 387.2C369.6 368 384 353.6 403.2 353.6C422.4 353.6 436.8 368 436.8 387.2C436.8 406.4 422.4 420.8 403.2 420.8ZM403.2 372.8C395.2 372.8 388.8 379.2 388.8 387.2C388.8 395.2 395.2 401.6 403.2 401.6C411.2 401.6 417.6 395.2 417.6 387.2C417.6 379.2 411.2 372.8 403.2 372.8Z" fill="#0D5FC3"/>
                            <path d="M515.2 420.8C496 420.8 481.6 406.4 481.6 387.2C481.6 368 496 353.6 515.2 353.6C534.4 353.6 548.8 368 548.8 387.2C548.8 406.4 532.8 420.8 515.2 420.8ZM515.2 372.8C507.2 372.8 500.8 379.2 500.8 387.2C500.8 395.2 507.2 401.6 515.2 401.6C523.2 401.6 529.6 395.2 529.6 387.2C529.6 379.2 523.2 372.8 515.2 372.8Z" fill="#0D5FC3"/>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
