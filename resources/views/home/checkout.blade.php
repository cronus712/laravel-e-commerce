<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('home.navbar')


<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('/images/checkout.jpg')}}" alt="" width="220" height="72">
    </div>
    <div class="row">
        {{-- <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
             
         
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>
    
        </div> --}}

        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Order Details :</span>
            </h4>
            <hr>
                    
               <table class="table-striped table-bordered" style="width: 100%; height:auto;">
               
                <thead>
                    <tr style="line-height: 35px;min-height: 35px;height: 35px;">
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItem as $item)

                    <tr style="line-height: 50px;min-height: 50px;height: 50px;">
                        <td>{{$item->products->name}}</td>
                        <td>{{$item->product_quantity}}</td>
                        <td>{{$item->products->selling_price}}</td>
                    </tr>
                    @endforeach

                </tbody>
               </table>

         
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
               {{-- <button class="btn btn-success">Place Order</button> --}}
    
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>


            <form class="needs-validation" novalidate="" action="{{url('place-order')}}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" id="firstName" placeholder=" full name" name="name" value="{{ old('name') }}" required="">
                        <div class="invalid-feedback"> Valid name is required. </div>
                    </div>
               
                </div>
       
                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
           
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" name="country" required="" value="{{ old('country') }}">
                            <option >Choose...</option>
                            <option>Tunisia</option>
                            <option>Libya</option>
                        </select>
                        <div class="invalid-feedback"> Please select a valid country. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" name="state" required="" value="{{ old('state') }}">
                            <option value="">Choose...</option>
                            <option>Ohio</option>
                            <option>Boujaber</option>

                        </select>
                        <div class="invalid-feedback"> Please provide a valid state. </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip" placeholder="" required="" value="{{ old('zip') }}">
                        <div class="invalid-feedback"> Zip code required. </div>
                    </div>
                </div>
              
             
                <hr class="mb-4">
                {{-- <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Name on card</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Full name as displayed on card</small>
                        <div class="invalid-feedback"> Name on card is required </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Credit card number</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                        <div class="invalid-feedback"> Credit card number is required </div>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="cc-expiration">Expiration</label>
                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                        <div class="invalid-feedback"> Expiration date required </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                        <div class="invalid-feedback"> Security code required </div>
                    </div>
                </div> --}}
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{asset('/js/cart.js')}}"></script>

@include('home.footer')
