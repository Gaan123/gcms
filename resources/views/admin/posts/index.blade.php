@extends('admin.layouts.dashboard')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Total Posts:</strong> {{ $posts->total() }}</h3>

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
                        <th>{{ Form::bsCheckbox('all_posts',"SelectAll",false) }}</th>
                        <th>Sn.</th>
                        <th>
                            <a href="{{ sortUrl('title') }}" class="text-dark">
                                Title
                            <i class="fa fa-arrows-alt-v text-sm"></i>
                            </a>
                        </th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $key => $post)
                        @include('admin.posts._partials.tr',compact('post','posts'))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                @if (isset(request()->orderby))
                    {{ $posts->appends(['orderby'=>'title','order'=>isset(request()->order)?request()->order:'asc'])->links() }}
                @else
                    {{ $posts->links() }}
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">


                <div class="modal-body">
                    <p>Are you sure you wanna delete?</p>
                    <div class="d-inline">
                        <form action="" id="deleteForm" method="post">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger"  type="submit" value="Delete" />
                            <input class="btn btn-default" data-dismiss="modal" type="submit" value="Cancel" />
                        </form>

                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
