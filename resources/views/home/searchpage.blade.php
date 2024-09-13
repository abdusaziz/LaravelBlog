<x-blog-page-header></x-blog-page-header>

<header class="masthead" style="background-image: url('assets/img/cooltech.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Cool Tech</h1>
                    <span class="subheading">Brings technology digestible informations</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Bar -->
<div class="container my-4">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <form action="{{ route('searchpage') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search by article, category, or tag">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-7">
            @if ($posts->isNotEmpty())
                @foreach ($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('viewpost', ['id' => $post->id]) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->shortdescription }}...</h3>
                        </a>
                        <span>Category : <a href="{{ route('categoryviewpage', $post->category->slug ) }}">{{ $post->category->title }}</a></span><br>
                        <span>Tags :</span>
                        @foreach ($post->tags as $tag)
                            <span class="badge rounded-pill text-bg-info"><a href="{{ route('tagviewpage', $tag->slug) }}">{{ $tag->title }}</a></span>
                        @endforeach
                        <p class="post-meta">Posted by <a href="#!">{{ $post->user_name }}</a> on {{ $post->created_at->format('M d, Y') }}</p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                {{ $posts->links('pagination::bootstrap-4') }}
            @else
                <p>No posts found for your search query.</p>
            @endif
        </div>
    </div>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($posts->isEmpty())
    <div class="alert alert-warning">
        No posts found matching your search.
    </div>
@endif

<x-blog-page-footer></x-blog-page-footer>
