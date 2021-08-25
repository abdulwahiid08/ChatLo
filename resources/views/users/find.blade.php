<x-app-layout title="Find User">
    <x-container>
        <form action="{{ route('users.search') }}" method="POST" class="flex mb-10">
            @csrf
            <div>
                <x-input id="cari" class="block" type="text" name="cari" placeholder="Search user..." value="{{ old('cari') }}"/>
            </div>
            <div class="ml-2 mt-0.5">
                <x-button id="btnCari" name="btnCari">Search</x-button>
            </div>
        </form>
         <div class="grid grid-cols-4 gap-6">
                @foreach ($getUser as $user)
                    <div class="flex border rounded-xl p-5 bg-white">
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
                            {{-- Button Follow --}}
                            <form action="{{ route('profile.follow', $user) }}" method="POST">
                                @csrf
                                <x-button class="mt-2">
                                    @if (Auth::user()->following()->where('following_user_id', $user->id)->first())
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    @endif
                                </x-button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Menampilkan Pagination --}}
            <div class="mt-16">
                {{ $getUser->links() }}
            </div>
    </x-container>
</x-app-layout>
