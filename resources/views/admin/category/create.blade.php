@extends('admin.index')

@section('content')

<main>
    <div class="container-fluid px-4 my-3">
        <div class="card mb-4 col-md-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Create Category
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" data-bs-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Category Title:</label>
                        <input type="text" name="title" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Meta Title:</label>
                        <input type="text" name="metatitle" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Salg:</label>
                        <input type="text" name="slug" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">content:</label>
                        <input type="text" name="content" class="form-control" id="recipient-name">
                    </div>

                    <input type="Submit" name="create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
