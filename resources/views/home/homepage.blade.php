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

<!-- Main Content-->
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
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $post->user_name }}</a>
                    on {{ $post->created_at->format('M d, Y') }}
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @empty
                
            @endforelse
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                    →</a></div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header fw-bold">
                    Categories
                </div>

                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="#" class="ms-2 me-auto ">Subheading</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="#" class="ms-2 me-auto ">Subheading</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="#" class="ms-2 me-auto ">Subheading</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="#" class="ms-2 me-auto ">Subheading</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <a href="#" class="ms-2 me-auto ">Subheading</a>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>
            </div>
            <br>
            <div class="card">
                <div class="card-header fw-bold">
                    Tags
                </div>
                <div class="card-body">
                    <a class="badge rounded-pill text-bg-primary" href="#">Laravel</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">Vue3</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">Quasar</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">PHP</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">MySQL</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">Javascript</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">HTML</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">CSS</a>
                    <a class="badge rounded-pill text-bg-primary" href="#">AngularJS</a>

                </div>

            </div>
        </div>
    </div>
</div>
<x-blog-page-footer></x-blog-page-footer>
