@component('admin.components.bsComponents.card-collapse')
    @slot('title')
        Media
    @endslot
    <div class="featured_image-select">
    @if(!isset($imgUrl))
        <a href="#" data-toggle="modal" class="set_featured_image" data-target="#modal-xl">Set Featured Image</a>
    @else
        <img src="{{ $imgUrl }}" alt="Featured Image" class="img-fluid">
        <a href="#" class="featured_image-remove">Remove Image</a>
    @endif
    </div>

    <!-- /.modal -->
@endcomponent
