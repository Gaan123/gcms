
<div class="form-group">
    @if ($label)
        {{ Form::label($name, null, ['class' => 'control-label']) }}
    @endif
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
