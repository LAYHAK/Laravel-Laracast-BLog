@props(['name'])
<section>
    <x-form.label name="{{$name}}"/>
    <input name="{{$name}}" id="{{$name}}"
           class="w-full px-3 py-2 border rounded-md dark:border-gray-700 dark:bg-gray-100 dark:text-gray-800"
        {{--           value="{{($type != 'password') ? old($name) : null}}"--}}
        {{$attributes(['value'=>old($name)])}}
    >
    <x-form.error name="{{$name}}"/>
</section>
