@props(['src','alt','img_class'])
<section class="mt-2">
    <div class="">
        <img src="{{$src}}" alt="" class="{{$img_class}}">
    </div>
    <div class="place-content-center">
        <input type="file" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}/>
    </div>
</section>
