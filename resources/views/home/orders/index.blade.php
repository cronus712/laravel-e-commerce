<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


@include('home.navbar')

<div class="container my-5">

<table class="table " style="border-collapse: separate;border-spacing: 1em;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Reference</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($orders as $order)

      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->reference}}</td>
        <td>{{$order->total_price}} TND</td>
        <td>{{$order->status == 'waiting' ? 'waiting' : 'complete'}}</td>
        <td class="btn btn-info  m-2 "><a href="{{url('order-details/'.$order->id)}}" style="color: white;">Details</a></td>
        
      </tr>
       @endforeach
      
    </tbody>
  </table>

  <script src="{{ asset("js/jquery-3.4.1.min.js") }}" ></script>

<!-- popper js -->
<script src="{{ asset("js/popper.min.js") }} " ></script>
<!-- bootstrap js -->
<script src=" {{ asset("js/bootstrap.js") }}" ></script>
<!-- custom js -->
<script src="{{ asset("js/custom.js") }}" ></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</div>

@include('home.footer')
