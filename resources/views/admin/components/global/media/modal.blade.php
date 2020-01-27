{{--@dd($medias)--}}
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl media-modal">
        <div class="modal-content">
            <div class="modal-body">
                <div class="media-head">
                    <h3 class="d-inline">Media</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">Uploads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Media</a>
                    </li>
                </ul>
                <div class="tab-content upload-drop" id="myTabContent">
                    <div class="tab-pane fade" id="upload" role="tabpanel" aria-labelledby="home-tab">

                        <form action="{{ route('media.upload') }}" class="dropzone" id="dropUpload">
                            @csrf
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-details">
                                    <div class="dz-filename"><span data-dz-name></span></div>
                                    <div class="dz-size" data-dz-size></div>
                                    <img data-dz-thumbnail />
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                <div class="dz-success-mark"><span>✔</span></div>
                                <div class="dz-error-mark"><span>✘</span></div>
                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-9 media-modal-body">
                                <div class="row">
                                    @foreach($medias as $media)
                                    <div class="col-md-2">
                                        <div class="custom-control custom-checkbox image-checkbox">
                                            <input type="radio"
                                                   name="media"
                                                   value="{{ $media->id }}"
                                                   class="custom-control-input media-image"
                                                   id="media{{$media->id}}"
                                                   data-image="{{$media->getUrl()}}"
                                                    data-title="{{ $media->name }}">
                                            <label class="custom-control-label" for="media{{$media->id}}">
                                                <img src="{{$media->getUrl()}}" alt="{{$media->name}}" class="img-fluid">
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-3 media-modal-body border-left">
                                <div class="media-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary set-image" data-dismiss="modal">Set Featured Image</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--
<div class="custom-control custom-checkbox image-checkbox">
    <input type="checkbox" class="custom-control-input" id="ck1a">
    <label class="custom-control-label" for="ck1a">
        <img src="https://source.unsplash.com/640x426/?fitness" alt="#" class="img-fluid">
    </label>
</div>

<div class="custom-control custom-radio image-checkbox">
    <input type="radio" class="custom-control-input" id="ck2a" name="ck2">
    <label class="custom-control-label" for="ck2a">
        <img src="https://source.unsplash.com/640x426/?people" alt="#" class="img-fluid">
    </label>
</div>--}}
@push('script')
    <script>
        //image selected
        $('.media-image').change(function (e) {
            let name=$(this).data('title');
            $('.media-info').html(`<p>${name}</p><a href="{{ route('media.upload') }}">delete image</a>`)
        })
    </script>

@endpush
