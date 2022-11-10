<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') PP Al-Jauhar</title>
  <meta content="Pondok Pesantren Al-Jauhar Jember. Visi & Misi Unggul dalam Prestasi dan Akhlaqul Karimah Serta Berpijak pada Ajaran Ahlussunah Wal Jamaah Annahdiyah" name="description">
  <meta content="" name="keywords">
  <meta rel="canonical" href="https://example.com/sample-page">

  <!-- Favicons -->
  <link rel="icon" href="/images/logoseginam.png" type="image/png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/frontend/css/main.css" rel="stylesheet">
</head>

<body>
  @include('frontend.layout.topbar')
  @yield('content')
  @include('frontend.layout.footer')
</body>

</html>