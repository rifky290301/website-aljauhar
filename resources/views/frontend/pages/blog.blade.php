@extends('frontend.layout.app')

@section('title')
Blog |
@endsection

@section('content')
<main id="main">

  <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/frontend/img/jumbotron/haul.jpg');">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
      <h2>Blog</h2>
      <ol>
        <li><a href="/">Home</a></li>
        <li>Blog</li>
      </ol>
    </div>
  </div>

  @if (count($posts) > 0)
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 posts-list">
        @foreach ($posts as $item)
        <div class="col-xl-4 col-md-6">
          <div class="post-item position-relative h-100">
            <div class="post-img position-relative overflow-hidden">
              <img src="/upload/post/{{ $item->thumbnail }}" class="img-fluid" alt="{{ $item->title }}">
              <span class="post-date">{!! date('M d, Y',  strtotime($item->created_at)) !!}</span>
            </div>
            <div class="post-content d-flex flex-column">
              <h3 class="post-title">{{ $item->title }}</h3>
              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i><span class="ps-2">{{ $item->user->santri->name }}</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> <span class="ps-2">{{ $item->category->name }}</span>
                </div>
              </div>
              <hr>
              <a href="/blog/{{ $item->slug }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="blog-pagination">
        <ul class="justify-content-center">
          {{ $posts->links('pagination::bootstrap-4') }}
        </ul>
      </div>

    </div>
  </section>
  @else
  <div class="my-4">
    <h3 class="text-center">Postingan tidak ditemukan</h3>
  </div>
  @endif

</main>

@endsection