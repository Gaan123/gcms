@php
    $perPage=$posts->perPage();
    $currentPage=$posts->currentPage();
@endphp
<tr>
    <td>{{ Form::bsCheckbox('post_id',$post->id,false,["class"=>"custom-control-input post_ids"]) }}</td>
    <td>{{ serialNumbers($perPage,$currentPage,$key) }}</td>
    <td>{{ $post->title }}</td>
    <td><span class="badge badge-{{ $post->status?'success':'warning' }}">{{ $post->status?'Published':'Draft' }}</span></td>
    <td>{{ $post->created_at->diffForHumans() }}</td>
    <td>
        <a class="text-truncate" href="{{route('post.edit',$post->id)}}">
            <i class="fas fa-edit"></i>
        </a>
        <a class="text-orange delete-item" href="#" data-route="{{ route('post.destroy',$post->id) }}" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
