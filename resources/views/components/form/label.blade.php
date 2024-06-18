@props(['id'=>''])
<label id="{{$id}}"
    {{$attributes->class([
        'form-label',
    ])}}
>
    {{$slot}}
</label>
