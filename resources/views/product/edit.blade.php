@extends('product.layout') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit Product</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="cases">Category:</label>
            <select name="category_id" class="form-control" value="{{ $product->category }}">
                {{-- <option disabled selected value> -- select a user -- </option> --}}
                @foreach ($category as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
                @endforeach
            </select>
        </div>
        </div>
 
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input class="form-control" value="{{ $product->name }}" name="name" ></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Small Description:</strong>
                <input class="form-control" value="{{ $product->small_description }}" name="small_description" ></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Description:</strong>
                <textarea class="form-control"  name="description" >{{ $product->description }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Original Price:</strong>
                <input type="number" name="original_price" class="form-control" value="{{$product->original_price}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Selling Price:</strong>
                <input type="number" name="selling_price" class="form-control" value="{{$product->selling_price}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tax:</strong>
                <input type="number" name="tax" class="form-control" value="{{$product->tax}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-check">
                <input type="hidden" name="status" value="off">
                <input class="form-check-input" type="checkbox"  name="status" {{$category->status == "on" ? 'checked':'' }} >
                <label class="form-check-label" for="flexCheckDefault">
                    <strong> Status:</strong>
                </label>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-check">
                    <input type="hidden" name="popular" value="off">
                    <input class="form-check-input" type="checkbox"  name="trending"  {{$category->trending == "on" ? 'checked':'' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        <strong> Trending:</strong>
                    </label>
                  </div>
                </div>

                 @if ($product->image)
                 <img class="mt-4 mb-2" src="{{asset('storage/images/'.$product->image)}}" style="width:200px; height:200px;">
                 @endif
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" id="image" />
                    
                    </div>
                </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                <input class="form-control" value="{{ $product->meta_title }}" name="meta_title"></input>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <input class="form-control" value="{{ $product->meta_description }}" name="description"></input>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Keywords:</strong>
                <input class="form-control" value="{{ $product->meta_keywords }}" name="meta_keywords"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
              </div>
        </form>
    
</div>
@endsection