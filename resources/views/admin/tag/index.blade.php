@extends('admin.index')
@section('pagecss')
<style>
    .img_resize {
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
                    Tags
                </div>
                <a class="btn btn-primary" href="{{ route('tag.create') }}">Create New</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Created On</th>
                            <th>Title</th>
                            <th>MetaTtile</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Created On</th>
                            <th>Title</th>
                            <th>MetaTtile</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ( $tags as $tag)
                        <tr>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->title}}</td>
                            <td>{{$tag->metatitle}}</td>
                            <td>{{$tag->slug}}</td>
                            <td>{{$tag->content}}</td>
                            <td>
                                <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('tag.destroy',$tag->id) }}" method="POST" class="">
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
                        </tr>
                        @endforelse

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $tags->links('pagination::bootstrap-4') }}
                    <!-- Use paginated categories -->
                </div>
            </div>
        </div>
    </div>


</main>


@endsection
