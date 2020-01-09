@extends('admin.layouts.dashboard')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Sn.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $perPage=$posts->perPage();
                    $currentPage=$posts->currentPage();
                    @endphp
                        @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ Form::bsCheckbox('post_id',$post->id,false) }}</td>
                            <td>{{ serialNumbers($perPage,$currentPage,$key) }}</td>
                            <td>{{ $post->title }}</td>
                            <td><span class="badge badge-{{ $post->status?'success':'warning' }}">{{ $post->status?'Published':'Draft' }}</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $posts->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection
