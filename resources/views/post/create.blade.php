<form action="{{route('post.store')}}" method="post">
    @csrf
    <label for="description">
        Description
        <input type="text" name="description">
    </label>
    <button type="submit">Submit</button>
</form>

 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror