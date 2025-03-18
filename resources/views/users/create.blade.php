<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer un Utilisateur
        </h2>
    </x-slot> --}}

    <div class="max-w-3xl pt-16 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Créer un Utilisateur</h1>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="px-4 py-2 mt-1 block w-full rounded-md border-l-4 border-l-indigo-600 border-transparent shadow-lg focus:outline-none">
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="px-4 py-2 mt-1 block w-full rounded-md border-l-4 border-l-indigo-600 border-transparent shadow-lg focus:outline-none">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" required
                        class="px-4 py-2 mt-1 block w-full rounded-md border-l-4 border-l-indigo-600 border-transparent shadow-lg focus:outline-none">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('users.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">
                        Annuler
                    </a>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                        Créer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
