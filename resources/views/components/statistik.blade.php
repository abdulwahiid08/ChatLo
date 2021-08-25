    <a href="{{ route('profile', $getUser->username) }}" class="text-center ml-7 -mt-0.5" >
        <div class="text-xl font-semibold">{{ $getUser->statuses->count() }}</div>
        <div class="uppercase text-xs mt-0.5">Postingan</div>
    </a>
    <div class="px-5">
        <a href="{{ route('profile.follower', $getUser->username) }}" class="text-center">
            <div class="text-xl font-semibold">{{ $getUser->follower->count() }}</div>
            <div class="uppercase text-xs mt-0.5">Pengikut</div>
        </a>
    </div>
    <a href="{{ route('profile.following', $getUser->username) }}" class="text-center">
        <div class="text-xl font-semibold">{{ $getUser->following->count() }}</div>
        <div class="uppercase text-xs mt-0.5">Mengikuti</div>
    </a>
     {{-- Button Follow --}}
    @if (Auth::user()->isNot($getUser))
        <form action="{{ route('profile.follow', $getUser) }}" method="POST">
            @csrf
            <x-button class="ml-8 mt-0.5">
                @if (Auth::user()->following()->where('following_user_id', $getUser->id)->first())
                    Unfollow
                @else
                    Follow
                @endif
            </x-button>
        </form>
    @else
        <a href="{{ route('profile.edit', $getUser->username) }}" class="ml-8 mt-0.5 inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-xl text-xs text-white capitalize tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            Edit Profile
        </a>
    @endif


