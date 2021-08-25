<x-app-layout title="Timeline">
    {{-- <x-slot name=header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot> --}}
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-7">
                <div class="border rounded-xl p-5 bg-white mb-5">
                    <form action="{{ route('status.create') }}" method="POST">
                        @csrf
                        <div class="flex">
                            {{-- Membuat kelas flex-shrink- 0 supaya image nya tidak gepeng atau tetap bulat --}}
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold mr-1" style="color: indianred">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea  class="bg-grey-400 form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration" name="body" id="body" placeholder="What is on your mind?"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="space-y-3">
                    @foreach ($getStatus as $status)
                        <div class="border rounded-xl p-5 shadow bg-white">
                            <div class="flex"> <!--  border-b-2 mb-4 -->
                                {{-- Membuat kelas flex-shrink- 0 supaya image nya tidak gepeng atau tetap bulat --}}
                                <a href="{{ route('profile', $status->author->username) }}">
                                    <div class="flex-shrink-0 mr-3">
                                        <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $status->author->name }}">
                                    </div>
                                <div>
                                    <div class="flex">
                                        <div class="font-semibold mr-1" style="color: indianred">
                                            {{ $status->author->name }}
                                        </div>
                                </a>
                                        <div class="text-sm  text-gray-500 mt-0.5">
                                            <p>@<span>{{ $status->author->username }}</span></p>
                                        </div>
                                    </div>
                                    <div class="leading-relaxed">
                                        {{ $status->body }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        {{ $status->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Jika follower ada, maka dia akan muncul --}}
            @if (Auth::user()->following()->count())
                <div class="col-span-5 ml-2">
                    <div class="border p-5 rounded-xl bg-white">
                        <h1 class="font-semibold mb-5">Your new friend</h1>
                        <div class="space-y-5">
                            @foreach (Auth::user()->following()->limit(5)->get() as $user)
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
                                        <div class="text-sm text-gray-600 mt-0.5">
                                            {{ $user->pivot->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="ml-5 text-xs text-gray-600">
                                {{ __('Cristiano Ronaldo dan +2 lainnya') }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>





                            {{-- <div class="grid grid-cols-3 justify-items-center text-gray-600 text-sm">
                                <div>
                                    Suka
                                </div>
                                <div>
                                    <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                        Komentar
                                    </span>

                                </div>
                                <div>
                                    Bagikan
                                </div>
                            </div> --}}
