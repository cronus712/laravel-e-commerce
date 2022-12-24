
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="index.html">Home </a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>

                @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard')}} ">Dashboard</a>
               </li>

                @endif
                
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>

                @if (Route::has('login'))

                  @auth

          
                  <li class="nav-item dropdown mt-1 ml-5 " style="font-size:12px;font-family:'arial';" >
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#f7444e;">
                        {{-- <img class="image rounded-circle" src="{{asset('/storage/app/public/profile-photos'.Auth::user()->profile_photo_path)}}"  style="width: 50px;height: 50px; "> --}}
                         {{ Auth::user()->name }}
                     </a>
                   

                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown ">
                        <a class="dropdown-item " href="{{ route('profile.show') }}">
                           Profile
                            </a>

                         <a class="dropdown-item mt-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                         
               
                     </div>
                 </li>

                @else

                <li class="nav-item ">
                  <a class="btn btn-primary ml-5" href={{route('login')}}>Login</a>
                </li>

               <li class="nav-item ml-2">
                  <a class="btn btn-light " href={{route('register')}}>Register</a>
                </li>

                @endauth
               @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>
