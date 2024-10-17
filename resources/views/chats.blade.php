@yield('styles')
@stack('scripts')
@vite(['resources/css/app.css','resources/js/app.js'])

<div id="app" class="grid grid-cols-4 h-screen">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
     </button>
    <div class="col-span-1 h-full bg-gray-50 dark:bg-black border-r" id="default-sidebar">
        <div class="flex flew-wrap-items-center mx-auto p-4 dark:text-white">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7l-5 5l5 5" /><path d="M17 7l-5 5l5 5" /></svg>
            <a href="{{route('home')}}">Go back</a>
        </div>
        <search-result :users="{{ json_encode($chats) }}" :chat="true" @select-chat="selectChat" />
    </div>

    <div class="col-span-3 h-full bg-white dark:bg-black" v-if="selectedChat">
        <div class="flex items-center gap-4 p-4 border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-black">
            <img :src="selectedChat.user_img" alt="" class="w-12 h-12 rounded-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                @{{ selectedChat.name }}
            </h2>
        </div>

        <div class="py-4 px-6 flex-grow overflow-y-auto">
            <div class="chat-content bg-white dark:bg-black p-6 rounded shadow">
                <chat-component
                   :friend="selectedChat"
                   :current-user="{{ auth()->user() }}"
                   :key="selectedChat.id"
                />
            </div>
        </div>
    </div>

    <div class="col-span-3 h-full flex items-center justify-center bg-gray-100 dark:bg-black" v-else>
        <p class="text-gray-500 dark:text-gray-400">Select a chat to start the conversation</p>
    </div>
</div>
