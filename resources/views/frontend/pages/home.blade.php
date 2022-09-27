@extends('frontend.layout.app')

@section('content')
<section id="hero" class="hero">
  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2 data-aos="fade-down">Pondok Pesantren <span>Al-Jauhar Jember</span></h2>
          <p data-aos="fade-up">Visi & Misi Unggul dalam Prestasi dan Akhlaqul Karimah Serta Berpijak pada Ajaran Ahlussunah Wal Jamaah Annahdiyah</p>
          <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Get Started</a>
        </div>
      </div>
    </div>
  </div>

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-item active" style="background-image: url(/frontend/img/jumbotron/haul.jpg)"></div>
    <div class="carousel-item active" style="background-image: url(/frontend/img/jumbotron/qurban.jpg)"></div>
    <div class="carousel-item active" style="background-image: url(/frontend/img/jumbotron/santunan.jpg)"></div>
    <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>
  </div>
</section>

<main id="main">
  <section id="alt-services" class="alt-services">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-around gy-4">
        <div class="col-lg-6 img-bg" style="background-image: url(/frontend/img/beranda/sejarah.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>
        <div class="col-lg-5 d-flex flex-column justify-content-center">
          <h3>Profil Singkat Pondok Pesantren Al-Jauhar</h3>
          <p>Pendiri Pesantren Al-Jauhar adalah K.H Sodiq Machmud SH, beliau adalah cucu dari K.H Muhammad Shiddiq seorang ulama besar dan salah satu pendiri kota Jember, yang dimakamkan di Pemakaman Condro jalan Gajah Mada. Kyai Sodiq Machmud putra dari K.H Machmud Siddiq dan Ibu Nyai Jauharotul Maknunah. Di kalangan santri pesantren Al-Jauhar, K.H. Shoddiq lebih akrab dengan sebutan Abah Sepuh.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>PPM Al-Jauhar</h2>
        <p>Yang akan anda dapatkan ketika masuk ke Pon Pes Al-Jauhar</p>
      </div>
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item  position-relative">
            <div class="icon">
              <i class="fa-solid fa-mountain-city"></i>
            </div>
            <h3>Pengajian Rutin</h3>
            <p>Pengajian di Pon Pes Al-Jauhar dilakukan ba'da subuh dan ba'da maghrib, Setiap hari pengajian kitab dan pengajar yang berbeda.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-arrow-up-from-ground-water"></i>
            </div>
            <h3>Teman Santri</h3>
            <p>Santri yang tinggal di Al-Jauhar mendapatkan saudara dan keluarga baru saat menuntut ilmu di Pon Pes Al-Jauhar.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-compass-drafting"></i>
            </div>
            <h3>Peningkatan Skill Santri</h3>
            <p>Santri tidak hanya dituntut untuk mengaji, Melainkan santri bisa mengembangkan bakat dan skill nya melalui Ekstrakurikuler pondok.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="features" class="features section-bg">
    <div class="container" data-aos="fade-up">

      <ul class="nav nav-tabs row  g-2 d-flex">

        @foreach ($biography as $item)
        <li class="nav-item col-3">
          <a class="nav-link @if($loop->index == 0) active show @endif" data-bs-toggle="tab" data-bs-target="#tab-{{ $loop->index }}">
            <h4>{{ $item->name }}</h4>
          </a>
        </li>
        @endforeach
      </ul>

      <div class="tab-content">
        @foreach ($biography as $item)
        <div class="tab-pane @if($loop->index == 0) active show @endif" id="tab-{{ $loop->index }}">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <h3>{{ $item->name }}</h3>
              <p class="fst-italic">
                {!! $item->biography !!}
              </p>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
              <img src="/upload/biography/{{ $item->photo }}" alt="pengsuh1.jpg" class="img-fluid">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Testimonials</h2>
        <p>Quam sed id excepturi ccusantium dolorem ut quis dolores nisi llum nostrum enim velit qui ut et autem uia reprehenderit sunt deleniti</p>
      </div>
      <div class="slides-2 swiper">
        <div class="swiper-wrapper">
          @foreach ($testimonials as $item)
          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="upload/testimonial/{{ $item->photo }}" class="testimonial-img" alt="">
                <h3>{{ $item->name }}</h3>
                <h4>{{ $item->job }}</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  {{ $item->description }}
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container" data-aos="fade-up"">
      <div class=" section-header">
        <h2>Blog PP Al-Jauhar</h2>
        <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
      </div>
      <div class="row gy-5">
        @foreach ($posts as $item)
        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="post-item position-relative h-100">
            <div class="post-img position-relative overflow-hidden">
              <img src="/upload/post/{{ $item->thumbnail }}" class="img-fluid" alt="{{ $item->title }}">
              <span class="post-date">{!! date('M d, Y', strtotime($item->created_at)) !!}</span>
            </div>
            <div class="post-content d-flex flex-column">
              <h3 class="post-title">{{ $item->title }}</h3>
              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> <span class="ps-2">{{ $item->user->santri->name }}</span>
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
    </div>
  </section>

</main>

@endsection