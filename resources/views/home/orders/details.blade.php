<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


@include('home.navbar')

<div class="container my-5">

    <div>
        <h4 >
            <a class="btn btn-primary my-4" href="{{url('my-orders')}}"><i class="fa-solid fa-backward"></i> Back</a>
        </h4>
    </div>
<div class="row">



<div class="col-md-6">
 
    <label for="">Name</label>
    <div class="border p-2">{{$orders->name}}</div>

    <label for="">Email</label>
    <div class="border p-2">{{$orders->email}}</div>

    <label for="">Address</label>
    <div class="border p-2">{{$orders->address}}</div>

    <label for="">Country</label>
    <div class="border p-2">{{$orders->country}}</div>

    <label for="">State</label>
    <div class="border p-2">{{$orders->state}}</div>

    <label for="">Zip</label>
    <div class="border p-2">{{$orders->zip}}</div>
</div>

<div class="col-md-6">
    <table class="table " style="border-collapse: separate;border-spacing: 1em;">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col"> Price</th>
            <th scope="col">Image</th>
 
          </tr>
        </thead>
        <tbody>
    
            @foreach ($orders->orderitems as $order)
          <tr>
              <td>{{$order->products->name}}</td>
              <td>{{$order->quantity}}</td>
              <td>{{$order->price}} TND</td>
              <td> <img src="{{asset('storage/images/'.$order->products->image)}}" alt="" width="50px" height="50px"></td>

          </tr>
           @endforeach
          
        </tbody>
      </table>
      <h4 class="p-3 float-right" style="background-color: rgba(205, 112, 36, 0.496)">Total : {{$orders->total_price}} TND</h4>
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
</div>
</div>

@include('home.footer')
