@extends('admin.layouts.dashboard')
@section('content')
    <div class="col-12">
        {!! Form::model($post, ['route' => ['post.update', $post],'method'=>'PATCH']) !!}
        {{ Form::bsText('title',$post->title,['class' => 'form-control form-control-lg',"placeholder"=>"Title"]) }}
         {!! Form::hidden('media_id', $post->getFirstMedia('featured')?$post->getFirstMedia('featured')->id:null, ['id' => 'media']) !!}
        <div class="row">
            <div class="col-md-8">
                {{ Form::bsTextarea('content',$post->content,["class"=>"form-control wysiwyg"]) }}
                <div class="card">
                    <div class="card-body">
                        {{ Form::bsTextarea('excerpt',$post->excerpt,["placeholder"=>"Short Description","rows"=>5],'Enter a short description') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @component('admin.components.bsComponents.card-collapse')
                    @slot('title')
                    Update Post
                    @endslot

                    @include('admin.components.global.status',['status'=>$post->status,'button'=>'Update'])
                @endcomponent
                @include('admin.components.global.media.card',['imgUrl'=>$post->getFirstMediaUrl('featured')?$post->getFirstMediaUrl('featured'):null])
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@push('script')
    @include('admin.posts.script')
@endpush
