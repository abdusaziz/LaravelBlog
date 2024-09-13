<x-blog-page-header></x-blog-page-header>
<base href="/">
<!-- Page Header-->
<header class="masthead" style="background-image: url('/post_images/{{$post->image}}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h3>{{ $post->title }}</h3>
                    <span class="subheading">{{ $post->title }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->description }}</p>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $post->user_name }}</a>
                    on {{ $post->created_at->format('M d, Y') }}
                </p>
                <span>Category : <a href="{{ route('categoryviewpage', $post->category->slug ) }}">{{ $post->category->title }}</a> </span></br>
                <span>Tags :</span>
                @forelse ($post->tags as $tag)                    
                    <span class="badge rounded-pill text-bg-info"><a href="{{ route('tagviewpage',$tag->slug) }}">{{ $tag->title }}</a></span>
                @empty                    
                <span class="badge rounded-pill text-bg-info"><a href="#">-</a></span>
                @endforelse
            </div>
        </div>        
    </div>

</main>
<x-blog-page-footer></x-blog-page-footer>
