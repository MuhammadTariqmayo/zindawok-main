@extends('website_layouts.master')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/selectize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/selectize.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/selectize/selectize.css') }}">
@endsection
@section('content')
<form method="post" action="{{route('user.detail.profile.store')}}" enctype="multipart/form-data">
   @csrf
   <div class="px-3 px-md-0 mt-5 pt-3">

      <div class="mt-3">
         <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">Detail Profile</h4>
         </div>
      </div>
      <div class="mt-3">
         <div class="p-3 bg-white border_radius">
            <h5>Introduction</h5>
            <div class="form-group">
               <label for="fn" class="mb-1 w-100 mr-2">Video <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="file" name="video" data-placement="top" accept="video/mp4,video/x-m4v,video/*" class="form-control p-2" id="video" onchange="return VideoValidation()">
            </div>

            <div class="form-group">
               <label for="salary" class="mb-1 w-100 mr-2">Current salary <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="number" name="salary" value="{{ $user->salary }}" class="form-control p-2" data-placement="top" placeholder="Enter current salary" id="salary">
            </div>
            <div class="form-group">
               <label for="salary" class="mb-1 w-100 mr-2">About <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <textarea name="about" type="text" class="form-control p-2" style="resize: none;" data-placement="top" placeholder="Enter introduction">{{ $user->about }}
               </textarea>
            </div>
         </div>
      </div>
      <div class="mt-3">
         <div class="parentcareer">
             @if($careerBackgrounds->isEmpty())
            <div class="p-3 bg-white border_radius position-relative createnewcareer">
               <h5>Career Background & Employment</h5>
               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">Company Name<span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="company[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
               </div>
               <div class="form-group">
                  <label for="salary" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="city[]" class="form-control p-2" data-placement="top" placeholder="Enter city" id="salary">
               </div>
               <div class="form-group">
                  <label for="salary" class="mb-1 w-100 mr-2">Job Title <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="job_title[]" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
               </div>
               <!--  -->

               <div class="row m-0 justify-content-between findinput">
                  <div class="col-6 pl-0">
                     <label for="salary" class="mb-1 w-100 mr-2">Start Date
                        <span class="float-right">
                           <i class="fa fa-info-circle"></i>
                        </span>
                     </label>
                     <input type="date" name="start_date[]" class="form-control p-2" data-placement="top" id="startdate">
                  </div>
                  <div class="col-6 pr-0 hideinputs">
                     <div class="inputs_currentlyworking">
                        <label for="salary" class="mb-1 w-100 mr-2">End Date
                           <span class="float-right">
                              <i class="fa fa-info-circle"></i>
                           </span>
                        </label>
                        <input type="date" name="end_date[]" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group form-check mb-0 float-right pt-4">
                        <input onclick="curwork(event)" type="checkbox" name="end_date[]" class="form-check-input currentlyworking" value="present">
                        <label onclick="curwork(event)" class="form-check-label">&nbsp;I am currently working</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group" style="clear: both"></div>
             @else
                 @foreach($careerBackgrounds as $careerBackground)
                 <div class="p-3 bg-white border_radius position-relative createnewcareer">
                     <h5>Career Background & Employment</h5>
                     <div class="form-group">
                         <label for="fn" class="mb-1 w-100 mr-2">Company Name<span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                         <input type="text" name="company[]" value="{{$careerBackground->company}}" placeholder="Enter company name" data-placement="top" class="form-control p-2">
                         <input type="text" name="career_background_id[]" hidden value="{{$careerBackground->id}}" placeholder="Enter company name" data-placement="top" class="form-control p-2">
                     </div>
                     <div class="form-group">
                         <label for="salary" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                         <input type="text" name="city[]" value="{{$careerBackground->city}}" class="form-control p-2" data-placement="top" placeholder="Enter city" id="salary">
                     </div>
                     <div class="form-group">
                         <label for="salary" class="mb-1 w-100 mr-2">Job Title <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                         <input type="text" name="job_title[]" value="{{$careerBackground->job_title}}" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
                     </div>
                     <!--  -->

                     <div class="row m-0 justify-content-between findinput">
                         <div class="col-6 pl-0">
                             <label for="salary" class="mb-1 w-100 mr-2">Start Date
                                 <span class="float-right">
                           <i class="fa fa-info-circle"></i>
                        </span>
                             </label>
                             <input type="date" name="start_date[]"  value="{{$careerBackground->start_date}}" class="form-control p-2" data-placement="top" id="startdate">
                         </div>
                         <div class="col-6 pr-0 hideinputs">
                             <div class="inputs_currentlyworking">
                                 <label for="salary" class="mb-1 w-100 mr-2">End Date
                                     <span class="float-right">
                              <i class="fa fa-info-circle"></i>
                           </span>
                                 </label>
                                 <input type="date" name="end_date[]" value="{{$careerBackground->end_date}}" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
                             </div>
                         </div>
                         <div class="col-12">
                             <div class="form-group form-check mb-0 float-right pt-4">
                                 <input onclick="curwork(event)" type="checkbox" name="end_date[]" class="form-check-input currentlyworking" value="present">
                                 <label onclick="curwork(event)" class="form-check-label">&nbsp;I am currently working</label>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="form-group" style="clear: both"></div>
                 @endforeach
             @endif

         </div>
      </div>
      <div class="mt-3">
         <div class="p-3 bg-white border_radius text_end">
            <div class="text-center">
               <h3 class="textmsg1" style="display: none;">No More add</h3>
               <button type="button" class="btn btn-info" id="addexperiencebtn">Add another experience</button>
            </div>
         </div>
      </div>
      <script>
         let count = 0;
         function curwork(e) {
            let item = e.target;
            let targetitem = $(item).parent().parent().parent().find('.hideinputs');
            if (count == 0) {
               $('.currentlyworking').attr('checked','checked')
               count++
               targetitem.html(``);
            } else {
               count = 0;
               $('.currentlyworking').removeAttr('checked')
               targetitem.html(`<div class="inputs_currentlyworking">
               <label for="salary" class="mb-1 w-100 mr-2">End Date
                  <span class="float-right">
                     <i class="fa fa-info-circle"></i>
                  </span>
               </label>
               <input type="date" name="end_date[]" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
            </div>`);
            }
         }
         $('#addexperiencebtn').on('click', () => {
            if ($(".createnewcareer").length <= 2) {
               $('.parentcareer').append(careerhtml);
               if ($(".createnewcareer").length == 3) {
                  $('#addexperiencebtn').fadeOut(1);
                  $('.textmsg1').fadeIn(1);
               }
            }
         })
         let careerhtml = `<div class="p-3 bg-white border_radius position-relative createnewcareer">
         <h5>Career Background & Employment</h5>
         <div class="p-3 bg-white border_radius position-relative">
         <small style="top: 3%; right: 3%" class="text-danger border-danger mb-3 float-right  border p-2" onclick="removesectioncareer(event)"><i class="fa fa-trash"></i> remove section</small></div>
         <div class="form-group">
            <label for="fn" class="mb-1 w-100 mr-2">Company Name <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="company[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
         </div>
         <div class="form-group">
            <label for="salary" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="city[]" class="form-control p-2" data-placement="top" placeholder="Enter city" id="salary">
         </div>
         <div class="form-group">
            <label for="salary" class="mb-1 w-100 mr-2">Job Title <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="job_title[]"" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
         </div>
         <!--  -->
         <div class="row m-0 justify-content-between findinput">
            <div class="col-6 pl-0">
               <label for="salary" class="mb-1 w-100 mr-2">Start Date
                  <span class="float-right">
                     <i class="fa fa-info-circle"></i>
                  </span>
               </label>
               <input type="date" name ="start_date[]" class="form-control p-2" data-placement="top" id="startdate">
            </div>
            <div class="col-6 pr-0 hideinputs">
            <div class="inputs_currentlyworking">
               <label for="salary" class="mb-1 w-100 mr-2">End Date
                  <span class="float-right">
                     <i class="fa fa-info-circle"></i>
                  </span>
               </label>
               <input type="date" name="end_date[]" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
               </div>
            </div>
            <div class="col-12">
            <div class="form-group form-check mb-0 float-right pt-4">
               <input onclick='curwork(event)' type="checkbox" name="end_date[]" class="form-check-input currentlyworking" value="present">
               <label onclick='curwork(event)' class="form-check-label">&nbsp;I am currently working</label>
            </div>
            </div>
         </div>

         <!--  -->
         </div>
         <div class="form-group" style="clear: both"></div>`;
         function removesectioncareer(e) {
            if ($(".createnewcareer").length == 3) {
               $('#addexperiencebtn').fadeIn(1)
               $('.textmsg1').fadeOut(1)
            }
            let targetvalue = e.target;
            $(targetvalue).parent().parent().remove();
         }
      </script>

      <div class="mt-3">
         <div class="parentqual">
            @if($qualifications->isEmpty())
            <div class="p-3 bg-white border_radius position-relative createnewqual">
               <h5>Qualification</h5>

               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">School Name <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="school_name[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
               </div>

               <div class="form-group">
                  <label for="city1" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="school_city[]" class="form-control p-2" placeholder="Enter city" data-placement="top" id="city1">
               </div>
               <div class="form-group">
                  <label for="salary" class="mb-1 w-100 mr-2">Degee <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="degree[]" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
               </div>
               <div class="row m-0 justify-content-between">
                  <div class="col-6 pl-0">
                     <label for="salary" class="mb-1 w-100 mr-2">Start Date
                        <span class="float-right">
                           <i class="fa fa-info-circle"></i>
                        </span>
                     </label>
                     <input type="date" name="school_start_date[]" class="form-control p-2" data-placement="top" id="startdate">
                  </div>
                  <div class="col-6 pr-0">
                     <div class="inputs_currentlyworking">
                        <label for="salary" class="mb-1 w-100 mr-2">End Date
                           <span class="float-right">
                              <i class="fa fa-info-circle"></i>
                           </span>
                        </label>
                        <input type="date" name="school_end_date[]" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
                     </div>
                  </div>
               </div>
               <div class="form-group" style="clear: both"></div>
            </div>
            @else
            @foreach($qualifications as $qualification)
            <div class="p-3 bg-white border_radius position-relative createnewqual">
               <h5>Qualification</h5>

               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">School Name <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" value="{{ $qualification->school_name }}" name="school_name[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
                  <input type="text" value="{{ $qualification->id}}" hidden name="qualification_id[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
               </div>

               <div class="form-group">
                  <label for="city1" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" value="{{ $qualification->school_city }}" name="school_city[]" class="form-control p-2" placeholder="Enter city" data-placement="top" id="city1">
               </div>
               <div class="form-group">
                  <label for="salary" class="mb-1 w-100 mr-2">Degee <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="degree[]" value="{{ $qualification->degree }}" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
               </div>
               <div class="row m-0 justify-content-between">
                  <div class="col-6 pl-0">
                     <label for="salary" class="mb-1 w-100 mr-2">Start Date
                        <span class="float-right">
                           <i class="fa fa-info-circle"></i>
                        </span>
                     </label>
                     <input type="date" name="school_start_date[]" value="{{ $qualification->school_start_date }}" class="form-control p-2" data-placement="top" id="startdate">
                  </div>
                  <div class="col-6 pr-0">
                     <div class="inputs_currentlyworking">
                        <label for="salary" class="mb-1 w-100 mr-2">End Date
                           <span class="float-right">
                              <i class="fa fa-info-circle"></i>
                           </span>
                        </label>
                        <input type="date" name="school_end_date[]" value="{{ $qualification->school_end_date }}" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
                     </div>
                  </div>
               </div>
               <div class="form-group" style="clear: both"></div>
            </div>
            @endforeach
            @endif
         </div>
      </div>
      <div class="mt-3">
         <div class="p-3 bg-white border_radius text_qual">
            <div class="text-center">
               <h3 class="textmsg2 d-none">No More add</h3>
               <button type="button" class="btn btn-info addqualificationbtn" id="addqualificationbtn">Add another qualification</button>
            </div>
         </div>
      </div>

      <script>
         let qualificationhtml = `<div class="p-3 mt-3 bg-white border_radius position-relative createnewqual">
         <h5>Qualification</h5>
         <div class="p-3 bg-white border_radius position-relative">
         <small style="top: 3%; right: 3%" class="text-danger border-danger mb-3 float-right  border p-2" onclick="removesectionqual(event)"><i class="fa fa-trash"></i> remove section</small></div>
         <div class="form-group">
            <label for="fn" class="mb-1 w-100 mr-2">School Name <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="school_name[]" placeholder="Enter company name" data-placement="top" data-toggle="tooltip" title="Enter school name" class="form-control p-2">
         </div>

         <div class="form-group">
            <label for="city1" class="mb-1 w-100 mr-2">City <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="school_city[]" class="form-control p-2" placeholder="Enter city" data-placement="top" id="city1">
         </div>
         <div class="form-group">
            <label for="salary" class="mb-1 w-100 mr-2">Degee <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="degree[]" class="form-control p-2" data-placement="top" placeholder="Enter job title" id="salary">
         </div>
         <div class="row m-0 justify-content-between">
               <div class="col-6 pl-0">
                  <label for="salary" class="mb-1 w-100 mr-2">Start Date
                     <span class="float-right">
                        <i class="fa fa-info-circle"></i>
                     </span>
                  </label>
                  <input type="date" name="school_start_date[]" class="form-control p-2" title="Select start date" id="startdate">
               </div>
               <div class="col-6 pr-0">
                  <div class="inputs_currentlyworking">
                     <label for="salary" class="mb-1 w-100 mr-2">End Date
                        <span class="float-right">
                           <i class="fa fa-info-circle"></i>
                        </span>
                     </label>
                     <input type="date" name="school_end_date[]" class="form-control p-2" data-placement="top" placeholder="Enter end date" id="enddate">
                  </div>
               </div>
            </div>
         <div class="form-group" style="clear: both"></div>
      </div>   `;
         $('#addqualificationbtn').on('click', function() {
            if ($(".createnewqual").length < 3) {
               $('.parentqual').append(qualificationhtml);
            } else {
               //alert('You can add maximum 3 qualifications.');
               toastr.error('You can add maximum 3 qualifications.', 'Zindawork Says', {timeOut: 2000})
               //   $('#addqualificationbtn').addClass('d-none');
               //   $('.textmsg2').removeClass('d-none');
            }
         });

         function removesectionqual(e) {
            if ($(".createnewqual").length == 3) {
               $('#addqualificationbtn').fadeIn(1)
               $('.textmsg2').fadeOut(1);
            }
            let targetvalue = e.target;
            $(targetvalue).parent().parent().remove();
         }
      </script>

      <div class="mt-3">
         <div class="parentbg">
             @if($personalizedBackgrounds->isEmpty())
            <div class="p-3 mt-3 bg-white border_radius position-relative createnewbg">
               <h5>Personalized Background</h5>
               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">Qualification <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="qualification[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
               </div>
               <div class="form-group">
                  <label for="salary" class="mb-1 w-100 mr-2">Institution <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" name="institution[]" class="form-control p-2" placeholder="Enter city" data-placement="top" id="salary">
               </div>
               <div class="form-group d-flex">
                  <div class="flex_1 mr-2"><label for="salary" class="mb-1 w-100 mr-2">Start Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                     <input type="date" name="institution_start_date[]" class="form-control p-2" data-placement="top" id="salary">
                  </div>
                  <div class="flex_1 mr-2 "> <label for="salary" class="mb-1 w-100 mr-2">End Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                     <input type="date" name="institution_end_date[]" class="form-control p-2" data-placement="top" id="salary">
                  </div>
               </div>
               <div class="form-group mt-3" style="clear: both">
                  <label for="salary" class="mb-1 w-100 mr-2">Institute Address <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <textarea name="institution_address[]" type="text" class="form-control p-2" data-placement="top" style="resize: none;" placeholder="Enter introduction"></textarea>
               </div>
            </div>
             @else
                 @foreach($personalizedBackgrounds as $personalizedBackground)
                     <div class="p-3 mt-3 bg-white border_radius position-relative createnewbg">
                         <h5>Personalized Background</h5>
                         <div class="form-group">
                             <label for="fn" class="mb-1 w-100 mr-2">Qualification <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                             <input type="text" name="qualification[]" value="{{$personalizedBackground->qualification}}" placeholder="Enter company name" data-placement="top" class="form-control p-2">
                             <input type="text" name="personalized_id[]" hidden value="{{$personalizedBackground->id}}" placeholder="Enter company name" data-placement="top" class="form-control p-2">

                         </div>
                         <div class="form-group">
                             <label for="salary" class="mb-1 w-100 mr-2">Institution <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                             <input type="text" name="institution[]" value="{{$personalizedBackground->institution}}" class="form-control p-2" placeholder="Enter city" data-placement="top" id="salary">
                         </div>
                         <div class="form-group d-flex">
                             <div class="flex_1 mr-2"><label for="salary" class="mb-1 w-100 mr-2">Start Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                                 <input type="date" name="institution_start_date[]" value="{{$personalizedBackground->start_date}}" class="form-control p-2" data-placement="top" id="salary">
                             </div>
                             <div class="flex_1 mr-2 "> <label for="salary" class="mb-1 w-100 mr-2">End Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                                 <input type="date" name="institution_end_date[]" value="{{$personalizedBackground->end_date}}" class="form-control p-2" data-placement="top" id="salary">
                             </div>
                         </div>
                         <div class="form-group mt-3" style="clear: both">
                             <label for="salary" class="mb-1 w-100 mr-2">Institute Address <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                             <textarea name="institution_address[]" value="{{$personalizedBackground->institution_address}}" type="text" class="form-control p-2" data-placement="top" style="resize: none;" placeholder="Enter introduction">{{$personalizedBackground->institution_address}}</textarea>
                         </div>
                     </div>

                 @endforeach
             @endif
         </div>
      </div>

      <div class="mt-3">
         <div class="p-3 bg-white border_radius text_no">
            <div class="text-center">
               <h3 class="textmsg3" style="display: none;">No More add</h3>
               <button type="button" class="btn btn-info" id="add_person_bg_btn">Add another Personalized
                  Background</button>
            </div>
         </div>
      </div>

      <script>
         let bghtml = `      <div class="p-3 mt-3 bg-white border_radius position-relative createnewbg">
         <h5>Personalized Background</h5>
         <div class="p-3 bg-white border_radius position-relative">
         <small style="top: 3%; right: 3%" class="text-danger border-danger mb-3 float-right  border p-2" onclick="removesectionbg(event)"><i class="fa fa-trash"></i> remove section</small></div>
         <div class="form-group">
            <label for="fn" class="mb-1 w-100 mr-2">Qualification <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="qualification[]" placeholder="Enter company name" data-placement="top" class="form-control p-2">
         </div>
         <div class="form-group">
            <label for="salary" class="mb-1 w-100 mr-2">Institution <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <input type="text" name="institution[]" class="form-control p-2" placeholder="Enter city" data-placement="top" id="salary">
         </div>
         <div class="form-group d-flex">
            <div class="flex_1 mr-2"><label for="salary" class="mb-1 w-100 mr-2">Start Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="date" name="institution_start_date[]" class="form-control p-2" data-placement="top" id="salary">
            </div>
            <div class="flex_1 mr-2 "> <label for="salary" class="mb-1 w-100 mr-2">End Date <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="date" name="institution_end_date[]" class="form-control p-2" data-placement="top" id="salary">
            </div>
         </div>
         <div class="form-group mt-3" style="clear: both">
            <label for="salary" class="mb-1 w-100 mr-2">Institute Address <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
            <textarea name="institution_address[]" type="text" class="form-control p-2" data-placement="top" style="resize: none;" placeholder="Enter introduction"></textarea>
         </div>
      </div>`;
         $('#add_person_bg_btn').on('click', () => {
            if ($(".createnewbg").length <= 2) {
               $('.parentbg').append(bghtml);
               if ($(".createnewbg").length == 3) {
                  $('#add_person_bg_btn').fadeOut(1)
                  $('.textmsg3').fadeIn(1);

               }
            }
         })

         function removesectionbg(e) {
            if ($(".createnewbg").length == 3) {
               $('#add_person_bg_btn').fadeIn(1)
               $('.textmsg3').fadeOut(1);
            }
            let targetvalue = e.target;
            $(targetvalue).parent().parent().remove();
         }
      </script>
      <!-- add Qualification -->
      <div class="mt-3">
         <div class="parentproskill">
            <div class="p-3 bg-white border_radius position-relative createnewproskill">
               <h5>Professional Skills / Strength</h5>
               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">Skills <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" class="input-selectize" name="professional_skills[]" @foreach($professional_skills as $row) value="{{$row}}" @endforeach placeholder="Please enter skills separated by comma" required>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-3">
         <div class="parentint">
            <div class="p-3 bg-white border_radius position-relative createnewintskill">
               <h5>Interpersonal Skills</h5>
               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">Skills <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <input type="text" class="input-selectize" name="interpersonal_skills[]" @foreach($interpersonal_skills as $row) value="{{$row}}" @endforeach placeholder="Please enter skills separated by comma" required>
               </div>
            </div>
         </div>
      </div>

      <!-- add Qualification -->
      <div class="mt-3">
         <div class="futgoals">
            <div class="p-3 bg-white border_radius position-relative futgoalsnew">
               <h5>Future goals</h5>
               <div class="form-group">
                  <label for="fn" class="mb-1 w-100 mr-2">Future goals <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
                  <textarea name="future_goals" type="text" class="form-control p-2" data-placement="top" style="resize: none;" placeholder="Enter introduction">{{ $user->future_goals }}</textarea>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-3">
         <div class="p-3 bg-white border_radius position-relative">
            <h5>Futher Information</h5>
            <div class="form-group">
               <label for="fn" class="mb-1 w-100 mr-2">English Level <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <select name="english_level" id="" class="form-control p-2" data-placement="top">
                  <option selected disabled="">Select</option>
                  <option value="beginner" {{ $user->english_level === "beginner" ? 'selected' : '' }}>Beginner </option>
                  <option value="intermediate" {{ $user->english_level === "intermediate" ? 'selected' : '' }}>Intermediate</option>
                  <option value="advanced" {{ $user->english_level === "advanced" ? 'selected' : '' }}>Advanced</option>
               </select>
            </div>
            <div class="form-group">
               <label for="fn" class="mb-1 w-100 mr-2">Current Employment Status <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <select name="employment_status" id="" class="form-control p-2" data-placement="top">
                  <option selected disabled="">Select</option>
                  <option value="1" {{ $user->employment_status === 1 ? 'selected' : '' }}>Employeed </option>
                  <option value="0" {{ $user->employment_status === 0 ? 'selected' : '' }}>Unemployed</option>
               </select>
            </div>
            <div class="form-group">
               <label for="fn" class="mb-1 w-100 mr-2">Number of Dependents <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="number" name="no_of_dependents" value="{{ $user-> no_of_dependents }}" placeholder="Number of Dependents" data-placement="top" class="form-control p-2">
            </div>
            <div class="form-group">
               <label for="fn" class="mb-1 w-100 mr-2">CNIC <span class="float-right"><i class="fa fa-info-circle"></i> </span></label>
               <input type="number" name="cnic" value="{{ $user->cnic }}" placeholder="Enter CNIC" data-placement="top" class="form-control p-2">
            </div>

         </div>
      </div>

      <!-- add experience -->
      <div class="mt-3 position-sticky" style="bottom: 0">
         <div class="p-3 bg-white border_radius ">
            <div class="text-center">
               <button type="submit" class="btn btn-info p-2 w-100">Save Information</button>
            </div>
         </div>
      </div>
   </div>
</form>
@endsection
@section('script')

<script src="{{ asset('app-assets/vendors/js/forms/select/selectize.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-selectize.js') }}" type="text/javascript"></script>
<script>
   $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
   });
</script>
<script>
   $(document).ready(function() {
      $("#btn11111").click(function() {
         $(".sohail11111").append(`<div class="mt-3 " id="ss">

         <div class="form-group">
            <label for="fn" class="mb-1 w-100 mr-2">Skills</label>
            <input type="text" placeholder="Enter company name" class="form-control p-2">
         </div>
          </div>
               </div>`);
      });
   });

   function VideoValidation() {
      var fileInput =
         document.getElementById('video');

      var filePath = fileInput.value;
      var video = document.getElementById("video");
      var allowedExtensions =
         /(\.MP4|\.MPEG-4)$/i;

      if (!allowedExtensions.exec(filePath)) {
         toastr.error('Invalid File Type', 'Zindawork Says', {
            timeOut: 2000
         })
         fileInput.value = '';
         return false;
      } else if (typeof(video.files) != "undefined") {

         var size = parseFloat(video.files[0].size / (1024 * 1024)).toFixed(20);

         if (size > 20) {

            toastr.error('Please select image size less than 20 MB', 'Zindawork Says', {
               timeOut: 2000
            });
            return false;

         } else {

            return true;

         }

      } else {
         if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
               document.getElementById(
                     'imagePreview').innerHTML =
                  '<img src="' + e.target.result +
                  '"/>';
            };

            reader.readAsDataURL(fileInput.files[0]);
         }
      }
   }
</script>
<script>
   $(document).ready(function() {
      $("#btn111111").click(function() {
         $(".sohail111111").append(`<div class="mt-3 " id="ss">
        <div class="p-3 bg-white border_radius position-relative">
         <small style="top: 3%; right: 3%" class="text-danger border-danger mb-3 float-right  border p-2" onclick="$(this).parents('#ss').hide()"><i class="fa fa-trash"></i> remove section</small>
         <h5>Future goals</h5>
         <div class="form-group">
            <label for="fn" class="mb-1 w-100 mr-2">Future goals</label>
            <textarea name="" type="text" class="form-control p-2" style="resize: none;" placeholder="Enter introduction"></textarea>
         </div>
          </div>
               </div>`);

      });
   });
</script>
@endsection
