<form action="{{route('post.store')}}" method="post">
    @csrf
    <text-area :name="'description'"></text-area>
    <button type="submit">Submit</button>
</form>

 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror