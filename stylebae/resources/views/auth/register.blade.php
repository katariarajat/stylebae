@extends('frontend.master')
@section('title')
 Register
@endsection
<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: rgba(255, 1, 1, 0.1)
}

.card {
    border: none;
    border-radius: 0;
    width: 420px !important;
    margin: 0 auto
}

.signup {
    display: flex;
    flex-flow: column;
    justify-content: center;
    padding: 10px 50px
}

a {
    text-decoration: none !important
}

h5 {
    color: #ff0147;
    margin-bottom: 3px;
    font-weight: bold
}

small {
    color: rgba(0, 0, 0, 0.3)
}

input {
    width: 100%;
    display: block;
    margin-bottom: 7px
}
.form-group{
    margin-bottom: 20px;
}
.form-control {
    border: 1px solid #dc354575;
    border-radius: 30px;
    background-color: rgba(0, 0, 0, .075);
    letter-spacing: 1px
}

.form-control:focus {
    border: 0.5px solid #dc354575;
    border-radius: 30px;
    box-shadow: none;
    background-color: rgba(0, 0, 0, .075);
    color: #000;
    letter-spacing: 1px
}

.btn {
    display: block;
    width: 100%;
    border-radius: 30px;
    border: none;
    background: linear-gradient(to right, rgba(249, 0, 104, 1) 0%, rgba(247, 117, 24, 1) 100%);
    background: -webkit-linear-gradient(left, rgba(249, 0, 104, 1) 0%, rgba(247, 117, 24, 1) 100%)
}

.text-left {
    color: rgba(0, 0, 0, 0.3);
    font-weight: 400
}

.text-right {
    color: #ff0147;
    font-weight: bold
}

span.text-center {
    color: rgba(0, 0, 0, 0.3)
}

.fab {
    padding: 15px;
    font-size: 23px
}

.fa-facebook {
    color: #0303d9bf
}

.fa-twitter {
    color: #0078fade
}

.fa-linkedin {
    color: #18b1c0
}
@media screen and (max-width: 480px) {
    .container{
        display: none;
    }
    #mob_view{
    display: block;
    }
    .row form{
        max-width: 80%;
        margin: auto;
    }

}

</style>
@section('main')
<main>
   <!-- //////////// Mobile view ///////// -->
   <div id="mob_view">
        <div class="row">
        <img src="{{ asset('upload/styleBaelogo.jpg')}}" alt="" style="width:100px; height:100px; margin:auto">
        </div>
        <div class="row">
        <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        @error('name')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone"  name="phone" class="form-control" placeholder="Phone">
                        @error('phone')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <input type="password" id="password"  name="password" class="form-control" placeholder="password">
                        @error('password')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <input type="password" id="password_confirmation"  name="password_confirmation" class="form-control" placeholder="Confirm">
                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                               {{message}}
                            </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" Value="Sign up">
                    <!-- <div class="row">
                        <div class="col-6 col-sm-6"> <a href="{{ route('password.request') }}">
                                <p class="text-left pt-2 ml-1">Forgot password?</p>
                            </a> </div>
                        <div class="col-6 col-sm-6"> <a href="{{route('register')}}">
                                <p class="text-right pt-2 mr-1">Sign Up Now</p>
                            </a> </div>
                     </div>  <span class="text-center">Or</span> <span class="text-center pt-3">Login Using</span>
                    <div class="row">
                        <div class="d-flex mx-auto pt-1 pb-3"> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> </div>
                    </div> -->
                </form>
        </div>
    </div>
    <!-- //////////// end Mobile view ///////// -->
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto py-4 px-0">
    
          
            <div class="card p-0">
                <div class="card-title text-center">
                <img src="{{ asset('upload/styleBaelogo.jpg')}}" alt="" style="width:100px; height:100px; margin:auto">
                </div>
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        @error('name')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone"  name="phone" class="form-control" placeholder="Phone">
                        @error('phone')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <input type="password" id="password"  name="password" class="form-control" placeholder="password">
                        @error('password')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <input type="password" id="password_confirmation"  name="password_confirmation" class="form-control" placeholder="Confirm">
                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                               {{message}}
                            </span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" Value="Sign up">
                    <!-- <div class="row">
                        <div class="col-6 col-sm-6"> <a href="{{ route('password.request') }}">
                                <p class="text-left pt-2 ml-1">Forgot password?</p>
                            </a> </div>
                        <div class="col-6 col-sm-6"> <a href="{{route('register')}}">
                                <p class="text-right pt-2 mr-1">Sign Up Now</p>
                            </a> </div>
                     </div>  <span class="text-center">Or</span> <span class="text-center pt-3">Login Using</span>
                    <div class="row">
                        <div class="d-flex mx-auto pt-1 pb-3"> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-linkedin"></i></a> </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
   

</main>
@endsection