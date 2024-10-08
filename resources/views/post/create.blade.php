<div>
    <section class="border-b">
        <user-card :user="{{$user}}"></user-card>
    </section>
    <div class="w-12/12 mx-4 mt-4">
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <text-area :name="'description'"></text-area>
            <div class="flex justify-between place-content-center mt-2 mb-4">
                {{-- <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-photo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" /></svg> --}}
                <button class="btn text-white bg-blue-400 px-6 py-1 rounded-2xl hover:bg-blue-500 hover:transition-all transition-all" type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>

 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror