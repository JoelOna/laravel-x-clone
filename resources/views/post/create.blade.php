<form action="{{route('post.store')}}" method="post">
    @csrf
    <label for="description">
        Description
    </label>
    <textarea type="text" name="description" placeholder="What are you thinking about?" class="w-full"></textarea>
    <button type="submit">Submit</button>
</form>

 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror