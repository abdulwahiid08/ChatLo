<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold">Update Your Profile</h1>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-3">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('put')
                <div>
                    <x-label class="mt-3" for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', Auth::user()->name)" required autofocus />
                </div>

                <!-- Username -->
                <div>
                    <x-label class="mt-3" for="username" :value="__('Username')" />

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username', Auth::user()->username)" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', Auth::user()->email)" required />
                </div>

                <x-button class="mt-3">Update</x-button>
            </form>
        </div>
    </x-container>
</x-app-layout>
