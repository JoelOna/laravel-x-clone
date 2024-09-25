<form action="{{route('post.store')}}" method="post">
    @csrf
    <label for="description">
        Description
    </label>
    <text-area></text-area>
    <button type="submit">Submit</button>
</form>

 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror