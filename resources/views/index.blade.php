@include('layouts.header')

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="{{ Auth::guard('signup')->check() ? 'authenticated' : '' }}">
  <!-- Navigation
      ==========================================-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        {{-- login - logout functionality --}}
        @if(!Auth::guard('signup')->check())
          <a class="navbar-brand page-scroll" href="{{url('/login')}}">Login</a> </div>
        @else
          <a class="navbar-brand page-scroll" href="{{url('/logout')}}">logout : 
                {{Auth::guard('signup')->user()->username}}</a> </div>
        @endif
        {{-- header links  --}}
        @if (Auth::guard('signup')->check())
        <header>
        <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#about" class="page-scroll">About</a></li>
              <li><a href="#services" class="page-scroll">New</a></li>
              <li><a href="#portfolio" class="page-scroll">Blog</a></li>
              {{-- <li><a href="{{url('category/{id}')}}" class="page-scroll">Category</a></li> --}}
              <li><a href="#team" class="page-scroll">Team</a></li>
              <li><a href="#contact" class="page-scroll">Contact</a></li>
            </ul>
          </div>
        </header>
        @endif
        {{-- message passing through session --}}
        @if(session('success'))
        <div id="success-alert" class="alert alert-success">	{{session('success')}} 
        </div>
        @elseif(session('error'))
        <div id="error-alert" class="alert alert-danger">	{{session('error')}} </div>
        @endif
        <!-- /.navbar-collapse --> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Automatically remove success message after 5 seconds
    $(document).ready(function(){
        $("#success-alert").fadeTo(2000, 200).slideUp(200, function(){
            $("#success-alert").slideUp(200);
        });
    });

    // Automatically remove error message after 5 seconds
    $(document).ready(function(){
        $("#error-alert").fadeTo(2000, 200).slideUp(200, function(){
            $("#error-alert").slideUp(200);
        });
    });
</script>
    </div>
  </nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1><strong>HUB</strong> <span>/</span> Design Canvas</h1>
            <p>"Design is where science and art break even." - Robin Mathew</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">Learn More</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="section-title text-center center">
      <h2>ABOUT US</h2>
      <hr>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6 text-center"> <img src="{{asset('assets/img/living3.avif')}}" class="img-responsive" alt=""> </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h3>Our Journey :</h3>
          <p>From a small studio to a global design powerhouse, 
            Design Canvas has evolved through a decade of passion and dedication. 
            Our journey has been marked by the successful collaboration with clients
            from diverse industries and the creation of impactful design solutions.</p>
          <h3>Our Team :</h3>
          <p>
            Meet the talented individuals who make Design Canvas a creative hub. 
            From graphic designers to UX/UI experts, our team brings a wealth of experience and
            a fresh perspective to every design challenge.
            Together, we strive to push the boundaries of design innovation.
          </p>
          <h3>Social Responsibility :</h3>
          <p>
            Beyond design, we believe in making a positive impact on society.
            Design Canvas is actively involved in initiatives promoting environmental 
            sustainability and community development. We believe that design can be a 
            force for positive change.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<div id="services">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title text-center">
      <h2> Add New Blog</h2>
      <hr>
      <p>Here we provide you a space to add new blog that you want to share with people.</p>
    </div>
    <div class="row">
      <form action="{{route('addblog')}}" method="post" enctype="multipart/form-data" class="blog-form">
        @csrf
        <br/>
        
        <label for="image">Blog Image:</label>
        <input type="file"  name="image" accept="image/*" required>
    
        <label for="projectName">Blog Name:</label>
        <input type="text"  name="projectName" required>

        <label for="projectName">Blog Description:</label>
        <input type="text"  name="description" required>
    
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            {{-- categories from backend  --}}
            @foreach ($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        <button type="submit" name="save">Add Blog</button>
      </form>
    </div>
  </div>
</div>
<!-- Portfolio Section -->
<div id="portfolio">
  <div class="container">
    <div class="section-title text-center center">
      <h2> All Blogs</h2>
      <hr>
      <p>These All Our Ideas About the Decor </p>
    </div>
    {{-- <div class="categories">
      <ul class="cat">
        @foreach($category as $cat)
        <li>
          <ol class="type">
            {{-- <li><a href="{{url('/category')}}">VIEW MORE</a></li> --}}
            {{-- <li><a href="{{url('/'.$cat->id) }}" data-filter="*" class="active">{{$cat->name}}</a></li>
          </ol>
        </li>
        @endforeach
      </ul>
      <div class="clearfix"></div>
    </div> --}}


    <!-- Index.blade.php -->
    <div class="mb-3">
      <label for="category" class="form-label">Select Category:</label>
      <select id="categorySelect" class="form-select">
          <option value="">Select a category</option>
          @foreach($category as $cat)
              <option value="{{ route('category', ['id' => $cat->id]) }}">{{ $cat->name }}</option>
          @endforeach
      </select>
    </div>



    <div class="row">
      <div class="portfolio-items">
        @foreach($data as $row)
        
        <div class="col-sm-6 col-md-4 col-lg-4 residential">
          <div class="portfolio-item">
            <div class="hover-bg"> 
              {{-- <a href="{{asset($row->image)}}" data-lightbox-gallery="gallery1"> --}}
              <div class="hover-text">
                <h4>{{$row->pname}}
                </h4>
              </div>
              {{-- <div class="hover-btn"><button>Like</button></div> --}}
              <img src="{{asset( $row->image)}}" class="img-responsive" alt="Project Title"> </a>
            </div>
            {{-- <a href="">See More</a>
            <button class="like-button" data-blog-id="{{ $row->id }}">
              <i class="fas fa-thumbs-up"></i> Like
          </button> --}}
         </div>
        </div>
         @endforeach
      
      </div>
    </div>
  </div>
</div>
<!-- Team Section -->
<div id="team" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-8 col-md-offset-2 section-title">
        <h2>Meet the Team</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
      </div>
      <div id="row">
        <div class="col-md-3 col-sm-6 team">
          <div class="thumbnail"> <img src="{{asset('assets/img/team/01.jpg')}}" alt="..." class="team-img">
            <div class="caption">
              <h3>John Doe</h3>
              <p>Director</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 team">
          <div class="thumbnail"> <img src="{{asset('assets/img/team/02.jpg')}}" alt="..." class="img-circle team-img">
            <div class="caption">
              <h3>Mike Doe</h3>
              <p>Senior Designer</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 team">
          <div class="thumbnail"> <img src="{{asset('assets/img/team/03.jpg')}}" alt="..." class="img-circle team-img">
            <div class="caption">
              <h3>Jane Doe</h3>
              <p>Senior Designer</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 team">
          <div class="thumbnail"> <img src="{{asset('assets/img/team/04.jpg')}}" alt="..." class="img-circle team-img">
            <div class="caption">
              <h3>Karen Doe</h3>
              <p>Project Manager</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Us</h2>
      <hr>
      <p>YOU CAN CONTACT DESIGN CANVAS's TEAM AS FOLLOW </p>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="contact-item"> <span>Address</span>
        <p>4321 California St,<br>
          San Francisco </p>
      </div>
      <div class="contact-item"> <span>Email</span>
        <p>info@company.com</p>
      </div>
      <div class="contact-item"> <span>Phone</span>
        <p> +1 123 456 1234</p>
      </div>
    </div>
    <div class="col-md-8">
      <h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" method="post" action="{{route('contact')}}">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" name="name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email"  name="email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" name="message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
      </form>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="social">
      <ul>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
      </ul>
    </div>
    <div>
      <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('assets/js/jquery.1.11.1.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/SmoothScroll.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/nivo-lightbox.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/jquery.isotope.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/jqBootstrapValidation.js')}}"></script> 
{{-- <script type="text/javascript" src="{{asset('assets/js/contact_me.js')}}"></script>  --}}
<script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

    @if (!Auth::guard('signup')->check())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.body.style.overflow = 'hidden';
                window.addEventListener('beforeunload', function() {
                    document.body.style.overflow = 'hidden';
                });
            });
        </script>
    @endif
    @if (Auth::guard('signup')->check())
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              document.body.style.overflow = 'auto';
              window.addEventListener('beforeunload', function() {
                  document.body.style.overflow = 'auto';
              });
          });
        </script>
        <script>
          document.getElementById('categorySelect').addEventListener('change', function() {
              var selectedCategoryUrl = this.value;
              if (selectedCategoryUrl) {
                  window.location.href = selectedCategoryUrl;
              }
          });
        </script>
    @endif
</body>
</html>
