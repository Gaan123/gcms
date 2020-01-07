
<div class="form-group">
    @if ($label)
        {{ Form::label($name, $label, ['class' => 'control-label']) }}
    @endif
        {{ Form::textarea($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
