    <div class="container mt-5">

       <div class="heading_container heading_center">
          <h2>
              <span>Categories</span>
          </h2>
       </div>

        <div class="owl-carousel owl-theme">    
            @foreach ($category as $category)
                
            <div class="item">
            <div class="card category" >

             <img src="{{ asset('storage/images/'.$category->image)}}" 
             alt="Category image" 
             height="250px"
             class="category-image">
             <div class="category-name">
                <a href="{{ url('/view-category/'.$category->slug)}}" style="color:white;">{{$category->name}}</a>
             </div>

            </div>
            </div>
            @endforeach

        </div>
    
    </div>
  

 <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63b0920147425128790b028b/1glkrkm5u';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
 
    <!--End of Tawk.to Script-->