@extends('frontend.layouts.master')

<title>  Services | Bonomali</title>

@section('content')

  <main>
    <!-- Breadcrumb Section Start -->
    <section
      class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
      style="background-image: url({{asset('uploads/frontend/slide1.jpg')}});"
    >
      <div class="container">
        <div class="breadcrumb-content text-center">
                      <h1>Services</h1>
          
          <ul class="list-inline">
            <li><a href="https://codecanyon8.kreativdev.com/hotelia/demo">Home</a></li>
            <li><i class="fas fa-angle-double-right"></i></li>

                          <li>Services</li>
                      </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Service Section Start -->
    <section class="service-section section-padding section-bg">
      <div class="container">
                  <!-- Section Title -->
          <div class="section-title text-center">
                          <span class="title-top">Our Services</span>
              <h1>We Provide Most Exclusive Hotel &amp; Room Services</h1>
                      </div>

          <!-- Service Boxes -->
          <div class="row">
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="200ms"
                >
                  <span class="service-counter">1</span>
                  <div class="service-icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <h4>Rooms &amp; Appartment</h4>
                  <p>Great explorer of the truth the ter...</p>
                                      <a href="https://codecanyon8.kreativdev.com/hotelia/demo/service_details/7/rooms-&amp;-appartment" class="read-more">
                      read more <i class="fas fa-long-arrow-right"></i>
                    </a>
                                  </div>
              </div>
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="400ms"
                >
                  <span class="service-counter">2</span>
                  <div class="service-icon">
                    <i class="fas fa-lemon iconpicker-component"></i>
                  </div>
                  <h4>Food &amp; Restaurant</h4>
                  <p>Great explorer of the truth the ter...</p>
                                      <a href="https://codecanyon8.kreativdev.com/hotelia/demo/service_details/8/food-&amp;-restaurant" class="read-more">
                      read more <i class="fas fa-long-arrow-right"></i>
                    </a>
                                  </div>
              </div>
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="600ms"
                >
                  <span class="service-counter">3</span>
                  <div class="service-icon">
                    <i class="fas fa-hiking"></i>
                  </div>
                  <h4>Spa &amp; Fitness</h4>
                  <p>Great explorer of the truth the ter...</p>
                                      <a href="https://codecanyon8.kreativdev.com/hotelia/demo/service_details/9/spa-&amp;-fitness" class="read-more">
                      read more <i class="fas fa-long-arrow-right"></i>
                    </a>
                                  </div>
              </div>
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="800ms"
                >
                  <span class="service-counter">4</span>
                  <div class="service-icon">
                    <i class="fas fa-headset"></i>
                  </div>
                  <h4>Sports &amp; Gaming</h4>
                  <p>Great explorer of the truth the ter...</p>
                                  </div>
              </div>
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="1000ms"
                >
                  <span class="service-counter">5</span>
                  <div class="service-icon">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                  <h4>Event &amp; Party</h4>
                  <p>Great explorer of the truth the ter...</p>
                                  </div>
              </div>
                          <div class="col-lg-4 col-md-6">
                <!-- Single Service -->
                <div
                  class="single-service-box service-white-bg text-center wow fadeIn animated"
                  data-wow-duration="1500ms"
                  data-wow-delay="1200ms"
                >
                  <span class="service-counter">6</span>
                  <div class="service-icon">
                    <i class="fas fa-dumbbell iconpicker-component"></i>
                  </div>
                  <h4>GYM &amp; Yoga</h4>
                  <p>Great explorer of the truth the ter...</p>
                                  </div>
              </div>
                      </div>
              </div>
    </section>
    <!-- Service Section End -->
  </main>

@endsection