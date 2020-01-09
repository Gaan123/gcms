
<div class="form-group d-flex">
    @if ($label)
        <span class="mr-2 text-bold">{{ $label }}</span>
    @endif
    <div class="custom-control custom-switch">
        {{Form::checkbox($name, 1, $checked,array_merge(['class' => 'custom-control-input'], $attributes))}}
        <label class="custom-control-label" for="{{$attributes['id']}}" style="cursor: pointer"></label>
    </div>
</div>
