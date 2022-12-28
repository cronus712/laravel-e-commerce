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

        <div class="container">

            <div class="card shadow product_data">
                <div class="card-body">

                    <nav aria-label="breadcrumb" >
                        <ol class="breadcrumb" style="background-color: rgba(225, 186, 29, 0.673)">
                          <li class="breadcrumb-item">Collections</li>
                          <li class="breadcrumb-item">{{$product->category->name}}</li>
                          <li class="breadcrumb-item active">{{$product->name}}</li>
                        </ol>
                      </nav>
                        
                    <h3 class="card-subtitle">{{$product->name}}
                    @if ($product->trending == 'on')
                    <div class=" badge bg-danger float-right" style="font-size: 16px;"> Trending</div>
                   </h3>
                    @endif
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                       <img src="{{asset('storage/images/'.$product->image)}}" class="img-responsive" style="height: 100%;width:400px;">
                        </div>
                        
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5">{{$product->name}}</h4>
                            <p>{{$product->small_description}}</p>
                            <hr>
                            @if ($product->quantity > 0)
                                <label class="badge bg-success">In Stock</label>
                            @else
                            <label class="badge bg-danger">Out Stock</label>
                            @endif
                            <h2 class="mt-5">
                               <small style="font-size: 16px;color:rgba(0, 0, 0, 0.373);"> Original Price : <s>{{$product->original_price}} TND</s></small>
                               <label class=" float-right" style="font-size: 20px;">
                                Selling Price : <b>{{$product->selling_price}} TND</b>
                            </label>
                            </h2>
                              <hr>

                                <div class="col-md-3 float-left">
                                    <input type="hidden" value="{{$product->id}}" class="prod_id">
                                    <div class="input-group text-center ">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" value="1" class="form-control qty-input" />
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>

                                </div>

                            <button class="btn btn-success btn-rounded mr-1 addToCartBtn" >
                                Add To Cart <i class="fa fa-shopping-cart"></i>
                            </button>
                            <button class="btn btn-info btn-rounded">Add To Wishlist</button>

                            <h4 class="box-title mt-5">Product Description</h4>
                            <p >{{$product->description}}</p>

                        </div>
                    </div>
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
