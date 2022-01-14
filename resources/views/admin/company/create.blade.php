@extends('admin_layouts.master')
@section('style')
	@if(Session::get('success')) 
    	<script>
    	    $(document).ready(function () {
    	        toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
    	    });
    	</script>
	@endif
@endsection
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('admin.company.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-building"></i>Create Company</h4>
                        <div class="row">
                          	<div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Company Name</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name"
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>
                        	<div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2" class="form-control border-primary" placeholder="Email"
                                        name="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password" class="form-control border-primary" placeholder="Password"
                                        name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput4">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password_confirmation" class="form-control border-primary" placeholder="Confirm Password"
                                        name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput1" class="form-control border-primary" placeholder="Location"
                                        name="location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Phone</label>
                                    <div class="col-md-9">
                                        <input type="number" id="userinput2" class="form-control border-primary" placeholder="Phone"
                                        name="phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Founded</label>
                                    <div class="col-md-9">
                                        <input type="date" id="userinput1" class="form-control border-primary" placeholder="Founded"
                                        name="founded" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Services</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2" class="form-control border-primary" placeholder="Services"
                                        name="services" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">No of Employees</label>
                                    <div class="col-md-9">
                                        <input type="number" id="userinput1" class="form-control border-primary" placeholder="No of Employees"
                                        name="employees" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Website URL</label>
                                    <div class="col-md-9">
                                        <input type="url" id="userinput2" class="form-control border-primary" placeholder="URL"
                                        name="website_url" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Logo</label>
                                    <div class="col-md-9">
                                        <input type="file" id="userinput1" class="form-control border-primary"
                                        name="logo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Cover</label>
                                    <div class="col-md-9">
                                        <input type="file" id="userinput2" class="form-control border-primary"
                                        name="cover" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">About</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" name="about" placeholder="About "></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary" onclick="return Validate()">
	                          	<i class="la la-check-square-o"></i> Save
	                        </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  function Validate() 
  {
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
@endsection
