@extends('website_layouts.master')
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
                url: '/company/getOccupations/' + industry_id,
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
                url: '/company/getSubOccupations/' + occupation_id,
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
<div class="px-3 px-md-0">
   <div class="container p-0">
      <div style="margin-top: 80px;">
         <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">Company My Page</h4>
         </div>
      </div>
      <form action="{{ route('company.job.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="p-3 bg-white border_radius mt-3">
            <h4 class="text-center py-3">Post a Job</h4>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Company Name:</label>
                     <input type="hidden" name="company_id" value="{{Auth::guard('company')->user()->id}}">
                     <input type="text" class="form-control p-2" name="" value="{{ Auth::guard('company')->user()->name }}" placeholder="Enter company name"
                        id="fn" readonly>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Location:</label>
                     <select name="city_id" class="form-control w-100" required>
                        <option value="" selected="" disabled="">Select your location</option>
                        @foreach($cities as $city)
                           <option value="{{ $city->id }}">{{$city->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Job Title:</label>
                     <input type="text" name="title" class="form-control p-2" name="title" placeholder="Enter job title" required>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Contract Type:</label>
                      <select class="form-control border-primary" name="type" required>
                        <option selected disabled="">Select Contract Type</option>
                        <option value="Part time">Part time</option>
                        <option value="Full time">Full time</option>
                      </select>
                  </div>
               </div>
            </div>

            <div class="row">

               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Welcome Bonus:</label>
                     <input type="number" class="form-control p-2" name="welcome_bonus" placeholder="Enter welcome bonus" required>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Salary:</label>
                     <select name="salary" id="" class="form-control w-100" required>
                        <option value="" selected="">Select salary range</option>
                        <option value="20000">
                           < 20,000</option>
                        <option value="40000"> 20,000 - 40,000</option>
                        <option value="60000"> 40,000 - 60,000</option>
                        <option value="80000"> 60,000 - 80,000</option>
                        <option value="100000"> 80,000 - 100,000</option>
                        <option value="150000"> 100,000 - 150,000</option>
                        <option value="200000"> > 150,000</option>
                     </select>
                  </div>
               </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>

               $(function () {
                  var dtToday = new Date();

                  var month = dtToday.getMonth() + 1;
                  var day = dtToday.getDate();
                  var year = dtToday.getFullYear();
                  if (month < 10)
                     month = '0' + month.toString();
                  if (day < 10)
                     day = '0' + day.toString();

                  var maxDate = year + '-' + month + '-' + day;
                  $('#txtDate').attr('min', maxDate);

               });
            </script>

            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Date:</label>
                     <input type="date" name="posted_at" mindate="0" class="form-control p-2" id="txtDate">
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Expiry Date:</label>
                     <input type="date" name="expired_at" class="form-control p-2" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Job Shift:</label>
                     <select name="shift_id" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>
                        <option value="" selected="" disabled="">Select job shift:</option>
                        @foreach($shifts as $shift)
                           <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Industry:</label>
                     <select id="industry_id" name="industry_id" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>
                        <option value="" selected="" disabled="">Select Industry:</option>
                        @foreach($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Occupation</label>
                     <select name="occupation_id" id="occupation_id" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>

                     </select>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Suboccupation</label>
                     <select name="sub_occupation_id" id="sub_occupation" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>
                     </select>

                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Image:</label>
                     <input type="file" class="form-control p-2" name="image"  placeholder="upload image" id="file" onchange="return fileValidation()" required>
                  </div>
               </div>
               <div class="col-md-6 col-12">
                  <div class="form-group">
                     <label for="fn">Video:</label>
                     <input type="file" class="form-control p-2" name="video"  placeholder="Enter vedio link"
                        id="video" onchange="return VideoValidation()">
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12 col-12">
                  <div class="form-group">
                     <label for="fn">Job Description:</label>
                     <textarea name="about" type="text" style="height: 150px; resize: none;" class="form-control p-2" placeholder="Enter description" id="fn" required></textarea>
                  </div>
               </div>
            </div>
         </div>

         <div class="mt-3">
            <div class="p-3 bg-white border_radius text-center">
               <div class="row">
                  <div class="col-md-4 mx-auto">
                     <button type="submit" class="btn btn-primary w-100">Post a Job</button>
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
@if(Session::get('success'))
      <script>
          $(document).ready(function () {
              toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
          });
      </script>
@endif
@endsection
