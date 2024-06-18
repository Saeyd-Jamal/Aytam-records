@props([
    'type'=>'button'
])
<button
    type={{$type}}"
    {{$attributes->class([
        'btn',
    ])}}
>

    {{$slot}}
</button>
