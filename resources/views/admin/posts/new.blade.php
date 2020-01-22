@extends('admin.layouts.dashboard')

@section('content')
    <div class="col-12">
        {!! Form::open(['url' => route('post.store'),'id'=>'addPost']) !!}
            {{ Form::bsText('title',null,['class' => 'form-control form-control-lg',"placeholder"=>"Title"]) }}
            <div class="row">
                <div class="col-md-8">
                    {{ Form::bsTextarea('content',null,["class"=>"form-control wysiwyg"]) }}
                    <div class="card">
                        <div class="card-body">
                            {{ Form::bsTextarea('excerpt',null,["placeholder"=>"Short Description","rows"=>5],'Enter a short description') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @component('admin.components.bsComponents.card-collapse')
                        @slot('title')
                            Add new post
                        @endslot
                        @include('admin.components.global.status',['status'=>true,'button'=>'Publish'])
                    @endcomponent

                    @component('admin.components.bsComponents.card-collapse')
                        @slot('title')
                            Media
                        @endslot
                        <div class="select-featured_image">

                            <a href="#" data-toggle="modal" data-target="#modal-xl">Set Featured Image</a>
                        </div>

                            <!-- /.modal -->
                    @endcomponent
                </div>
            </div>

        {!! Form::close() !!}
    </div>
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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">Uploads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Media</a>
                            </li>
                        </ul>
                        <div class="tab-content upload-drop" id="myTabContent">
                            <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="home-tab">

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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-9 media-modal-body">

                                    </div>
                                    <div class="col-md-3 media-modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

@endsection

@push('script')
    @include('admin.posts.script')
    @include('admin.script')
@endpush
