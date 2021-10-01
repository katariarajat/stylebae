@extends('backend.admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-12">
        <div class="col-8" style="margin: auto; margin-top:25px">
        <div class="box" id="element-2">
    <div class="box-header with-border">
        <h5>Profile Update</h5>
    </div>
    <div class="box-body">
        
        <form method="post" action="{{ route('admin.user.profile.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="" value="{{$user->id}}">
            <div class="form-group">
        <h5>Name <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="name" class="form-control" required="" value="{{$user->name}}">
                        
        </div>
        </div>
        <div class="form-group">
            <h5>Email <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="email" name="email" class="form-control" required="" value="{{$user->email}}">
                            
            </div>
        </div>
        <div class="form-group">
            <h5>Phone <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="phone" class="form-control" required="" value="{{$user->phone}}">
                            
            </div>
        </div>
        <div class="form-group">
            <h5>Profile Image <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="file" name="profile_photo_path" class="form-control"  id="image" >
                            
            </div>
        </div>
        <div class="form-group">
            
            <div class="controls" style="width: 40%; margin:auto">
                <input type="submit"  class="btn btn-danger btn-sm btn-block" value="Update" >
                            
            </div>
            
    </form>

        </div>
    </div>
        </div>
    </div>
</div>

@endsection