
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
       
         @foreach ($product as $product)
                 
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      {{$product->name}}
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{ asset('storage/images/'.$product->image)}}" alt="Product image">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$product->small_description}}
                   </h5>
                   <h6>
                     <span class="float-start" style="color:#f7444e">{{$product->selling_price}} TND</span>
                     <span class="float-end ml-3"><s>{{$product->original_price}}</s></span>
   
                   </h6>
                </div>
             </div>
          </div>
          @endforeach
       </div>

       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
