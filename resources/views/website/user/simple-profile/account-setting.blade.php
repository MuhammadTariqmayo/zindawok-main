@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
    <div class="mt-3 container p-0">
        <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">Account Setting</h4>
        </div>
    </div>
    <div class="p-3 mt-3 bg-white container pt-5" style="border-radius: 10px;">
    	<form method="POST" action="{{route('user.profile.setting.update' , $user->id) }}">
    		@method('PUT')
    		@csrf 
	        <div class="d-md-flex align-items-center mb-3">
	            <label style="flex: 1" class="mb-md-0 mr-sm-4 text-md-right" for="email">Email:</label>
	            <input style="flex: 2" type="email" name="email" value="{{ $user->email}}" class="form-control mb-0 mr-sm-2" placeholder="Enter email"
	                  id="email" readonly>
	        </div>
	    	<div class="d-md-flex align-items-center mb-3">
	            <label style="flex: 1" class="mb-md-0 mr-sm-4 text-md-right " for="email">Password:</label>
	            <input style="flex: 2" type="password" name="current_password" class="form-control mb-md-0 mr-sm-2" placeholder="Enter password"
	                  id="email">
	        </div>
	        <div class="d-md-flex align-items-center mb-3">
	            <label style="flex: 1" class="mb-md-0 mr-sm-4 text-md-right" for="email">New Password:</label>
	            <input style="flex: 2"  type="password" name="password" class="form-control mb-md-0 mr-sm-2" placeholder="Enter new password"
	            id="password">
	        </div>
	        <div class="d-md-flex align-items-center mb-3">
	            <label style="flex: 1" class="mb-md-0 mr-sm-4 text-md-right" for="email">Confirm Password:</label>
	            <input style="flex: 2" type="password" class="form-control mb-md-0 mr-sm-2"
	                  placeholder="Enter confirm password" id="password_confirmation">
	        </div>
			<div class="d-md-flex align-items-center mb-3">
	            <label style="flex: 1" class="mb-md-0 mr-sm-4 text-md-right " for="email">Activate Account:</label>
	                <div style="flex:2" class="form-control mb-md-0 mr-sm-2">
	                  	<div class="custom-control custom-switch">
	                     	<input type="checkbox" name="is_active" class="custom-control-input" id="switch1" checked="">
	                     	<label class="custom-control-label font-weight-normal" for="switch1">Deactivate Account</label>
	                    </div>
	                </div>
	        </div>
	        <div class="mx-auto col-md-4 p-0 my-4" style="clear: both;">
	            <button type ="submit" class="btn btn-success w-100" onclick="return Validate()">Update</button>
	        </div>
	        </form>
	    
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  function Validate() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password_confirmation").value;
    if (password != confirmPassword) 
    {
      toastr.error('Password and Confirm Password do not match', 'Zindawork Says', {timeOut: 2000})
      return false;
    }
    return true;
  }
</script>
@if(Session::get('success')) 
  <script>
    $(document).ready(function () 
    {
      toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
    });
  </script>
@endif
@if(Session::get('error')) 
  <script>
    $(document).ready(function () 
    {
      toastr.error('<?php echo Session::get('error');?>', 'Zindawork Says', {timeOut: 2000})
    });
  </script>
@endif
@endsection