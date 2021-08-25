<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold">Change Your Password</h1>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-3">
            <form action="{{ route('pass.update') }}" method="POST">
                @csrf
                @method('put')
                <div>
                    <x-label class="mt-3" for="current_password" :value="__('Current password')" />

                    <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required autofocus />
                </div>

                <!-- Username -->
                <div>
                    <x-label class="mt-3" for="password" :value="__('New password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                </div>

                <x-button class="mt-3">Update</x-button>
            </form>
        </div>
    </x-container>
</x-app-layout>
