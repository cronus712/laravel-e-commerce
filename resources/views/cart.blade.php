<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    body{
    background-color: #edf1f5;
    margin-top:20px;
}
.card {
    margin-bottom: 30px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.card .card-subtitle {
    font-weight: 300;
    margin-bottom: 10px;
    color: #0000009e;
}

</style>


      @include('home.navbar')

        <div class="container my-5">

            <div class="card shadow ">
                <div class="card-body">

                  <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb" style="background-color: rgba(225, 186, 29, 0.673)">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item active"><a href="{{url('cart')}}">Cart</a> </li>
                    </ol>
                  </nav>
                          @php
                             $total = 0;
                          @endphp
                  @foreach ($cartItem as $item)
                      
                    <div class="row justify-content-center product_data">

                        <div class="col-md-2">
                            <img src="{{asset('storage/images/'.$item->products->image)}}"  alt="image here" style="height: 70px; width:70px;" class="p-2">
                        </div>
                              
                        <div class="col-md-3">

                          <h6 class="p-3">{{$item->products->name}}</h6>

                        </div>

                        <div class="col-md-2">
                          <h6 class="p-3 selling-price">{{$item->products->selling_price}} TND</h6>

                        </div>

                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{$item->product_id}}">
                            <div class="input-group text-center mt-2 ">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input"  value="{{$item->product_quantity}}" />
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>

                        </div>

                          <div class="col-md-2 p-2">
                            <button class="btn btn-danger delete-cart-item">
                             <i class="fa fa-trash"></i> Remove
                            </button>
                          </div>


                       
                    </div>
                    @php
                    $total +=  $item->products->selling_price * $item->product_quantity ;
                 @endphp
                    @endforeach
                    
                </div>
                <div class="card-footer">
                  <h6 >Total Price : {{$total}} TND</h6>
                  <button class="btn btn-success float-right">Proceed to Checkout</button>
                </div>
            </div>
        </div>

      
        


<script src="{{ asset("js/jquery-3.4.1.min.js") }}" ></script>

<!-- popper js -->
<script src="{{ asset("js/popper.min.js") }} " ></script>
<!-- bootstrap js -->
<script src=" {{ asset("js/bootstrap.js") }}" ></script>
<!-- custom js -->
<script src="{{ asset("js/custom.js") }}" ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{asset('/js/cart.js')}}"></script>


@include('home.footer')
