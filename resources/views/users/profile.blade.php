<x-app-layout title="Profile">
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
            <div class="grid grid-cols-3 gap-5">
                @foreach ($statuses as $status)
                    <div class="border rounded-xl p-5 shadow bg-white">
                        <div class="flex">
                            {{-- Membuat kelas flex-shrink- 0 supaya image nya tidak gepeng atau tetap bulat --}}
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $status->author->name }}">
                            </div>
                            <div>
                                <div class="flex">
                                    <div class="font-semibold mr-1" style="color: indianred">
                                        {{ $status->author->name }}
                                    </div>
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
        </x-container>
    </div>
</x-app-layout>


{{--
 <x-container>
            <div class="flex">
                <div class="px-10 py-3 text-center border-2 border-blue-400 rounded-lg ">
                    <div class="text-xl font-semibold">{{ $getUser->statuses->count() }}</div>
                    <div class="uppercase text-xs mt-1">Postingan</div>
                </div>
                <div class="px-5">
                    <div class="px-10 py-3 text-center border border-blue-400 rounded-lg">
                        <div class="text-xl font-semibold">{{ $getUser->following->count() }}</div>
                        <div class="uppercase text-xs mt-1">Pengikut</div>
                    </div>
                </div>
                <div class="px-10 py-3 text-center border border-blue-400 rounded-lg">
                    <div class="text-xl font-semibold">{{ $getUser->follower->count() }}</div>
                    <div class="uppercase text-xs mt-1">Mengikuti</div>
                </div>
            </div>
        </x-container> --}}
