@yield('styles')
@stack('scripts')
@vite(['resources/css/app.css','resources/js/app.js'])

<div id="app" class="grid grid-cols-4 h-screen">
    <div class="col-span-1 h-full bg-gray-50 dark:bg-black">
        <div class="flex flew-wrap-items-center mx-auto p-4">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7l-5 5l5 5" /><path d="M17 7l-5 5l5 5" /></svg>
            <a href="{{route('home')}}">Go back</a>
        </div>
        <ul>
            @foreach ($chats as $chat)
                <li class="w-full p-4 rounded hover:bg-gray-200 dark:hover:bg-gray-700 group cursor-pointer"
                    @click="selectChat({{ json_encode($chat) }})">
                    <div class="flex items-center gap-4">
                        <img src="{{$chat->user_img}}" alt="" class="w-10 h-10 rounded-full">
                        <span class="text-gray-800 dark:text-gray-200">{{ $chat->name }}</span>
                    </div>  
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-span-3 h-full bg-white dark:bg-gray-800" v-if="selectedChat">
        <div class="flex items-center gap-4 p-4 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-900">
            <img :src="selectedChat.user_img" alt="" class="w-12 h-12 rounded-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                @{{ selectedChat.name }}
            </h2>
        </div>

        <div class="py-4 px-6 flex-grow overflow-y-auto">
            <div class="chat-content bg-white dark:bg-gray-800 p-6 rounded shadow">
                <chat-component
                   :friend="selectedChat"
                   :current-user="{{ auth()->user() }}"
                   :key="selectedChat.id"
                />
            </div>
        </div>
    </div>

    <div class="col-span-3 h-full flex items-center justify-center bg-gray-100 dark:bg-gray-900" v-else>
        <p class="text-gray-500 dark:text-gray-400">Select a chat to start the conversation</p>
    </div>
</div>
