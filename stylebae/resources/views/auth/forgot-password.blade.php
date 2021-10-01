@extends('frontend.master')
@section('title')
Forgot Password
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

</style>
@section('main')
<main>
   
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto py-4 px-0">
    
          
            <div class="card p-0">
                <div class="card-title text-center">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                            <span class="text-danger" role="alert">
                               {{$message}}
                            </span>
                        @enderror
                    </div>
                   
                    <input type="submit" class="btn btn-primary" Value="Password Rest link">
                    
                </form>
            </div>
        </div>
    </div>
</div>
   

</main>
@endsection