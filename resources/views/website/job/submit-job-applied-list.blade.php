@extends('website_layouts.master')
@section('content')
<div class="container  min-vh-100 p-0">

    <div class="px-3 px-md-0 mt-5 pt-3">

        <div class="bg-white mt-3">
            <nav>
                <div class="nav nav-tabs text-center d-flex border-0" id="nav-tab" role="tablist" style="font-size: 14px;">
                    <a class="nav-item nav-link flex_1 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Bookmark</a>
                    <a class="nav-item nav-link flex_1" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">History</a>
                    <a class="nav-item nav-link flex_1" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Applied</a>
                </div>
            </nav>
        </div>

        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <!-- <div class="mt-3">
                   <div class="p-3 bg-white border_radius">
                      <h5>Bookmark 0 Jobs  </h5>
                      <div class="text-center m-3 border p-3 border_radius">If you bookmark a job, it will be stocked here</div>
                   </div>
                   </div> -->

                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <h5>Bookmark {{count($submitJobs->bookMarks)}}
                            Jobs</h5>
                    </div>
                </div>

                @foreach($submitJobs->bookMarks as $job)
                    <div class="mt-3">
                            <div class="p-3 bg-white border_radius">
                                <div class="jobListingSection">
                                    <a href="{{url('jobDetail/'.$job->jobs->id)}}" class="text-decoration-none textBlack">
                                    <div class="d-flex justify-content-between">
                                        <small class="border p-1 text-danger border-danger borderradius4"> <b>{{$job->jobs->welcome_bonus}}/RKR- Welcome bonus</b></small>
                                        <small class="text-muted">3 days ago</small>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <img src="{{asset('/storage/job_image/'.$job->jobs->image)}}" class="mr-2 img100" alt="">
                                        <div class="flex_1">
                                            <small>{{$job->jobs->company->name}}</small>
                                            <h5 class="mb-0 text3 undelineTitleJob">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex my-2 align-items-center">
                                        <img src="{{asset('frontend-assets/img/yarn.png')}}" class="width18 mr-2" alt="">
                                        <small class="flex_1 text1">
                                            {{$job->jobs->start_salary}} - {{$job->jobs->end_salary}}
                                        </small>
                                    </div>
                                    <div class="d-flex my-2 align-items-center">
                                        <img src="{{asset('frontend-assets/img/location.png')}}" class="width18 mr-2" alt="">
                                        <small class="flex_1 text1 text-capitalize">
                                            {{$job->jobs->company->location}}
                                        </small>
                                    </div>
                                    <div>
                                        <div class="mb-1 font500">Application Barometer</div>
                                        <div class="progress height25pxProgressBar">
                                            <div class="progress-bar height25pxProgressBar" style="width:60%"> 60% applied</div>
                                        </div>
                                    </div>
                                    <div class="text-center mx-5 py-2 lineHight1-2">
                                        After 3 Posts period end in days <small class="text-muted">(Until 07:00 on March 01)</small>
                                    </div>
                                    </a>

                                    <div class="row" hidden id="error">
                                        <div class="col">
                                            <p class="alert alert-danger error" > "you already marked this job" </p>
                                        </div>
                                    </div>
                                    <div class="row" hidden id="success">
                                        <div class="col">
                                            <p class="alert alert-success success" > "job marked successfully!" </p>
                                        </div>
                                    </div>
                                    <div class="row" hidden id="markerror">
                                        <div class="col">
                                            <p class="alert alert-danger markerror" >  </p>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        @if(Auth::check())

                                                <a onclick="deleteBookmarkJob({{$job->jobs->id}})"  class="btn btn-secondary1  w-25 ">
                                                    <i class="fa fa-star header_icon_bookmark_buttom mx-auto text-danger"></i>
{{--                                                    <img class="header_icon_bookmark_buttom mx-auto" src={{asset('frontend-assets/img/bookmark.png')}}   />--}}
                                                </a>
                                            <form class="w-75" id="apply_job" onclick="applyJob({{$job->jobs->id}})">
                                                <button id="apply_job_submit" class="btn btn-success w-75 ml-2">Procced to Apply</button>
                                            </form>


                                        @else

                                            <a href="{{route('login')}}"   class="btn btn-secondary1 w-25">
                                                <img src={{asset('frontend-assets/img/bookmark.png')}}  class='header_icon_bookmark_buttom mx-auto' />
                                            </a>
                                            <a href="{{url('/jobApply/'.$job->jobs->id)}}" class="btn btn-success w-75 ml-2" >Procced to Apply (Not login)</a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach

            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <!-- <h5>0 Jobs seen </h5>
                        <div class="text-center m-3 border p-3 border_radius">If you history a job, it will be stocked here</div> -->

                        <h5>Jobs that saw the job details screen 2 Display</h5>
                    </div>
                </div>

                @foreach($submitJobs->jobHistory as $job)
                <div class="mt-3">
                        <div class="p-3 bg-white border_radius">
                            <div class="jobListingSection">
                                <a href="{{url('jobDetail/'.$job->job->id)}}" class="text-decoration-none">
                                <div class="d-flex justify-content-between">
                                    <small class="border p-1 text-danger border-danger borderradius4"> <b>{{$job->job->welcome_bonus}}/RKR- Welcome bonus</b></small>
                                    <small class="text-muted">3 days ago</small>
                                </div>

                                <div class="d-flex mt-2">
                                    <img src="{{asset('/storage/job_image/'.$job->job->image)}}" class="mr-2 img100" alt="">
                                    <div class="flex_1">
                                        <small>{{$job->job->company->name}}</small>
                                        <h5 class="mb-0 text3 undelineTitleJob">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event</h5>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="{{asset('frontend-assets/img/yarn.png')}}" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1">
                                        {{$job->job->start_salary}} - {{$job->job->end_salary}}
                                    </small>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="{{asset('frontend-assets/img/location.png')}}" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1 text-capitalize">
                                        {{$job->job->company->location}}
                                    </small>
                                </div>
                                <div>
                                    <div class="mb-1 font500">Application Barometer</div>
                                    <div class="progress height25pxProgressBar">
                                        <div class="progress-bar height25pxProgressBar" style="width:60%"> 60% applied</div>
                                    </div>
                                </div>
                                <div class="text-center mx-5 py-2 lineHight1-2">
                                    After 3 Posts period end in days <small class="text-muted">(Until 07:00 on March 01)</small>
                                </div>
                                </a>

                                <div class="row" hidden id="error">
                                    <div class="col">
                                        <p class="alert alert-danger error" > "you already marked this job" </p>
                                    </div>
                                </div>
                                <div class="row" hidden id="success">
                                    <div class="col">
                                        <p class="alert alert-success success" > "job marked successfully!" </p>
                                    </div>
                                </div>

                                <div class="d-flex">

                                    @if(Auth::guard('web')->check())

                                        <form id="book_mark" onclick="bookMark({{$job->job->id}})" class="w-25">
                                            <button id="submit"  class="btn btn-secondary1 w-100">
                                                <img class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}   />
                                            </button>
                                        </form>
                                        <form class="w-75" id="apply_job" onclick="applyJob({{$job->job->id}})">
                                            <button id="apply_job_submit" class="btn btn-success w-75 ml-2">Procced to Apply</button>
                                        </form>
                                    @elseif(Auth::guard('company')->check())

                                        <button  disabled  class="btn btn-secondary1 w-25">
                                            <img class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}   />
                                        </button>
                                        <button disabled class="btn btn-success w-75 ml-2" >Procced to Apply</button>

                                    @else

                                        <a href="{{route('login')}}"   class="btn btn-secondary1 w-25">
                                            <img src={{asset('frontend-assets/img/bookmark.png')}}  class='header_icon_bookmark_buttom mx-auto' />
                                        </a>
                                        <a href="{{url('/jobApply/'.$job->job->id)}}" class="btn btn-success w-75 ml-2" >Procced to Apply (Not login)</a>

                                    @endif

                                </div>
                            </div>
                        </div>

                </div>
                @endforeach

            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <!-- <div class="mt-3">
                   <div class="p-3 bg-white border_radius">
                      <h5>Applied 0 Jobs  </h5>
                      <div class="text-center m-3 border p-3 border_radius">If you applied a job, it will be listed here</div>
                   </div>
                   </div> -->

                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <h5>Jobs you applied for 4 Display  </h5>
                    </div>
                </div>



                <!-- 1 -->
                @foreach($submitJobs->appliedJobs as $job)
                <div class="mt-3">
                    <a href="#" class="text-decoration-none textBlack">
                        <div class="p-3 bg-white border_radius">
                            <div class="jobListingSection">
                                <div class="d-flex justify-content-between">
                                    <small class="border p-1 text-danger border-danger borderradius4"> <b>{{$job->welcome_bonus}}/RKR- Welcome bonus</b></small>
                                    <small class="text-muted">3 days ago</small>
                                </div>

                                <div class="d-flex mt-2">
                                    <img src="{{asset('/storage/job_image/'.$job->image)}}" class="mr-2 img100" alt="">
                                    <div class="flex_1">
                                        <small>{{$job->company->name}}</small>
                                        <h5 class="mb-0 text3 undelineTitleJob">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event</h5>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="{{asset('frontend-assets/img/yarn.png')}}" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1">
                                        {{$job->start_salary}} - {{$job->end_salary}}
                                    </small>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="{{asset('frontend-assets/img/location.png')}}" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1 text-capitalize">
                                        {{$job->company->location}}
                                    </small>
                                </div>
                                <div>
                                    <div class="mb-1 font500">Application Barometer</div>
                                    <div class="progress height25pxProgressBar">
                                        <div class="progress-bar height25pxProgressBar" style="width:60%"> 60% applied</div>
                                    </div>
                                </div>
                                <div class="text-center mx-5 py-2 lineHight1-2">
                                    After 3 Posts period end in days <small class="text-muted">(Until 07:00 on March 01)</small>
                                </div>
                                <div class="d-flex">

                                    <button class="btn btn-success w-100">View Map</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>



        </div>

        <div class="my-3" >
            <img src="img/newImg/side-top-banner2.jpg" class="w-100" style="border: 3px solid #000" alt="">
        </div>


        <div class="mt-3" id="sohail">
            <div class="p-3 bg-white border_radius">
                <h5 class="mb-3">Recommended Jobs</h5>


                <div id="demo1" class="carousel slide mt-3" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="JobDetailPage.html">
                                <div class="row m-0">
                                    <div class="col-12 p-0 border_radius border">
                                        <div class="p-4">
                                            <div class="d-flex">
                                                <img src="img/newImg/4.png" alt="" style="width: 80px; margin-right: 20px;">
                                                <div style="flex:1">
                                                    <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis  </h6>
                                                    <h6 class="mb-0 text1">Occupation : <small>Computer and IT</small></h6>
                                                    <h6 class="mb-0 text1">Salary : <small> PKR/- 35,000</small></h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <div class="row m-0">
                                <div class="col-12 p-0 border_radius border">
                                    <div class="p-4">
                                        <div class="d-flex">
                                            <img src="img/newImg/4.png" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis  </h6>
                                                <h6 class="mb-0 text1">Occupation : <small>Computer and IT</small></h6>
                                                <h6 class="mb-0 text1">Salary : <small> PKR/- 35,000</small></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row m-0">
                                <div class="col-12 p-0 border_radius border">
                                    <div class="p-4">
                                        <div class="d-flex">
                                            <img src="img/newImg/4.png" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis  </h6>
                                                <h6 class="mb-0 text1">Occupation : <small>Computer and IT</small></h6>
                                                <h6 class="mb-0 text1">Salary : <small> PKR/- 35,000</small></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row m-0">
                                <div class="col-12 p-0 border_radius border">
                                    <div class="p-4">
                                        <div class="d-flex">
                                            <img src="img/newImg/4.png" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis  </h6>
                                                <h6 class="mb-0 text1">Occupation : <small>Computer and IT</small></h6>
                                                <h6 class="mb-0 text1">Salary : <small> PKR/- 35,000</small></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row m-0">
                                <div class="col-12 p-0 border_radius border">
                                    <div class="p-4">
                                        <div class="d-flex">
                                            <img src="img/newImg/4.png" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices nulla  nec felis  </h6>
                                                <h6 class="mb-0 text1">Occupation : <small>Computer and IT</small></h6>
                                                <h6 class="mb-0 text1">Salary : <small> PKR/- 35,000</small></h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="carousel-indicators position-relative" id="Slider_li">
                        <li data-target="#demo1" data-slide-to="0" class="active"></li>
                        <li data-target="#demo1" data-slide-to="1"></li>
                        <li data-target="#demo1" data-slide-to="2"></li>
                        <li data-target="#demo1" data-slide-to="3"></li>
                        <li data-target="#demo1" data-slide-to="4"></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Job slider ends -->
        <script>

            function deleteBookmarkJob(jobId){
                let id=jobId;
                $.ajax({
                    method: 'GET',
                    url: '/deleteBookmark/'+id,

                    success: function (data) {
                        if (data.error){
                            $("#markerror").removeAttr('hidden','hidden').fadeIn(2000);
                            $(".markerror").html('"Bookmark removed!"');
                            $("#markerror").fadeOut(4000);
                            location.reload();
                        }

                    }
                });

            }
            function applyJob(jobID){
                let job_id=jobID;
                event.preventDefault();
                $('#apply_job_submit').attr('disabled','disabled');

                $.ajax({
                    method: 'POST',
                    url: '/saveJobApply',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        job_id: job_id,
                    },
                    success: function (data) {
                        if (data.error){
                            $("#error").removeAttr('hidden','hidden').fadeIn(1000);
                            $(".error").html('"You already applied for this job"');
                            $("#error").fadeOut(9000);
                        }else {
                            $("#success").removeAttr('hidden','hidden').fadeIn(1000);
                            $(".success").html('"You applied for this job successfully"');
                            $("#success").fadeOut(9000);
                            location.reload();

                        }

                    }
                });

            }

            function bookMark(bookmarkID){
                let bookmark_id=bookmarkID;
                event.preventDefault();
                $('#submit').attr('disabled','disabled');
                $.ajax({
                    method: 'POST',
                    url: '/bookMark',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        job_id: bookmark_id,
                    },
                    success: function (data) {
                        if (data.error){
                            console.log(data.error);
                            $("#error").removeAttr('hidden','hidden').fadeIn(1000);
                            $(".error").html('"You already marked this job"');
                            $("#error").fadeOut(9000);
                        }else {
                            $("#success").removeAttr('hidden','hidden').fadeIn(1000);
                            $(".success").html('"job marked successfully!"');
                            $("#success").fadeOut(9000);
                            location.reload();
                        }

                    }
                });
            }

        </script>
@endsection
