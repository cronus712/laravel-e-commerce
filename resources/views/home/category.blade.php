
    <div class="container mt-5">

       <div class="heading_container heading_center">
          <h2>
              <span>Categories</span>
          </h2>
       </div>

        <div class="owl-carousel owl-theme">    
            @foreach ($category as $category)
                
            <div class="item">
                <div class="card category">
             <img src="{{ asset('storage/images/'.$category->image)}}" alt="Category image" style="height:300px;width:400px" class="category-image">

             <div class="category-name">
                <a href="#" style="color:white;">{{$category->name}}</a>
             </div>

            </div>
            </div>
            @endforeach

        </div>
    
    </div>
  

 