@extends('admin.index')

@section('content')
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />


<main>
    <div class="container-fluid px-4 my-3">
        <div class="card mb-4 col-md-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <a class="btn btn-success" href="{{ route('post.create') }}">Reset</a>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" data-bs-dismiss="alert">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Post Title:</label>
                        <input type="text" name="title" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Post Description:</label>
                        <textarea class="form-control" name="description"  id="message-text"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Post Image:</label>
                        <input type="file" class="form-control" name="image"  id="message-text">
                    </div>
                    <select class="form-select" id="select-category" data-placeholder="Choose anything" name="category">                        
                            <option>Select #</option>
                            @forelse ($categories as $category)                                
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @empty
                                
                            @endforelse
                        
                    </select>  
                    <select class="form-select" id="multiple-select-tags" data-placeholder="Choose anything" name="tag[]" multiple>
                        
                        <option>Select #</option>
                        @forelse ($tags as $tag)                                
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @empty
                            
                        @endforelse
                        
                    </select>  
            
                </div>
                    <input type="Submit" name="create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</main>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script>
    $( '#multiple-select-tags' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
    $( '#select-category' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
} );
</script>
@endsection
