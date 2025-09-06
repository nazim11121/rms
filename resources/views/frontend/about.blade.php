@extends('frontend.layouts.master')

<title>  About Us | Bonomali</title>

@section('content')

    <main>
    <!-- Breadcrumb Section Start -->
    <section
      class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
      style="background-image: url({{asset('uploads/frontend/slide1.jpg')}});"
    >
      <div class="container">
        <div class="breadcrumb-content text-center">
          <h1>About Us</h1>

          <ul class="list-inline">
            <li><a href="https://codecanyon8.kreativdev.com/hotelia/demo">Home</a></li>
            <li><i class="fas fa-angle-double-right"></i></li>
            <li>About Us</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="custom-page-content">
                  <p style="text-align:justify;font-family:'Open Sans', Arial, sans-serif;">{{$aboutUs->description}}</p>
              </div>
          </div>

        </div>
      </div>
    </section>
    <!-- About Section End -->
    </main>
@endsection