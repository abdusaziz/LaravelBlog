@extends('admin.index')
@section('pagecss')
<style>
  .img_resize{
    width: 75px;
    height: 50px;
  }
</style>
@endsection
@section('content')

<main>
    <div class="container-fluid px-4 my-3">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <a class="btn btn-primary" href="{{ route('post.create') }}">Create New</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Posted On</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Post By</th>
                            <th>Status</th>
                            <th>User Type</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Posted On</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Post By</th>
                            <th>Status</th>
                            <th>User Type</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ( $posts as $post)
                        <tr>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->user_name}}</td>
                            <td>{{$post->post_status}}</td>
                            <td>{{$post->usertype}}</td>
                            <td> <img src="{{asset('post_images/'.$post->image)}}" class="img_resize" alt="post image"> </td>
                            <td>
                                <form action="{{ route('post.edit',$post->id) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="Submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
