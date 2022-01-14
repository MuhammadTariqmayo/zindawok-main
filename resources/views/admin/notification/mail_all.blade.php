@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('admin.all_email.send')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-envelope"></i>Send Email to All</h4>
                        <div class="row">
                          	<div class="col-md-12">
                            	<div class="form-group row">
	                              	<label class="col-md-1 label-control" for="userinput1">Subject</label>
		                            <div class="col-md-11">
		                                <input type="text" id="userinput1" class="form-control border-primary" placeholder="Subject"
		                                name="title" required>
		                            </div>
                        		</div>
                     		</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-1 pr-0 label-control" for="userinput1">Description</label>
                                    <div class="col-md-11">
                                        <textarea id="projectinput9" rows="10" class="form-control" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-1 label-control" for="userinput1">Image</label>
                                    <div class="col-md-11">
                                        <input type="file" id="file" class="form-control border-primary"
                                        name="image" onchange="return fileValidation()">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
	                          	<i class="la la-check-square-o"></i> send
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
<script> 
        function fileValidation() { 
            var fileInput =  
                document.getElementById('file'); 
              
            var filePath = fileInput.value; 
            var image = document.getElementById("file");
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                toastr.error('Invalid File Type', 'Zindawork Says', {timeOut: 2000}) 
                fileInput.value = ''; 
                return false; 
            } 
            else if (typeof (image.files) != "undefined") {

                var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2); 

                if(size > 2) {

                    toastr.error('Please select image size less than 2 MB' , 'Zindawork Says', {timeOut: 2000});
                    return false;

                }else{

                    return true;

                }

            }
            else  
            { 
              
                // Image preview 
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
            } 
        } 
</script> 
@endsection
