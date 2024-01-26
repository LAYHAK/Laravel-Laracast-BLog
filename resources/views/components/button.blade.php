@props(['background'=>'bg-blue-500','url'=>'/','label'=>'default','text'=>'text-white'])
<a href="{{$url}}"
    {{$attributes->merge( ['class'=>"$background ml-3 rounded-full text-xs font-semibold $text capitalize py-3 px-5"]) }}>
    {{$label}}
</a>
