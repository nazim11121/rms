@extends('frontend.layouts.master')
<style>
  .video-slider .carousel-item .ratio {
    height: 400px; /* You can change this value */
  }
  .video-slider .carousel-item .ratio iframe,
  .video-slider .carousel-item .ratio video {
    height: 100%;
    width: 100%;
    object-fit: cover; /* Adjust as needed (cover, contain, fill) */
  }
</style>
@section('content')
<section class="hero-banner hero-banner-3">
   <div class="container-fluid">
     <div class="swiper home-slider" id="home-slider-3">
       <div class="swiper-wrapper">
             <div class="swiper-slide text-center" data-aos="fade-up">
               <div class="banner-content">
                 <h1 class="title color-white mb-25" data-animation="animate__fadeInUp" data-delay=".1s">
                   Welcome to Bonomali</h1>
                 <p class="text" data-animation="animate__fadeInUp" data-delay=".2s">
                   Luxury Living</p>
               </div>
             </div>
                        <div class="swiper-slide text-center" data-aos="fade-up">
               <div class="banner-content">
                 <h1 class="title color-white mb-25" data-animation="animate__fadeInUp" data-delay=".1s">
                   Welcome to Bonomali</h1>
                 <p class="text" data-animation="animate__fadeInUp" data-delay=".2s">
                   Luxury Living</p>
               </div>
             </div>
                        <div class="swiper-slide text-center" data-aos="fade-up">
               <div class="banner-content">
                 <h1 class="title color-white mb-25" data-animation="animate__fadeInUp" data-delay=".1s">
                   Welcome to Bonomali</h1>
                 <p class="text" data-animation="animate__fadeInUp" data-delay=".2s">
                   Luxury Living</p>
               </div>
             </div>
                           </div>
     </div>
            <div class="banner-filter-form mx-auto" data-aos="fade-up" data-aos-delay="100">
         <div class="form-wrapper p-30 radius-lg">
           <form action="https://codecanyon8.kreativdev.com/hotelia/demo/rooms" method="GET">
             <div class="row align-items-center gx-xl-3">
               <div class="col-md-10">
                 <div class="row justify-content-between">
                   <div class="col-lg-5 col-md-5 col-sm-6">
                     <div class="form-group border-end">
                       <label for="guest" class="font-sm">Check In / Out Date</label>
                       <div class="form-block">
                         <div class="icon color-white"><i class="fas fa-calendar-alt"></i></div>
                         <input type="text" placeholder="Check In / Out Date" class="form-control text-dark" name="dates" id="date-range">
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="form-group border-end">
                       <label for="guest" class="font-sm">Baths</label>
                       <div class="input-wrap">
                         <select name="baths" class="niceselect">
                           <option selected value="">Baths</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="form-group border-end">
                       <label for="guest" class="font-sm">Beds</label>
                       <div class="input-wrap">
                         <select name="beds" class="niceselect">
                           <option selected>Beds</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                       </div>
                     </div>
                   </div>
                   <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="form-group">
                       <label for="guest" class="font-sm">Guest</label>
                       <div class="input-wrap">
                         <select name="guests" class="niceselect">
                           <option selected value="">Guests</option>

                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-2 col-sm-3 text-end">
                 <button type="submit" class="btn btn-icon bg-primary color-white rounded-pill" aria-label="Search">
                   <i class="fas fa-search"></i>
                 </button>
               </div>
             </div>
           </form>
         </div>
       </div>
          <div class="swiper-pagination position-static mt-40" id="home-slider-3-pagination" data-aos="fade-up"
       data-aos-delay="100"></div>
   </div>
        <div class="swiper home-img-slider" id="home-img-slider-3">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="lazyload bg-img" data-bg-image="{{asset('/')}}{{$slider->image}}"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

        <!-- Package Section Start -->
        <section class="product-area pb-75 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <div class="section-title title-center mb-50" data-aos="fade-up">
                                                            <h2 class="title mb-30">
                                    Tour Packages
                                </h2>
                                                        <div class="tabs-navigation">
                                <ul class="nav nav-tabs" data-hover="fancyHover" role="tablist">
                                    <li class="nav-item active" role="presentation">
                                        <button class="nav-link hover-effect btn-md radius-sm active" data-bs-toggle="tab"
                                            data-bs-target="#tab1" type="button" aria-selected="true"
                                            role="tab">All Packages</button>
                                    </li>
                                    @foreach($packageCategory as $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link hover-effect btn-md radius-sm" data-bs-toggle="tab"
                                            data-bs-target="#tab{{ $category->id }}" type="button"
                                            aria-selected="false" role="tab"
                                            tabindex="-1">{{ $category->name }}</button>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane slide active" id="tab1" role="tabpanel">
                                <div class="row">
                                   <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                @foreach($packages as $package)
                                                <div class="product-default mb-25">
                                                    <figure class="product-img">
                                                        <a href="#"
                                                            class="lazy-container radius-md ratio ratio-3-4"
                                                            target="_self" title="Link">
                                                            <img class="lazyload" data-src="{{ asset($package->image) }}"
                                                                alt="Product">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details p-15 border radius-md mx-auto">
                                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                                            <span class="product-tag border radius-sm">{{$package->packageCategory->name}}</span>
                                                            <div class="product-price">
                                                                <span class="h6 new-price color-primary">
                                                                    <strong>
                                                                        Tk {{ $package->price }}
                                                                    </strong>
                                                                </span>
                                                                <span class="font-sm">
                                                                    /&nbsp;{{ucfirst($package->price_for)}}
                                                                </span>
                                                                                                                            </div>
                                                        </div>
                                                        <h6 class="product-title lc-1 mt-2">
                                                            <a href="#"
                                                                target="_self"
                                                                title="Link">{{ $package->name }}</a>
                                                        </h6>
                                                        <div class="author mb-15 font-sm">
                                                            <span><a href="#"
                                                                    target="_self" title="Author Link"></a></span>
                                                        </div>
                                                        <ul
                                                            class="product-icon-list list-unstyled d-flex align-items-center">
                                                            <li class="icon-start">
                                                                <i class="fas fa-calendar-check"></i>
                                                                <span> {{ $package->no_of_day }}
                                                                    Days</span>
                                                            </li>
                                                            <li class="icon-start">
                                                                <i class="fas fa-user-friends"></i>
                                                                <span>{{ $package->no_of_person }}
                                                                    Person</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <!-- <div class="product-default mb-25">
                                                    <figure class="product-img">
                                                        <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                            class="lazy-container radius-md ratio ratio-3-4"
                                                            target="_self" title="Link">
                                                            <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623598494.jpg"
                                                                alt="Product">
                                                        </a>
                                                    </figure>
                                                    <div class="product-details p-15 border radius-md mx-auto">
                                                        <div class="d-flex align-items-center gap-3 justify-content-between">
                                                            <span class="product-tag border radius-sm">Mountains &amp; Hills</span>
                                                            <div class="product-price">
                                                                                                                                <span class="h6 new-price color-primary"></strong>
                                                                    $
                                                                    120.00
                                                                    
                                                                </span>
                                                                <span class="font-sm">
                                                                    /&nbsp;FIXED
                                                                </span>
                                                                                                                            </div>
                                                        </div>
                                                        <h6 class="product-title lc-1 mt-2">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                                target="_self"
                                                                title="Link">USA - Western Wonders (Cosmos)</a>
                                                        </h6>
                                                        <div class="author mb-15 font-sm">
                                                            <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                                    target="_self" title="Author Link"></a></span>
                                                        </div>
                                                        <ul
                                                            class="product-icon-list list-unstyled d-flex align-items-center">
                                                            <li class="icon-start">
                                                                <i class="fas fa-calendar-check"></i>
                                                                <span> 3
                                                                    Days</span>
                                                            </li>
                                                            <li class="icon-start">
                                                                <i class="fas fa-user-friends"></i>
                                                                <span>5
                                                                    Person</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                <!-- product-default -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane slide" id="tab1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/16/grand-bargain-tour-of-usa-%28holiday-saving-account%29"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623598923.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Holiday</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        40.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;PER-PERSON
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/16/grand-bargain-tour-of-usa-%28holiday-saving-account%29"
                                                                    target="_self"
                                                                    title="Link">Grand Bargain Tour Of USA (Holiday Saving Account)</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/16/grand-bargain-tour-of-usa-%28holiday-saving-account%29"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 1
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>6
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6"
                                                    data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/19/miami---a-la-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623600032.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Holiday</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        30.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;PER-PERSON
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/19/miami---a-la-carte"
                                                                    target="_self"
                                                                    title="Link">Miami - A La Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/19/miami---a-la-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 1
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>3
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6"
                                                    data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/22/los-angeles---a-la-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623602860.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Holiday</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        40.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;PER-PERSON
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/22/los-angeles---a-la-carte"
                                                                    target="_self"
                                                                    title="Link">Los Angeles - A La Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/22/los-angeles---a-la-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 1
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>2
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane slide" id="tab2" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623598494.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Mountains &amp; Hills</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        120.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;FIXED
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                                    target="_self"
                                                                    title="Link">USA - Western Wonders (Cosmos)</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/15/usa---western-wonders-%28cosmos%29"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 3
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>5
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/18/orlando---ala-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623599575.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Mountains &amp; Hills</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        180.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;FIXED
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/18/orlando---ala-carte"
                                                                    target="_self"
                                                                    title="Link">Orlando - Ala Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/18/orlando---ala-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 5
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>5
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/23/fascinating-northeast-with-kalimpong---land-only"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623603327.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Mountains &amp; Hills</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        200.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;FIXED
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/23/fascinating-northeast-with-kalimpong---land-only"
                                                                    target="_self"
                                                                    title="Link">Fascinating Northeast with Kalimpong - Land Only</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/23/fascinating-northeast-with-kalimpong---land-only"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 7
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>5
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane slide" id="tab11" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/17/customizable---las-vegas---a-la-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623599177.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Vacation</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="font-sm">
                                                                        <strong>Price:</strong>
                                                                        Negotiable
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/17/customizable---las-vegas---a-la-carte"
                                                                    target="_self"
                                                                    title="Link">Customizable - Las Vegas - A La Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/17/customizable---las-vegas---a-la-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 3
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>7
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6"
                                                    data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/20/san-francisco---a-la-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623602478.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Vacation</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="h6 new-price color-primary"></strong>
                                                                        $
                                                                        20.00
                                                                        
                                                                    </span>
                                                                    <span class="font-sm">
                                                                        /&nbsp;PER-PERSON
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/20/san-francisco---a-la-carte"
                                                                    target="_self"
                                                                    title="Link">San Francisco - A La Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/20/san-francisco---a-la-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 6
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>4
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                                <div class="col-xl-3 col-lg-4 col-sm-6" data-aos="fade-up">
                                                    <div class="product-default mb-25">
                                                        <figure class="product-img">
                                                            <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/21/washington---a-la-carte"
                                                                class="lazy-container radius-md ratio ratio-3-4"
                                                                target="_self" title="Link">
                                                                <img class="lazyload" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/packages/1623603874.jpg"
                                                                    alt="Product">
                                                            </a>
                                                        </figure>
                                                        <div class="product-details p-15 border radius-md mx-auto">
                                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                                <span class="product-tag border radius-sm">Vacation</span>
                                                                <div class="product-price">
                                                                                                                                        <span class="font-sm">
                                                                        <strong>Price:</strong>
                                                                        Negotiable
                                                                    </span>
                                                                                                                                    </div>
                                                            </div>
                                                            <h6 class="product-title lc-1 mt-2">
                                                                <a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/21/washington---a-la-carte"
                                                                    target="_self"
                                                                    title="Link">Washington - A La Carte</a>
                                                            </h6>
                                                            <div class="author mb-15 font-sm">
                                                                <span><a href="https://codecanyon8.kreativdev.com/hotelia/demo/package_details/21/washington---a-la-carte"
                                                                        target="_self" title="Author Link"></a></span>
                                                            </div>
                                                            <ul
                                                                class="product-icon-list list-unstyled d-flex align-items-center">
                                                                <li class="icon-start">
                                                                    <i class="fas fa-calendar-check"></i>
                                                                    <span> 10
                                                                        Days</span>
                                                                </li>
                                                                <li class="icon-start">
                                                                    <i class="fas fa-user-friends"></i>
                                                                    <span>8
                                                                        Person</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- product-default -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <div class="text-center mt-20 mb-25" data-aos="fade-up">
                            <a href="{{ route('packages')}}"
                                class="btn btn-lg btn-primary">View All Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Package Section End -->

        <!-- Product-area start -->
        <section class="product-area pb-75">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <div class="section-title title-inline mb-50" data-aos="fade-up">
                    <h2 class="title">Featured Rooms</h2>
                    <a href="{{ url('/rooms')}}" class="btn btn-lg btn-primary">All Rooms</a>
                </div>
            </div>

            <div class="col-12">
                <div class="swiper product-slider" id="product-slider-1" data-slides-per-view="4">
                    <div class="swiper-wrapper">
                        @foreach($rooms as $room)
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="product-default pb-25">
                                <figure class="product-img">
                                    <a href="#"
                                       class="lazy-container radius-md ratio ratio-3-4" target="_self"
                                       title="{{ $room->name }}">
                                        <img class="lazyload" data-src="{{ asset('/'.$room->image) }}"
                                             alt="{{ $room->name }}">
                                    </a>
                                </figure>
                                <div class="product-details p-15 border radius-md mx-auto">
                                    <div class="d-flex align-items-center gap-3 justify-content-between">
                                        <span class="product-tag border radius-sm">{{ $room->roomType->name }}</span>
                                        <div class="product-price">
                                            <span class="h6 new-price color-primary">৳{{ number_format($room->roomType->base_price) }}</span>
                                            <span class="font-sm">/&nbsp;Night</span>
                                        </div>
                                    </div>
                                    <h6 class="product-title lc-1 mt-2">
                                        <a href="#"
                                           target="_self" title="{{ $room->name }}">{{ $room->name }}</a>
                                    </h6>
                                    <ul class="product-icon-list list-unstyled d-flex align-items-center">
                                        <li class="icon-start font-xsm">
                                            <i class="fas fa-bed"></i>
                                            <span>{{ $room->beds }} Beds</span>
                                        </li>
                                        <li class="icon-start font-xsm">
                                            <!-- <i class="fas fa-bath"></i> -->
                                            <!-- <span>{{ $room->baths }} Baths</span> -->
                                            <i class="fas fa-child"></i>
                                            <span>{{ $room->roomType->kids_capacity ?? 0 }} Kids</span>
                                        </li>
                                        <li class="icon-start font-xsm">
                                            <i class="fas fa-users"></i>
                                            <span>{{ $room->roomType->adult_capacity ?? 0 }} Guests</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination position-static mb-25" id="product-slider-1-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Why Choose Us/Facility Section Start -->
        <section class="choose-area choose-3 pt-100 pb-60">
            <div class="container">
                <div class="row gx-xl-5 align-items-center">
                <div class="section-title title-center mb-50">
                                    <h2 class="title mb-30">Facility</h2>
                                    <p class="text">We Care You &amp; We Feel What’s Needs For Good Living</p>
                                </div>
                            
                    <div class="col-lg-6" data-aos="fade-right">
                    <div class="item-list mt-40">
                                            <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-swimmer"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">Relex Living</h4>
                                                <p class="card-text">Dreat explorer of the truth, the master-builder of human happines one rejects, dislikes avoids</p>
                                            </div>
                                        </div>
                                        <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">High Security System</h4>
                                                <p class="card-text">Procure him some great pleasure. To take a trivial example, which of us ever undertakes labor</p>
                                            </div>
                                        </div>
                                        <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">Such Events &amp; Party</h4>
                                                <p class="card-text">Libero tempore, cum soluta nobis est eligenoptio cumque nihil impedit quo minus id quod</p>
                                            </div>
                                        </div>
                                    </div>                                
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="content mb-10">
                                
                                    <div class="item-list mt-40">
                                            <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-swimmer"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">Relex Living</h4>
                                                <p class="card-text">Dreat explorer of the truth, the master-builder of human happines one rejects, dislikes avoids</p>
                                            </div>
                                        </div>
                                        <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">High Security System</h4>
                                                <p class="card-text">Procure him some great pleasure. To take a trivial example, which of us ever undertakes labor</p>
                                            </div>
                                        </div>
                                        <div class="item d-flex gap-3 mb-30">
                                            <div class="icon rounded-pill">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div class="content w-75 w-sm-100">
                                                <h4 class="mb-2 lh-1">Such Events &amp; Party</h4>
                                                <p class="card-text">Libero tempore, cum soluta nobis est eligenoptio cumque nihil impedit quo minus id quod</p>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Us/Facility Section End -->
        <!-- Video-area end -->
        <section class="video-slider py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Featured Videos</h2>

        <!-- <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel"> -->
        <div id="videoCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">

                <!-- Slide 1: YouTube -->
                <!-- <div class="carousel-item active">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/Q9phP_kFQuc" title="Video 1" allowfullscreen></iframe>
                    </div>
                </div> -->

                <!-- Slide 2: Local video -->
                <div class="carousel-item active">
                    <div class="ratio ratio-16x9">
                        <video controls autoplay muted>
                            <source src="{{ asset('uploads/video1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>


        <!-- Video To Action End -->
        <!-- About section start -->
        <section class="about-area about-2 pt-100 pb-60">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="content-title mb-40">
                                                            <h2 class="title mb-20">
                                    About Us
                                </h2>

                                <div class="mw-80 w-md-100">
                                    <p>
                                        {{$aboutUs->description}}
                                    </p>
                                </div>
                                                                                        <div class="about-grid mt-40">
                                                                                                                        <div class="grid-item radius-md p-20">
                                                <h3 class="mb-2 lc-1"><span class="counter">506</span>+</h3>
                                                <p>Luxury Rooms</p>
                                            </div>
                                                                                    <div class="grid-item radius-md p-20">
                                                <h3 class="mb-2 lc-1"><span class="counter">700</span>+</h3>
                                                <p>Happy Customers</p>
                                            </div>
                                                                                    <div class="grid-item radius-md p-20">
                                                <h3 class="mb-2 lc-1"><span class="counter">650</span>+</h3>
                                                <p>Lots of Amenities</p>
                                            </div>
                                                                                                            </div>
                                                    </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="image1 mb-40 img-right">
                            <img class="lazyload blur-up" src="{{asset('/')}}{{$aboutUs->image}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section end -->
          <div class="back-top">
      <a href="#" class="back-to-top">
        <i class="fas fa-angle-up"></i>
      </a>
    </div>
          <section class="sponsor pb-100">
            <div class="container">
                                    <div class="row">
                        <div class="col-12">
                            <div class="swiper sponsor-slider">
                                <div class="swiper-wrapper">
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624260969.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624260980.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624260990.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624261000.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624261012.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624261023.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                            <div class="swiper-slide">
                                            <div class="sponsor-img text-center">
                                                <a href="http://example.com/" target="_blank"
                                                    title="brand Image"><img class="lazyload blur-up" data-src="https://codecanyon8.kreativdev.com/hotelia/demo/assets/img/brands/1624261034.png"
                                                        alt="brand image"></a>
                                            </div>
                                        </div>
                                                                    </div>
                                <div class="swiper-pagination position-static mt-30" id="sponsor-slider-pagination" data-aos="fade-up">
                            </div>
                        </div>
                    </div>
                            </div>
        </section>
    
  
  <div class="back-top">
    <a href="#" class="back-to-top">
      <i class="fas fa-angle-up"></i>
    </a>
  </div>
<!-- Load jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Then Bootstrap JS or your custom scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#videoCarousel').on('slid.bs.carousel', function () {
            $(this).find('video').each(function () {
                this.pause(); // pause all videos
            });
            let activeVideo = $(this).find('.carousel-item.active video').get(0);
            if (activeVideo) {
                activeVideo.play(); // play only the active one
            }
        });
    });
</script>
@endsection
