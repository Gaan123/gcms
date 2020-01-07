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
                    <div class="card">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}

    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert( "Form successful submitted!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
