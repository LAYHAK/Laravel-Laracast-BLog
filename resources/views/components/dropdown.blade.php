<div x-data="{show: false}" @click.away="show = false" class="relative">
    {{--Trigger--}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{--Dropdown--}}
    <div x-show="show" class="absolute py-2 w-full bg-gray-100 mt-2 rounded-xl z-50 overflow-auto max-h-52"
         style="display: none">
        {{ $slot}}
    </div>
</div>
