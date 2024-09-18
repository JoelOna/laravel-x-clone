@props(['src','alt'])
<section class="grid grid-cols-2 mt-2">
    <div class="">
        <img src="{{$src}}" alt="" class="w-36 h-36 rounded-full border border-gray-700 object-contain">
    </div>
    <div class="place-content-center">
        <input type="file" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}/>
    </div>
</section>
