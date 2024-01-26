@props(['name'])
<section>
    <x-form.label name="{{$name}}"/>
    <textarea id="{{$name}}" rows="4" name="{{$name}}"
              class="block p-2.5 w-full text-sm text-gray-700  bg-gray-50 rounded-lg border border-gray-700 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-50 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Write your thoughts here...">{{$slot??old('$name')}} </textarea>
    <x-form.error name="{{$name}}"/>
</section>
