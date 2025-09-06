@extends('frontend.layouts.master')

<title>  Gallery | Bonomali</title>

@section('content')
    <main>
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center lazy11" style="background-image: url({{asset('uploads/frontend/slide1.jpg')}});">
      <div class="container">
        <div class="breadcrumb-content text-center">
                      <h1>Gallery</h1>
          
          <ul class="list-inline">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fas fa-angle-double-right"></i></li>

                          <li>Gallery</li>
                      </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Gallery Start -->
    <section class="gallery-wrap section-padding">
      <div class="container">
        <!-- if category is null then no gallery is available -->
                  <div class="gallery-filter text-center">
            <ul class="list-inline">
              <li class="active" data-filter="*">Show All</li>
                              
                <li data-filter=".guest-rooms">Guest Rooms</li>
                              
                <li data-filter=".event-spaces">Event Spaces</li>
                              
                <li data-filter=".spa-and-wellness">Spa and Wellness</li>
                          </ul>
          </div>

          <div class="gallery-items">
            <div class="row gallery-filter-items">
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 guest-rooms">
                  <a class="gallery-item lazy11 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689489870.png" style="background-image:url({{asset('uploads/room/r1.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying the different types of guest rooms available</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 guest-rooms">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689489994.png" style="background-image:url({{asset('uploads/room/r2.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying the different types of guest rooms available</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 guest-rooms">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689490054.png" style="background-image:url({{asset('uploads/room/r3.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying the different types of guest rooms available</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 event-spaces">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689490119.png" style="background-image:url({{asset('uploads/room/r4.png')}})!important">
                    <div class="gallery-content">
                      <h3>Highlighting the hotel&#039;s event and conference spaces, including ballrooms, meeting rooms, and banquet halls,</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 event-spaces">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689490150.png" style="background-image:url({{asset('uploads/room/r5.png')}})!important">
                    <div class="gallery-content">
                      <h3>Highlighting the hotel&#039;s event and conference spaces, including ballrooms, meeting rooms, and banquet halls,</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 event-spaces">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689490458.png" style="background-image:url({{asset('uploads/room/r6.png')}})!important">
                    <div class="gallery-content">
                      <h3>Highlighting the hotel&#039;s event and conference spaces, including ballrooms, meeting rooms, and banquet halls,</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 spa-and-wellness">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689491207.png" style="background-image:url({{asset('uploads/room/r7.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying images of the hotel&#039;s spa facilities, including massage rooms, relaxation areas, steam rooms, and other wellness services</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 spa-and-wellness">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689491233.png" style="background-image:url({{asset('uploads/room/r8.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying images of the hotel&#039;s spa facilities, including massage rooms, relaxation areas, steam rooms, and other wellness services</h3>
                    </div>
                  </a>
                </div>
                              <!-- Single Item -->
                
                <div class="col-lg-4 col-md-6 col-sm-6 spa-and-wellness">
                  <a class="gallery-item lazy1 bg-light d-block" href="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/gallery/1689491253.png" style="background-image:url({{asset('uploads/room/r9.png')}})!important">
                    <div class="gallery-content">
                      <h3>Displaying images of the hotel&#039;s spa facilities, including massage rooms, relaxation areas, steam rooms, and other wellness services</h3>
                    </div>
                  </a>
                </div>
                          </div>
          </div>
              </div>
    </section>
    <!-- Gallery End -->
  </main>
@endsection