@extends('category.layout')
  
@section('main')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Add New Product</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary" href="{{route('product.index')}}"> Back</a>
        </div>
    </div>
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
   
<form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
  
    
     <div class="row mt-4">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                  <select name="category_id" class="form-control">
                      <option disabled selected value> -- select a category -- </option>
                      @foreach ($category as $category)
                      <option value="{{ $category->id}}">{{ $category->name}}</option>
                      @endforeach
                  </select>
            </div>
            </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Small Description:</strong>
                <input type="text" name="small_description" class="form-control" placeholder="small description" value="{{ old('small_description') }}"> 
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                <textarea type="text" name="description" class="form-control" placeholder="Description" value="{{ old('description') }}"> </textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Original Price:</strong>
                <input type="number" name="original_price" class="form-control" placeholder="original price" value="{{ old('original_price') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Selling Price:</strong>
                <input type="number" name="selling_price" class="form-control" placeholder="selling price" value="{{ old('selling_price') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="quantity" value="{{ old('quantity') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tax:</strong>
                <input type="number" name="tax" class="form-control" placeholder="tax" value="{{ old('tax') }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  name="status" >
            <label class="form-check-label" for="flexCheckDefault">
                <strong> Status:</strong>
            </label>
          </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox"  name="popular" >
            <label class="form-check-label" for="flexCheckDefault">
                <strong> Trending:</strong>
            </label>
          </div>
        </div> 

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Image:</strong>
                <input type="file" class="form-control" name="image" id="image" />
            
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Meta title:</strong>
                <input type="text" name="meta_title" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Meta Description:</strong>
                <input type="text" name="meta_description" class="form-control">
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Meta Keywords:</strong>
                <input type="text" name="meta_keywords" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </div>
</form>
@endsection