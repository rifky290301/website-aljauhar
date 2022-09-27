@extends('frontend.layout.app')

@section('title')
{{ $post->title }} | 
@endsection

@section('content')
<main id="main">

  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/frontend/img/jumbotron/qurban.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Blog Details</h2>
      <ol>
        <li><a href="/">Home</a></li>
        <li>{{ $post->title }}</li>
      </ol>
    </div>
  </div>
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-5">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-img">
              <img src="/upload/post/{{ $post->thumbnail }}" alt="{{ $post->title }}" class="img-fluid">
            </div>
            <h2 class="title">{{ $post->title }}</h2>
            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $post->user->santri->name }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{!! date('M d, Y', strtotime($post->created_at)) !!}</time></a></li>
              </ul>
            </div>
            <div class="content">
              {!! $post->content !!}
            </div>
            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">{{ $post->category->name }}</a></li>
              </ul>
              <i class="bi bi-tags"></i>
              <ul class="tags">
                @foreach ($post->tags as $item)
                <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </article>
        </div>

        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Search</h3>
              <form action="/search" class="mt-3">
                <input name="search" type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="mt-3">
                @foreach ($categories as $item)
                @php
                $posts = App\Models\Post::where('category_id', $item->id)->get();
                @endphp
                <li><a href="#">{{ $item->name }} <span>({{ count($posts) }})</span></a></li>
                @endforeach
              </ul>
            </div>
            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="mt-3">
                @foreach ($latest_posts as $item)
                <div class="post-item mt-3">
                  <img src="/upload/post/{{ $item->thumbnail }}" alt="">
                  <div>
                    <h4><a href="/blog/{{ $item->slug }}">{{ $item->title }}</a></h4>
                    <time datetime="2020-01-01">{!! date('M d, Y', strtotime($item->created_at)) !!}</time>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="sidebar-item tags">
              <h3 class="sidebar-title">Tags</h3>
              <ul class="mt-3">
                @foreach ($tags as $item)
                <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection