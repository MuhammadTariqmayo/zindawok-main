@extends('admin_layouts.master')

@section('style')
 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">

@endsection

@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('admin.company.update' , $company->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-user"></i>Edit Company</h4>
                        <div class="row">
                          	<div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Name</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{ $company->name }}" 
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>
                        	<div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2" class="form-control border-primary" value="{{ $company->email }}" 
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
                                        name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput4">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password_confirmation" class="form-control border-primary" placeholder="Confirm Password"
                                        name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput1" class="form-control border-primary" value="{{$company->location}}" 
                                        name="location" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Phone</label>
                                    <div class="col-md-9">
                                        <input type="number" id="userinput2" class="form-control border-primary" value="{{$company->phone}}"
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
                                        <input type="date" id="userinput1" class="form-control border-primary" value="{{$company->founded}}"
                                        name="founded" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Services</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2" class="form-control border-primary" value="{{$company->services}}"
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
                                        <input type="number" id="userinput1" class="form-control border-primary" value="{{$company->employees}}"
                                        name="employees" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Website URL</label>
                                    <div class="col-md-9">
                                        <input type="url" id="userinput2" class="form-control border-primary" value="{{$company->website_url}}"
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
                                        name="logo">
                                        <img style="width: 100px; height: 100px; margin-top: 10px;" src="/storage/company_logo/{{$company->logo}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Cover</label>
                                    <div class="col-md-9">
                                        <input type="file" id="userinput2" class="form-control border-primary"
                                        name="cover">
                                        <img style="width: 100px; height: 100px; margin-top: 10px;" src="/storage/company_cover/{{$company->cover}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">About</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" name="about" >{{ $company->about }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pb-1">
                                    <label class="col-md-3 label-control" for="userinput1">Status</label>
                                    <input type="checkbox" name="status" id="switchery" class="switchery" checked/>
                                
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

@if(Session::get('success')) 
    <script>
        $(document).ready(function () {
            toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
        });
    </script>
@endif

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


<script type="text/javascript" src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"
  type="text/javascript"></script>
  <script src="{{ asset('app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"
  type="text/javascript"></script>

<script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
@endsection
