@extends('admin.dashboard')

@section('category')
    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Categories</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
@endsection
