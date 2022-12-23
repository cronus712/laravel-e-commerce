@extends('category.layout') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit Category</h1>
 
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
        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
            @method('PUT') 
            @csrf
            <div class="row">
 
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name:</strong>
                <input class="form-control" value="{{ $category->name }}" name="name" ></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Slug:</strong>
                <input class="form-control" value="{{ $category->slug }}" name="slug" ></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Description:</strong>
                <textarea class="form-control"  name="description" >{{ $category->description }}</textarea>
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
                    <input class="form-check-input" type="checkbox"  name="popular"  {{$category->popular == "on" ? 'checked':'' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        <strong> Popular:</strong>
                    </label>
                  </div>
                </div>

                 @if ($category->image)
                 <img class="mt-4 mb-2" src="{{asset('storage/images/'.$category->image)}}" style="width:200px; height:200px;">
                 @endif
                 <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" id="image" />
                    
                    </div>
                </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                <input class="form-control" value="{{ $category->meta_title }}" name="meta_title"></input>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <input class="form-control" value="{{ $category->meta_description }}" name="description"></input>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Keywords:</strong>
                <input class="form-control" value="{{ $category->meta_keywords }}" name="meta_keywords"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
              </div>
        </form>
    
</div>
@endsection