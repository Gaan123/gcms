
<div class="custom-control custom-checkbox">
    {{Form::checkbox($name, $value, $checked,array_merge(['class' => 'custom-control-input','id'=>"customCheckbox".$value], $attributes))}}
    <label for="customCheckbox{{$value}}" class="custom-control-label"></label>
</div>
