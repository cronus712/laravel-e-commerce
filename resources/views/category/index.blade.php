<link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">

@extends('category.layout')
 
@section('main')
<div class="row">

<div class="col-sm-12">
    <h1 >Categories</h1>
    <div>
    <a href="{{ route('category.create')}}" class="btn btn-success mb-3 float-end">Add Category</a>
</div>  
  
 @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif

  <table class="table table-striped " >
    
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th width="200px">Actions</th>
        </tr>

    
        @foreach($category as $category)
        <tr>
            <th >{{$category->id}}</th>
            <td>{{$category->name}} </td>
            <td>{{$category->description}}</td>
            <td> <img class="rounded-circle  mt-2" src="{{asset('storage/images/'.$category->image)}}" style="width:100px; height:100px;"></td>

            <td>

                <form action="{{ route('category.destroy', $category->id)}}" method="POST">

                    <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary float-end">Edit</a>


                  @csrf
                  @method('DELETE')
                 <button class="btn btn-danger float-end" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
   
  </table>
</div>

    @endsection