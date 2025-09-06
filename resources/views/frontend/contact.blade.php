@extends('frontend.layouts.master')
<title>  Contact Us | Bonomali</title>
@section('content')
    <main>
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center lazy1" style="background-image: url({{asset('uploads/frontend/slide1.jpg')}});">
      <div class="container">
        <div class="breadcrumb-content text-center">
                      <h1>Contact Us</h1>
          
          <ul class="list-inline">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><i class="fas fa-angle-double-right"></i></li>

                          <li>Contact Us</li>
                      </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Information Start -->
    <section class="contact-info-section">
      <div class="container">
        <div class="contact-info-boxes">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="contact-info-box">
                <div class="contact-icon">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <h4>Address</h4>
                <p>West Dhangmari, Banishanta, Dacope, Khulna, Bangladesh</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="contact-info-box">
                <div class="contact-icon">
                  <i class="fas fa-envelope-open"></i>
                </div>
                <h4>Email</h4>
                <p>bonomalimangrove<wbr>resort@gmail.com</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mx-auto">
              <div class="contact-info-box">
                <div class="contact-icon">
                  <i class="fas fa-phone"></i>
                </div>
                <h4>Phone</h4>
                <p>01991505070</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Information End -->

    <!-- Map Start -->
        <section class="contact-map">
        <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14749.793766407845!2d89.52880806839424!3d22.44977648318565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a002fa68326af57%3A0x5db37101a180e135!2z4Kas4Kao4Kau4Ka-4Kay4KeAIOCmruCnjeCmr-CmvuCmqOCml-CnjeCmsOCni-CmrSDgprDgpr_gprjgp4vgprDgp43gpp8!5e0!3m2!1sbn!2sbd!4v1748029273809!5m2!1sbn!2sbd"></iframe>
    </section>
        <!-- Map End -->

    <!-- Send Mail Form Start -->
    <!-- <section class="contact-form">
      <div class="container">
        <div class="contact-form-wrap section-bg">
          <h2 class="form-title">Send A Message</h2>
          <form action="https://codecanyon8.kreativdev.com/hotelia/demo/contact/send_mail" method="POST">
            <input type="hidden" name="_token" value="jLa7F5LSRzrk4FKCKUiq9m2Pl13dePZ0oGyTFBHq">            <div class="row">
              <div class="col-md-4 col-12">
                  <div class="mb-4">
                      <div class="input-wrap mb-0">
                        <input type="text" placeholder="Full Name" name="full_name">
                        <i class="far fa-user-alt"></i>
                      </div>
                                        </div>
              </div>

              <div class="col-md-4 col-12">
                <div class="mb-4">
                    <div class="input-wrap mb-0">
                      <input type="email" placeholder="Email Address" name="email">
                      <i class="far fa-envelope"></i>
                    </div>
                                    </div>
              </div>

              <div class="col-md-4 col-12">
                <div class="mb-4">
                    <div class="input-wrap mb-0">
                      <input type="text" placeholder="Email Subject" name="subject">
                      <i class="far fa-pencil"></i>
                    </div>
                                    </div>
              </div>

              <div class="col-12">
                <div class="mb-4">
                    <div class="input-wrap mb-0 text-area">
                      <textarea placeholder="Write Message" name="message"></textarea>
                      <i class="far fa-pencil"></i>
                    </div>
                                    </div>
              </div>

              
              <div class="col-12 text-center">
                <button type="submit" class="btn filled-btn">
                  Send <i class="far fa-long-arrow-right"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section> -->
    <!-- Send Mail Form End -->
  </main>
@endsection
