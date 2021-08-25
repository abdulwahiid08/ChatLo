<x-app-layout title="More">
    <div class="-mt-10 py-14 border-b-2 border-blue-500">
        <x-container>
            <div class="flex items-center">
                <div class="flex-shrink-0 mr-3">
                    <img class="rounded-full w-16 h-16 border-2 border-blue-500 p-1" src="{{ $getUser->gravatar() }}" alt="{{ $getUser->name }}">
                </div>
                <div>
                    <h1 class="font-semibold" >{{ $getUser->name }}</h1>
                    <div class="text-sm text-gray-500">
                        {{ $getUser->created_at->diffForHumans() }}
                    </div>
                </div>
                {{-- Menampilkan Postingan, follower and following --}}
                <x-statistik :getUser="$getUser"></x-statistik>
            </div>
        </x-container>
    </div>
    <div class="mt-10">
        <x-container>
            <div class="grid grid-cols-4 gap-5">
                @foreach ($following as $user)
                    <div class="flex ">
                        <a href="{{ route('profile', $user->username) }}">
                        <div class="flex-shrink-0 mr-3">
                            <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
                        </div>
                        <div>
                            <div class="font-semibold" style="color: indianred">
                                {{ $user->name }}
                            </div>
                        </a>
                            <div class="text-sm text-gray-500 -mt-0.5">
                                    <p>@<span>{{ $user->username }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-container>
    </div>
</x-app-layout>
