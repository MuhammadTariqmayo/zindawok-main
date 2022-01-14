@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
	<div class="mt-3">
        <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">
                Edit Profile
            </h4>
        </div>
    </div>
	<div class="mt-3">
        <div class="p-3 bg-white border_radius">
            <form method="post" action="{{ route('user.simple.profile.update', $user->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="fn" class="mb-1 mr-2 w-100">Full Name 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                    <input type="text" name="name" class="form-control p-2" data-placement="top" data-toggle="tooltip"
                    title="Enter full name" value="{{ $user->name}}" placeholder="Enter full name"  id="fn">
                </div>
                <div class="form-group">
                    <label for="gender" class="mb-1 mr-2 w-100">Gender 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                    <div class="form-control p-2" data-placement="top" data-toggle="tooltip" title="Select gender">
                         <div class="form-check-inline">
                            <input type="radio" name="gender" value="male" {{ $user->gender === "male" ? 'checked' : '' }}> Male
                         </div>
                         <div class="form-check-inline">
                            <input type="radio" name="gender" value="female" {{ $user->gender === "female" ? 'checked' : '' }}> Female
                         </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="mb-1 w-100 mr-2">Date of Birth 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                     <input type="date" name="date_of_birth" value="{{ $user->date_of_birth}}" class="form-control p-2" data-placement="top" data-toggle="tooltip"
                         title="Select date of birth" id="dob">
                </div>
    			<div class="form-group">
                    <label for="pn" class="mb-1 w-100 mr-2">Phone Number 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i>
                    	</span>
                    </label>
                    <input type="number" name="phone" value="{{ $user->phone }}" class="form-control p-2" data-placement="top" data-toggle="tooltip" title="Enter phone number" placeholder="Enter Phone" id="pn">
                </div>
                <div class="form-group">
                    <label for="email" class="mb-1 w-100 mr-2">Email Address 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control p-2" data-placement="top" data-toggle="tooltip" title="Enter email address" placeholder="Enter email address" id="email">
                </div>
                <div class="form-group">
                    <label for="location" class="mb-1 w-100 mr-2">Location 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                    <input type="text" name="location" value="{{ $user->location }}" class="form-control p-2" data-placement="top" data-toggle="tooltip" title="Enter location" placeholder="Enter location" id="location">
                </div>
                <div class="form-group">
                    <label for="upi" class="mb-1 w-100 mr-2">Profile Image 
                    	<span class="float-right">
                    		<i class="fa fa-info-circle"></i> 
                    	</span>
                    </label>
                    <input type="file" name="image" class="form-control p-2" data-placement="top" data-toggle="tooltip" title="Upload profile image" id="file" onchange="return fileValidation()">
                </div>
                <div id="imagePreview"></div>
    			<div class="w-100 mx-auto">
                    <!-- <a href="UserProfile.html"> -->
                         <button class="btn btn-primary p-2 w-100">Update</button>
                    <!-- </a> -->
                </div>
            </form>
            <div class="w-100 mx-auto mt-4">
                <a href="{{ route('user.simple.profile')}}">
                    <button class="btn btn-outline-secondary p-2 w-100">Back</button>
                </a>
             </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script> 
    function fileValidation() 
    { 

        var fileInput = document.getElementById('file'); 
        var filePath = fileInput.value; 
        var image = document.getElementById("file"); 
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
        if (!allowedExtensions.exec(filePath)) { 
        
            toastr.error('Invalid File Type', 'Zindawork Says', {timeOut: 2000}) 
            fileInput.value = '';
            return false; 
        
        }  else if (typeof (image.files) != "undefined") {

            var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 

            if(size > 2) 
            {

                toastr.error('Please select image size less than 2 MB' , 'Zindawork Says', {timeOut: 2000});
                return false;

            } else {

                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                }
                
                return true;

            }

        }
    } 
</script>
@endsection