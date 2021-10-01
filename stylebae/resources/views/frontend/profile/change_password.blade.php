
@extends('frontend.profile.profile_master')
@section('user_main')


<div class="box" id="element-2">
    <div class="box-header with-border">
        <h5> Change Password</h5>
    </div>
    <div class="box-body">
        
        <form method="post" action="{{ route('update.user.password')}}" >
            @csrf

            <div class="form-group">
                <h5>Current Password <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="password" id="current_password" name="oldpassword" class="form-control" required=""  >
                        
                </div>
            
            </div>

            <div class="form-group">
                <h5>New Password <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="password" id="password" name="password" class="form-control" required=""  >
                        
                </div>
            
            </div>

            <div class="form-group">
                <h5>Password Confirmation <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required=""  >
                        
                </div>
            
            </div>

        <div class="form-group">
            
            <div class="controls">
                <input type="submit"  class="btn btn-danger btn-sm btn-block" value="Update" >
                            
            </div>
        </div>    
    </form>

        </div>
    </div>
@endsection