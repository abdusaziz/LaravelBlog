<x-blog-page-header></x-blog-page-header>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Tags View</h1>
                    <span class="subheading">tags as follows.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-7">
                @forelse ($posts as $post)
                    <!-- Post preview-->
                <div class="post-preview">
                <a href="{{ route('viewpost', ['id' => $post->id]) }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <h3 class="post-subtitle">{{ $post->shortdescription }}...</h3>
                    </a>
                    <span>Category : <a href="{{ route('categoryviewpage', $post->category->slug ) }}">{{ $post->category->title }}</a> </span></br>
                <span>Tags :</span>
                @forelse ($post->tags as $tag)                    
                    <span class="badge rounded-pill text-bg-info"><a href="{{ route('tagviewpage',$tag->slug) }}">{{ $tag->title }}</a></span>
                @empty                    
                <span class="badge rounded-pill text-bg-info"><a href="#">-</a></span>
                @endforelse
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{ $post->user_name }}</a>
                        on {{ $post->created_at->format('M d, Y') }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @empty
                <h2 class="post-title">No post found.</h2>
                @endforelse
                <!-- Pager-->
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header fw-bold">
                        Tags
                    </div>
                    <div class="card-body">
                        @forelse ($tags as $tag)                        
                        <a class="badge rounded-pill text-bg-primary" href="{{ route('tagviewpage',$tag->slug) }}">{{ $tag->title }}</a>
                        @empty
                        <a class="badge rounded-pill text-bg-primary" href="#">None</a>                        
                        @endforelse
    
                    </div>
    
                </div>
                <br>
                <div class="card">
                    <div class="card-header fw-bold">
                        Categories
                    </div>
    
                    <ol class="list-group">
                        @forelse ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <a href="{{ route('categoryviewpage',$category->slug) }}" class="ms-2 me-auto ">{{ $category->slug }}</a>
                            <span class="badge bg-primary rounded-pill"></span>
                        </li>
                        @empty
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <a href="#" class="ms-2 me-auto ">None</a>
                            <span class="badge bg-primary rounded-pill">0</span>
                        </li>
                        @endforelse
                    </ol>
                </div>
                <br>
                
            </div>
        </div>
    </div>
</main>
<x-blog-page-footer></x-blog-page-footer>
