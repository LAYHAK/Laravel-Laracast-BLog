@props(['addMoreStyle'=>''])
<button type="submit"
    {{$attributes->merge(['class'=>"bg-blue-500 text-white uppercase font-semibold text-xs py-3 px-10 rounded-full $addMoreStyle  over:bg-blue-600"])}}
>

    {{$slot}}
</button>
