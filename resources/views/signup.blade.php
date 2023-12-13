@include('layouts.header')

@if(session('success'))
<div class="session">	{{session('success')}} </div>
@elseif(session('error'))
<div class="session">	{{session('error')}} </div>
@endif
<div id="about">

	{{-- validation msg --}}
    <div class="container">
      
      <div class="section-title text-center center">
        <h2>Signup Here</h2>
        <hr>
      </div>
      <div class="row">
        {{-- <div class="col-xs-12 col-md-6 text-center"> <img src="{{asset('assets/img/about.jpg')}}" class="img-responsive" alt=""> </div> --}}
        <div class="col-xs-12 col-md-6">
         
          <div class="about-text">
            <form class="form" id="signupForm" action="{{route('signup-form')}}"  method="post">
              @csrf
              <label for="username"> Enter Username:</label>
              <input type="text" id="username" name="username">
              <label for="password"> Enter Password:</label>
              <input type="password" id="password" name="password">
              <button type="submit">Signup</button>
            </form>
              <center>Already Have An Account ? <a class="link" href="{{url('/login')}}">Login</a></center>
              {{-- <button><a href="{{route('login')}}">Login</a></button> --}}
            {{-- </form> --}}
          </div>
        </div>
        <div class="col-xs-12 col-md-6 text-center"> <img src="{{asset('assets/img/sign.avif')}}" class="img-responsive" alt=""> </div>
      </div>
    </div>
  </div>