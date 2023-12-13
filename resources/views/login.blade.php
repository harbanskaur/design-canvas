@include('layouts.header')
<div id="about">
    <div class="container">
      <div class="section-title text-center center">
        <h2>Login Here</h2>
        <hr>
      </div>
      <div class="row">
        {{-- <div class="col-xs-12 col-md-6 text-center"> <img src="{{asset('assets/img/about.jpg')}}" class="img-responsive" alt=""> </div> --}}
        <div class="col-xs-12 col-md-6">
          <div class="about-text">
            {{-- <h3>The Studio</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo 
                nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
            <h3>How We Work</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo 
                nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p> --}}
				<form class="form" id="loginForm" action="{{route('login-form')}}" method="post">
          @csrf
					<input type="text"  name="username" placeholder="Username:" >
					<input type="password"  name="password" placeholder="Password:" >
          {{-- <span  class="position-absolute top-60 end-10 translate-middle-y" onclick="togglePassword()">
            <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
          </span> --}}
					<button type="submit">Login</button>
					<button type="">Login with Google</button>
					<button type="">Login with Facebook</button>
        </form>
					<center>Don't Have An Account ? <a class="link" href="{{url('/signup')}}">Signup</a></center>
					
				{{-- </form> --}}
          </div>
        </div>
        <div class="col-xs-12 col-md-6 text-center"> <img src="{{asset('assets/img/login.avif')}}" class="img-responsive" alt=""> </div>
      </div>
    </div>
  </div>