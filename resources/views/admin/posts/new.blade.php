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
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add new post</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::bsToggle('status',true,["id"=>"publishStatus"],'Publish Status:') }}
                            <input type="submit" class="btn btn-block btn-info" value="Publish">
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </div>

                </div>
            </div>

        {!! Form::close() !!}

    </div>
@endsection

@push('script')
    @include('admin.posts.script')
@endpush
