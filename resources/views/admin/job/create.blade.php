@extends('admin_layouts.master')
@section('style')
<script>
   $(document).ready(function() {
      $("#industry_id").on('change', function(){
         $("#occupation_id").empty().append("<option value=''>Select Occupation</option>");
         $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
         var industry_id = $("#industry_id").val();
         if(industry_id != "") {
            $.ajax({
                method: "GET",
                url: '/admin/getOccupations/' + industry_id,
                success: function(result) {
                if(result.status == "success") {
                  console.log(result.occupations);
                  $.each(result.occupations, function(key, value){
                     $("#occupation_id").append(
                        "<option value=" + value.id +">"+value.name+"</option>"
                     );
                  });
                }
              }
            });
         }
      });
   });

   $(document).ready(function() {
      $("#occupation_id").on('change', function(){
         $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
         var occupation_id = $("#occupation_id").val();
         if(occupation_id != "") {
            $.ajax({
                method: "GET",
                url: '/admin/getSubOccupations/' + occupation_id,
                success: function(result) {
                if(result.status == "success") {
                  console.log(result.occupations);
                  $.each(result.occupations, function(key, value){
                     $("#sub_occupation").append(
                        "<option value=" + value.id +">"+value.name+"</option>"
                     );
                  });
                }
              }
            });
         }
      });
   });
</script>
@endsection
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('admin.job.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-graduation-cap"></i>Create Job</h4>
                        <div class="row">
                          	<div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Company Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control border-primary" name="company_id" required>
                                            <option selected disabled="">Select Company</option>
                                            @foreach($companies as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        		</div>
                     		</div>
                        	<div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2" class="form-control border-primary" placeholder="Title"
                                        name="title" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Location</label>
                                    <div class="col-md-9">
                                        <select name="city_id" class="form-control border-primary" required>
                                            <option value="" selected="" disabled="">Select your location</option>
                                            @foreach($cities as $city)
                                               <option value="{{ $city->id }}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Industry</label>
                                    <div class="col-md-9">
                                        <select id="industry_id" name="industry_id" class="form-control border-primary" required>
                                            <option value="" selected="" disabled="">Select Industry:</option>
                                            @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Occupation</label>
                                    <div class="col-md-9">
                                        <select name="occupation_id" id="occupation_id" class="form-control border-primary" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Sub Occupation</label>
                                    <div class="col-md-9">
                                        <select name="sub_occupation_id" id="sub_occupation" class="form-control border-primary" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Welcome Bonus</label>
                                    <div class="col-md-9">
                                        <input type="number" id="userinput1" class="form-control border-primary" placeholder="Welcome Bonus"
                                        name="welcome_bonus" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Salary</label>
                                    <div class="col-md-9">
                                        <select class="form-control border-primary" name="salary" required>
                                            <option selected disabled="">Select Salary</option>
                                            @foreach($salary as $row)
                                            @if($row->start_salary==1)
                                            <option value="{{$row->end_salary}}">{{$row->start_salary="<"}}  {{$row->end_salary}}</option>
                                            @else
                                            <option value="{{$row->end_salary}}">{{$row->start_salary}} - {{$row->end_salary}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Posted date</label>
                                    <div class="col-md-9">
                                        <input type="date" id="userinput1" class="form-control border-primary" placeholder="Posted date"
                                        name="posted_at" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Expire date</label>
                                    <div class="col-md-9">
                                        <input type="date" id="userinput1" class="form-control border-primary" placeholder="Expire date"
                                        name="expired_at" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control border-primary"
                                        name="image" id="file" onchange="return fileValidation()" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput2">Video</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control border-primary"
                                        name="video" id="video" onchange="return VideoValidation()" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Description</label>
                                    <div class="col-md-9">
                                        <textarea id="projectinput9" rows="5" class="form-control" name="about" placeholder="Description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">
                                        Shift
                                    </label>
                                    <div class="col-md-9 mb-1">
                                        <select class="form-control border-primary" name="shift_id" required>
                                            <option selected disabled="">Select Shift</option>
                                            @foreach($shifts as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <label class="col-md-3 label-control" for="userinput1">
                                        Contract Type
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control border-primary" name="type" required>
                                            <option selected disabled="">Select Contract Type</option>
                                            <option value="Part time">Part time</option>
                                            <option value="Full time">Full time</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
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
<script>
    function fileValidation() {
        var fileInput =
                document.getElementById('file');

            var filePath = fileInput.value;
            var image = document.getElementById("file");
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
                    fileInput.value = '';
                    return false;

                }else{

                    return true;

                }

            }
            else
            {
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
        function VideoValidation() {
        var fileInput =
                document.getElementById('video');

            var filePath = fileInput.value;
            var video = document.getElementById("video");
            var allowedExtensions =
                    /(\.MP4|\.MPEG-4)$/i;

            if (!allowedExtensions.exec(filePath)) {
                toastr.error('Invalid File Type', 'Zindawork Says', {timeOut: 2000})
                fileInput.value = '';
                return false;
            }
            else if (typeof (video.files) != "undefined") {

                var size = parseFloat(video.files[0].size / (1024 * 1024)).toFixed(20);

                if(size > 20) {

                    toastr.error('Please select image size less than 20 MB' , 'Zindawork Says', {timeOut: 2000});
                    fileInput.value = '';
                    return false;

                }else{

                    return true;

                }

            }
            else
            {
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
