@extends('frontend.master')
 <!-- Start footer part -->
@section('title')
  Page Not Found
@endsection
<style>
   .error_container{
    width: 500px; height:250px; margin:auto;
    position: relative;
    top: 90px;
    text-align: center;
   } 
   .error_container h1{
     font-size: 10rem;
   }
</style>
@section('main')
 
<main>
  <div class="error_container">
    <h1>404</h1>
    <p>We are sorry The page you have requested is not available</p>
    <a href="{{url('/')}}"> <i class="fa fa-home" style="margin-right: 10px;"> Go to Home Page</i>   </a>
  </div>
</main>
@endsection

