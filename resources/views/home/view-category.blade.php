<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>


         <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      @include('home.navbar')
     
    <div class="container mt-5">
      <div class="card-body">

         <nav aria-label="breadcrumb" >
             <ol class="breadcrumb" style="background-color: rgba(225, 186, 29, 0.673)">
               <li class="breadcrumb-item">Collections</li>
               <li class="breadcrumb-item">{{$category->name}}</li>
       
             </ol>
           </nav>
       <div class="heading_container heading_center ">
          <h2 class="mt-3">
             {{$category->name}}
          </h2>
       </div>


       <div class="row mt-5">

       @foreach ($product as $product)
       <div class="col-xl-3 col-md-4 mb-3">
       <div class="card text-light view-category " >

        <a href="{{url('category/'.$category->slug.'/'.$product->name)}}">
        <img src="{{ asset('storage/images/'.$product->image)}}" class="card-img" alt="Product image" style="width: 100%; height:300px;">
         </a>
        <div class="card-img-overlay view-category-name">
            <a href="#" class="m-5"><i class="fa-solid fa-cart-plus fa-lg float-right" style="color: #dc3545;"></i></a>
          <p class="category-text-title" >{{$product->name}}</p>
          <p class="category-text-text" >{{$product->selling_price}} TND</p>
          <p class="category-text-text-right" ><small><strike>{{$product->original_price}}</strike></small></p>
        

        </div>
    </div>
    
       </div>
      @endforeach

    </div>
    </div>
    <script src="{{ asset("js/jquery-3.4.1.min.js") }}" ></script>

    <!-- popper js -->
    <script src="{{ asset("js/popper.min.js") }} " ></script>
    <!-- bootstrap js -->
    <script src=" {{ asset("js/bootstrap.js") }}" ></script>
    <!-- custom js -->
    <script src="{{ asset("js/custom.js") }}" ></script>
    <script src="{{asset('/js/cart.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/63b0920147425128790b028b/1glkrkm5u';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>

  <!--End of Tawk.to Script-->
    @include('home.footer')
