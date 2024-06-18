@props([
    'name','value' => ''
])
<textarea
    name="{{$name}}"
    rows="4"
    {{$attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ])}};
>{{old($name,$value)}}</textarea>

<x-form.validation-feedback :name="$name" />
