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

                        @include('admin.components.global.status',['status'=>true,'button'=>'Publish'])
                    @endcomponent
                </div>
            </div>

        {!! Form::close() !!}

    </div>
@endsection

@push('script')
    @include('admin.posts.script')
@endpush
