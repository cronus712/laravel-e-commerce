<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="images/favicon.png" type="">
      
      <title>E-commerce</title>
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <!-- bootstrap core css -->
      <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>
      <link href="{{ asset('css/owl.carousel.min.css')}}" rel="stylesheet"/>
      <link href="{{ asset('css/owl.theme.default.min.css')}}" rel="stylesheet"/>

      
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
   </head>
   <body>
           <div>

            <main>

               <div class="container-fluid px-0 mx-0">

          
    
         <!-- header section strats -->
         <div>
            @include('home.navbar')
         </div>
         <!-- end header section -->

         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      <!-- why section -->
       @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           #NewArrivals
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     <a href="">
                     Shop Now
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->

      
           <!-- category section -->
           <div> 
            @include('home.category')
            </div>
         <!-- end category section -->




      <!-- product section -->
      <div> 
         @include('home.product')
    </div>
      <!-- end product section -->

      {{-- <!-- subscribe section -->
      <section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="">
                           <input type="email" placeholder="Enter your email">
                           <button>
                           subscribe
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end subscribe section --> --}}



      <!-- client section -->
      @include('home.testimonial')
      <!-- end client section -->

      <!-- footer start -->
       @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Res/erved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      
      <!-- jQery -->
      <script src="{{ asset("js/jquery-3.4.1.min.js") }}" ></script>
      <script src="{{ asset("owl.carousel.min.js") }}" ></script>

      <!-- popper js -->
      <script src="{{ asset("js/popper.min.js") }} " ></script>
      <!-- bootstrap js -->
      <script src=" {{ asset("js/bootstrap.js") }}" ></script>
      <!-- custom js -->
      <script src="{{ asset("js/custom.js") }}" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script>
         $('.owl-carousel').owlCarousel({
     loop:true,
     margin:20,
     stagePadding:50,
     nav:true,
     autoplay:true,
     autoplayTimeout:2000,
     autoplayHoverPause:true,
     
     responsive:{
         0:{
             items:1
         },
         600:{
             items:3
         },
         1000:{
             items:5
         }
     }
 })
     </script>

</div>       
</main>
</div>
   </body>
</html>