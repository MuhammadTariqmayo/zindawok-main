@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
   <div class="container p-0">
      <div class="mt-3">
         <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">Company Profile</h4>
         </div>
      </div>
      <form method="post" action="{{ route('company.simple.profile.update', $company->id)}}" enctype="multipart/form-data">
         @method('PUT')
         @csrf
         <div class="p-3 bg-white border_radius mt-3">
            <h4 class="text-center py-3">Update Profile</h4>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Company Name:</label>
                     <input type="text" name="name" class="form-control p-2" value="{{ $company->name }}" placeholder="Enter company name"
                        id="fn">
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Email:</label>
                     <input type="email" name="email" class="form-control p-2" value="{{ $company->email }}" placeholder="Enter email" id="fn">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-12">
                  <div class="form-group">
                     <label for="fn">Location:</label>
                     <input type="text" class="form-control p-2" name="location" value="{{ $company->location }}" placeholder="Enter location" id="fn">
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Phone:</label>
                     <input type="number" class="form-control p-2" name="phone" value="{{ $company->phone
                      }}" placeholder="Enter phone number"
                        id="fn">
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Founded:</label>
                     <input type="date" class="form-control p-2" name="founded" value="{{ $company->founded }}" id="fn" placeholder="Founded">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Services:</label>
                     <input type="text" class="form-control p-2" name="services" value="{{ $company->services }}" placeholder="Enter service"
                        id="fn">
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">NO. of Employee:</label>
                     <input type="number" name="employees" value="{{ $company->employees }}" class="form-control p-2"
                        placeholder="Enter employee strength" id="fn">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">URL:</label>
                     <input type="url" class="form-control p-2" name="website_url" value="{{ $company->website_url }}" placeholder="Enter web address"
                        id="fn">
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Logo Image:</label>
                     <input type="file"  class="form-control p-2" name="logo" placeholder="upload logo image" id="file" onchange="return fileValidation()">
                  </div>
               </div>
            </div>


            <div class="row">
               <div class="col-md-12 col-12">
                  <div class="form-group">
                     <label for="fn">About:</label>
                     <textarea name="about" type="text" style="height: 150px; resize: none;" class="form-control p-2" id="fn">{{$company->about}}
                     </textarea>
                  </div>
               </div>
            </div>
         </div>

         <div class="mt-3">
            <div class="p-3 bg-white border_radius text-center">
               <div class="row">
                  <div class="col-md-4 mx-auto">
                     <button type="submit" class="btn btn-primary w-100">Update Company Profile</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
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
@if(Session::get('success')) 
  <script>
    $(document).ready(function () 
    {
      toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 3000})
    });
  </script>
@endif
@endsection