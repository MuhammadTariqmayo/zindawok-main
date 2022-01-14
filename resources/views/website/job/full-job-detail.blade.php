@extends('website_layouts.master')
@section('content')
    <div class="px-3 px-md-0 mt-5 pt-3">
        <div class="mt-3">
            <div class="p-3 bg-white border_radius">
                <div class="jobListingSection">
                    <div class="d-flex justify-content-between">
                        <small class="border p-1 text-danger border-danger borderradius4"> <b>Rs: {{ $job->welcome_bonus }} /- Welcome
                                bonus</b></small>
                        <small class="text-muted">Posted on {{ $job->posted_at }}</small>
                    </div>

                    <div class=" mt-2">
                        <div class="flex_1 my-3">
                            <h6> {{ $job->company->name }} </h6>
                            <h4 class="mb-0 text3 undelineTitleJob">{{ $job->title }}</h4>
                        </div>
                        <img src="{{ asset('storage/job_image/'.$job->image) }}" class="mr-2 w-100" style="height: 25vh;" alt="">
                    </div>

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

                    <div class="d-flex mt-3">
                        @if(Auth::guard('web')->check())

                            <form id="book_mark" class="w-25">
                                <input name="job_id" id="job_id" hidden value="{{$job->id}}">
                                <button id="submit"  class="btn btn-secondary1 w-100">
                                    <img class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}   />
                                </button>
                            </form>
                            <form class="w-75" id="apply_job" >
                                <input name="apply_job_id" id="apply_job_id" hidden value="{{$job->id}}">
                                <button id="apply_job_submit" class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </form>
                        @elseif(Auth::guard('company')->check())

                            <button  disabled  class="btn btn-secondary1 w-25">
                                <img class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}   />
                            </button>
                            <button disabled class="btn btn-success w-75 ml-2" >Procced to Apply</button>

                        @else

                            <a href="{{route('login')}}"   class="btn btn-secondary1 w-25">
                                <img  class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}  />
                            </a>
                            <a href="{{url('/jobApply/'.$job->id)}}" class="btn btn-success w-75 ml-2" >Procced to Apply</a>

                        @endif
                    </div>

                    <div class="d-flex my-3 align-items-center">
                        <img src="{{ asset('frontend-assets/img/yarn.png') }}" class="width24 mr-2" alt="">
                        <h6 class="flex_1 text1 mb-0">
                            {{ $job->start_salary }} - {{ $job->end_salary }}
                        </h6>
                    </div>
                    <div class="d-flex my-3 align-items-center">
                        <img src="{{ asset('frontend-assets/img/location.png') }}" class="width24 mr-2" alt="">
                        <h6 class="flex_1 text1 text-capitalize mb-0">
                            {{ $job->company->location }}
                        </h6>
                    </div>

                    <div class="d-flex my-3 align-items-center">
                        <img src="{{ asset('frontend-assets/img/time.png') }}" class="width24 mr-2" alt="">
                        <h6 class="flex_1 text1 text-capitalize mb-0">
                            {{ $job->shift->start_time}} - {{$job->shift->end_time}}
                        </h6>
                    </div>

                    <div class="my-3">
                        <h5>Job Description</h5>
                        <div>
                            {{  $job->about }}
                        </div>
                    </div>

                    <div class="my-3">
                        <div>
                            <video style="width: 100%; height:25vh;" controls>
                                <source src="{{ asset('storage/job_video/'.$job->video)}}" type="video/mp4">
                            </video>
                            <!-- <iframe style="height: 25vh; width: 100%" src="https://www.youtube.com/embed/uVwtVBpw7RQ"
                               frameborder="0"
                               allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                               allowfullscreen=""></iframe> -->
                        </div>
                    </div>

                    <div>
                        <div class="mb-2 font500">Application Barometer</div>
                        <div class="progress height25pxProgressBar mb-2">
                            <div class="progress-bar height25pxProgressBar" style="width:60%"> 60% applied</div>
                        </div>
                    </div>
                    <h6 class="text-center mx-5 py-2 lineHight1-2">
                        Posts period expires on <small class="text-muted"> {{ $job->expired_at }} </small>
                    </h6>

                </div>

                <div class="d-flex py-3" style="background: #fff;position: sticky;bottom: 0;">
                    @if(Auth::guard('web')->check())

                        <form class="w-100" id="apply_job" >
                            <input name="apply_job_id" id="apply_job_id" hidden value="{{$job->id}}">
                            <button id="apply_job_submit_1" class="btn btn-success w-100">Procced to Apply</button>
                        </form>

                    @elseif(Auth::guard('company')->check())
                        <button disabled class="btn btn-success w-100 ml-2" >Procced to Apply</button>

                    @else
                        <a href="{{url('/jobApply/'.$job->id)}}" class="btn btn-success w-100 ml-2" >Procced to Apply</a>
                    @endif
{{--                    <a href="{{url('/jobApply/'.$job->id)}}" class="btn btn-success w-100 ml-2" >Procced to Apply (Not login)</a>--}}
                </div>
            </div>

        </div>

        <div class="mt-3">
            <div class="p-3 bg-white border_radius">
                <div class="col-12">
                    <div class="">
                        <h5 class="text-capitalize">Company Profile </h5>
                        <div class="d-flex pt-3">
                            <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 90px; margin-right: 10px;">
                            <div style="flex:1">
                                <h5 class="text1 mb-0">Coinbitsolutions</h5>
                                <p class="text2 mb-0"> Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis
                                    congue Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue Nullam nec
                                    massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue Nullam nec massa arcu. Cras
                                    ut ultrices nulla. Vivamus nec felis congue</p>
                                <div class="text1"> <small class="text-capitalize">DHA phase 4 Lahore, pakistan</small></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Social links start -->
        <div class="mt-3 social_share">
            <div class="p-3 bg-white border_radius">
                <h5 class="text-capitalize">social links</h5>

                <div class="row m-0">
                    <div class="flex_1 border m-1 p-2 borderradius4">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-facebook"></i>
                            <h6 class="ml-2 mb-0 text-capitalize">facebook</h6>
                        </div>
                    </div>
                    <div class="flex_1 border m-1 p-2 borderradius4">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-envelope"></i>
                            <h6 class="ml-2 mb-0 text-capitalize">email</h6>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="flex_1 border m-1 p-2 borderradius4">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-whatsapp"></i>
                            <h6 class="ml-2 mb-0 text-capitalize">Whatsapp</h6>
                        </div>
                    </div>
                    <div class="flex_1 border m-1 p-2 borderradius4">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-linkedin"></i>
                            <h6 class="ml-2 mb-0 text-capitalize">Linkdin</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bizblanca ad -->
        <div class="mt-3">
            <a href="https://bizblanca.com/">
                <img src="{{ asset('frontend-assets/img/bizblanca.png') }}" class="w-100" style="border:3px solid #000" alt="">
            </a>
        </div>
        <!-- bizblanca ad -->


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
                                                <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 80px; margin-right: 20px;">
                                                <div style="flex:1">
                                                    <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec
                                                        felis congue. Cras ut ultrices nulla nec felis Cras ut ultrices nulla.
                                                        Vivamus nec felis congue. Cras ut ultrices nulla nec felisCras ut ultrices
                                                        nulla. Vivamus nec felis congue. Cras ut ultrices nulla nec felis </h6>
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
                                            <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec
                                                    felis congue. Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus
                                                    nec felis congue. Cras ut ultrices nulla nec felisCras ut ultrices nulla.
                                                    Vivamus nec felis congue. Cras ut ultrices nulla nec felis </h6>
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
                                            <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec
                                                    felis congue. Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus
                                                    nec felis congue. Cras ut ultrices nulla nec felisCras ut ultrices nulla.
                                                    Vivamus nec felis congue. Cras ut ultrices nulla nec felis </h6>
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
                                            <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec
                                                    felis congue. Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus
                                                    nec felis congue. Cras ut ultrices nulla nec felisCras ut ultrices nulla.
                                                    Vivamus nec felis congue. Cras ut ultrices nulla nec felis </h6>
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
                                            <img src="{{ asset('frontend-assets/img/newImg/4.png') }}" alt="" style="width: 80px; margin-right: 20px;">
                                            <div style="flex:1">
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec
                                                    felis congue. Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus
                                                    nec felis congue. Cras ut ultrices nulla nec felisCras ut ultrices nulla.
                                                    Vivamus nec felis congue. Cras ut ultrices nulla nec felis </h6>
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

        <!-- Add start-->
        <div class="mt-3">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('frontend-assets/img/newImg/side-top-banner4.jpg') }}" class="w-100 border3_height70 border3Img" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend-assets/img/newImg/side-top-banner2.jpg') }}" class="w-100 mb-2 border3_height70" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend-assets/img/newImg/side-top-banner3.jpg') }}" class="w-100 mb-2 border3_height70" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend-assets/img/newImg/side-top-banner2.jpg') }}" class="w-100 mb-2 border3_height70" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('frontend-assets/img/newImg/side-top-banner3.jpg') }}" class="w-100 mb-2 border3_height70" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).ready(function() {
            $('#book_mark').on('submit', function (event) {
                event.preventDefault();
                let job_id = $('#job_id').val();
                $('#submit').attr('disabled','disabled');
                $.ajax({
                    method: 'POST',
                    url: '/bookMark',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        job_id: job_id,
                    },
                    success: function (data) {
                        if (data.error){
                            console.log(data.error);
                            $("#error").removeAttr('hidden','hidden').fadeIn(2000);
                            $(".error").html('"You already marked this job"');
                            $("#error").fadeOut(4000);
                        }else {
                            $("#success").removeAttr('hidden','hidden').fadeIn(2000);
                            $(".success").html('"job marked successfully!"');
                            $("#success").fadeOut(4000);
                        }

                    }
                });
            });

            $('#apply_job ').on('submit', function (event) {
                event.preventDefault();
                let job_id = $('#apply_job_id').val();
                $('#apply_job_submit').attr('disabled','disabled');
                $('#apply_job_submit_1').attr('disabled','disabled');

                $.ajax({
                    method: 'POST',
                    url: '/saveJobApply',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        job_id: job_id,
                    },
                    success: function (data) {
                        if (data.error){
                            console.log(data.error);
                            $("#error").removeAttr('hidden','hidden').fadeIn(2000);
                            $(".error").html('"You already applied for this job"');
                            $("#error").fadeOut(4000);
                        }else {
                            $("#success").removeAttr('hidden','hidden').fadeIn(2000);
                            $(".success").html('"You applied for this job successfully"');
                            $("#success").fadeOut(4000);

                        }

                    }
                });
            });

        });
    </script>
@endsection
