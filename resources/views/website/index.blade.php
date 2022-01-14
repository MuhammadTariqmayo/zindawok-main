@extends('website_layouts.master')

@section('content')
<div class="mt-5 pt-3">
    <div class="job_updation p-2 text-center font12">
        <p class="mb-0"><span> Wed 24 Feb 2021 12:07 PM</span> &nbsp; update
          <span>&nbsp;&nbsp;
            3
          </span>
          &nbsp; cases &nbsp; nationwide <span></span>
        </p>
    </div>
      <!-- end Job Updation -->

    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
             <div class="carousel-item active">
                <img src="{{asset('frontend-assets/img/newImg/zindaworktop1.png')}}" alt="Zindawork">
             </div>
            <div class="carousel-item">
                <img src="{{asset('frontend-assets/img/newImg/zindaworktop2.png')}}" alt="Zindawork">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend-assets/img/newImg/zindaworktop3.png')}}" alt="Zindawork">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend-assets/img/newImg/zindaworktop4.png')}}" alt="Zindawork">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend-assets/img/newImg/zindaworktop5.png')}}" alt="Zindawork">
            </div>
        </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
    </div>
      <!-- end top Slider -->

    <div class="px-3 px-md-0 mt-3">

        <div class="p-3 bg-white" style="border-radius: 10px;">
            <div class=" search_button mt-3">
                <button class="btn bg_white w-100 py-3 px-5 border_radius_35" data-toggle="modal"
                  data-target="#myModalDetailSearch">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('frontend-assets/img/search-solid.svg')}}" class="rotate mr-4" alt="">
                        <div class="line-height-normal">
                            <h6 class="mb-0">Search</h6>
                            <small>search multiple jobs</small>
                        </div>
                    </div>
                </button>
            </div>
            <div class="  d-flex search_button mt-2">
                <button class="btn bg_white w-100 mr-2 border_radius_35 my-3" data-toggle="modal"
                  data-target="#myModalTopPage">
                    <div class="text-center">
                        <img src="{{ asset('frontend-assets/img/map.svg')}}" alt="">
                        <div class="line-height-normal">
                            <h6 class="mb-0">Area</h6>
                            <small>area</small>
                        </div>
                    </div>
                </button>
                <button class="btn bg_white w-100 ml-2 border_radius_35 my-3" data-toggle="modal"
                  data-target="#myModalOccupationTopPage">
                    <div class="text-center">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg')}}" alt="">
                        <div class="line-height-normal">
                          <h6 class="mb-0">Industry</h6>
                          <small>industry</small>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <!-- end button search -->

        <div class="mt-3">
            <div class="p-3 bg-white border_radius">
                <h5 class="mb-3">Search by free keyword</h5>
                <div class="d-flex flex-row-reverse">
                    <div class="btn btn-primary ml-2" style="width: 100px;">search</div>
                    <input type="text" class="w-100 p-2 border input_radius" placeholder="Search by free keyword">
                </div>
            </div>
        </div>
        <!-- end free keyword -->

        <div class="mt-3" id="sohail">
            <div class="p-3 bg-white border_radius">
                <h5 class="mb-3">Recommended Jobs</h5>


            <div id="demo1" class="carousel slide mt-3" data-ride="carousel">
              <div class="carousel-inner ">
                  @foreach($showIndexPageJob as $key=> $job)
                    <div class="carousel-item  {{$key == 0 ? 'active' : '' }}">
                      <a href="">
                        <div class="row m-0">
                          <div class="col-12 p-0 border_radius border">
                            <div class="p-4">
                              <div class="d-flex">
                                <img src="{{asset('storage/job_image/'.$job->image)}}" alt="" style="width: 80px; margin-right: 20px;">
                                <div style="flex:1">
                                  <h6 class="text2">{{$job->about}} </h6>
                                  <h6 class="mb-0 text1">Occupation : <small>{{$job->occupation->name}}</small></h6>
                                  <h6 class="mb-0 text1">Salary : <small> {{$job->start_salary}} - {{$job->end_salary}}</small></h6>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endforeach
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


        <div class="mt-3">
          <div class="p-3 bg-white border_radius" id="popular">
            <h5 class="mb-3">Popular Jobs Post</h5>
            <!-- 1 latest Job -->
              @foreach($showIndexPageJob as $job)
                  <a href="{{url('jobDetail/'.$job->id)}}">
                <div class="col-12  p-0 mb-2">
                  <div class="row">

                    <div class="col-12">
                      <div>
                        <small class="float-right text-muted"> 3 min ago &nbsp; <i
                            class="fa fa-angle-right angleIcon"></i></small>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-12">
                      <div class="">
                        <div class="d-flex">
                          <img src="{{asset('storage/job_image/'.$job->image)}}" alt="" style="width: 60px; margin-right: 10px;">
                          <div style="flex:1">
                            <h6 class="text2">{{$job->about}}</h6>
                            <h6 class="mb-0 text1">Occupation : <small>{{$job->occupation->name}}</small></h6>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  <hr class="my-2 jobHr">
                </div>
                  </a>
              @endforeach
          </div>
        </div>
        <!-- Job slider ends -->

        <div class="mt-3">
          <div class="p-3 bg-white border_radius" id="latext">
            <h5 class="mb-3">Latest Jobs Post</h5>
            <!-- 1 latest Job -->
              @foreach($showIndexPageJob as $job)
              <div class="col-12  p-0 mb-2">
              <div class="row">
                <div class="col-12">
                  <div>
                    <small class="float-right text-muted"> 3 min ago &nbsp; <i
                        class="fa fa-angle-right angleIcon"></i></small>
                  </div>
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-12">
                  <div class="">
                    <div class="d-flex align-items-baseline">
                      <small class="badge badge-warning mr-2 text-white p-1" style="font-size: 10px;">NEW</small>
                      <h6 class="text1">{{$job->about}}</h6>
                    </div>
                    <h6 class="mb-0 text1">Occupation : <small>{{$job->occupation->name}}</small></h6>
                  </div>
                </div>
              </div>
              <hr class="my-2 jobHr">
            </div>
          @endforeach
          </div>
        </div>

        <div class="my-3">
          <img src="{{ asset('frontend-assets/img/newImg/side-top-banner2.jpg') }}" class="w-100 border3_height70" alt="">
        </div>

        <!-- Latest Job Posted -->


        <div class="mt-3">
          <div class="p-3 bg-white border_radius">
            <h5 class="mb-3">Social Links</h5>
            <div class="mt-3">
              <h6 class="mb-2">Instagram</h6>
              <iframe src="https://www.instagram.com/p/Bu8xCrsHkSW/embed" frameborder="0" class="w-100 border"
                scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
            <div class="d-flex flex-row-reverse">
            </div>
          </div>
        </div>

        <!-- end Social media -->
        <div class="mt-3 social_share">
          <div class="p-3 bg-white border_radius">
            <h5 class="text-capitalize">social share</h5>

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


        <div class="mt-3">
          <img src="{{ asset('frontend-assets/img/newImg/side-top-banner4.jpg')}}" class="w-100 mb-2 border3_height70" alt="">
          <img src="{{ asset('frontend-assets/img/newImg/side-top-banner2.jpg')}}" class="w-100 mb-2 border3_height70" alt="">
          <img src="{{ asset('frontend-assets/img/newImg/side-top-banner3.jpg')}}" class="w-100 mb-2 border3_height70" alt="">
        </div>
        </div>
    </div>
    @include('website_layouts.inc.models.area')
    @include('website_layouts.inc.models.occupation')
    @include('website_layouts.inc.models.search')
@endsection
@section('script')
    <script>
        $(document).ready(function() {
          $("#city_id_search").on('change', function(){
            var city_id = $("#city_id_search").val();
            var occupation_id = $("#occupation_id_search").val();
            var salary = $("#salary_search").val();

            $.ajax({
              method: "GET",
              url: "/search/" + city_id + "/" + occupation_id + "/" + salary,
              success: function(data) {
                console.log(data)
                $("#result").html("Result: " + data.jobs);
              }
            });
          });

          $("#occupation_id_search").on('change', function(){
            var city_id = $("#city_id_search").val();
            var occupation_id = $("#occupation_id_search").val();
            var salary = $("#salary_search").val();


            $.ajax({
              method: "GET",
              url: "/search/" + city_id + "/" + occupation_id + "/" + salary,
              success: function(data) {
                console.log(data)
                $("#result").html("Result: " + data.jobs);
              }
            });
          });

          $("#salary_search").on('change', function(){
            var city_id = $("#city_id_search").val();
            var occupation_id = $("#occupation_id_search").val();
            var salary = $("#salary_search").val();

            $.ajax({
              method: "GET",
              url: "/search/" + city_id + "/" + occupation_id + "/" + salary,
              success: function(data) {
                console.log(data)
                $("#result").html("Result: " + data.jobs);
              }
            });
          });
        });
        function shift(e){
            let check=e.target.value;
            var city_id = $("#city_id_search").val();
            var occupation_id = $("#occupation_id_search").val();
            var salary = $("#salary_search").val();
            $.ajax({
                method: "GET",
                url: "/search/" + city_id + "/" + occupation_id + "/" + salary + "/" + check,
                success: function(data) {
                    console.log(data)
                    $("#result").html("Result: " + data.jobs);
                    $('#search').attr('href', '{{url('searchJobs')}}/'+ city_id + "/" + occupation_id + "/" + salary + "/" + check);

                }
            });
        }


        function toggle(source) {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }
        }
        function toggleL(source) {
          var checkboxes = document.querySelectorAll('input[lCity="lCIty"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function togglei(source) {
          var checkboxes = document.querySelectorAll('input[iCity="iCIty"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggler(source) {
          var checkboxes = document.querySelectorAll('input[rCity="rCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function togglem(source) {
          var checkboxes = document.querySelectorAll('input[mCity="mCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggleb(source) {
          var checkboxes = document.querySelectorAll('input[bCity="bCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }



        function toggleSingthK(source) {
          var checkboxes = document.querySelectorAll('input[kCity="kCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggleSingthH(source) {
          var checkboxes = document.querySelectorAll('input[hCity="hCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggleSingthL(source) {
          var checkboxes = document.querySelectorAll('input[lCity="lCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggleSingthS(source) {
          var checkboxes = document.querySelectorAll('input[sCity="sCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }


        function togglekpkA(source) {
          var checkboxes = document.querySelectorAll('input[aCity="aCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }

        function togglekpkC(source) {
          var checkboxes = document.querySelectorAll('input[cCity="cCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }

        function togglekpkK(source) {
          var checkboxes = document.querySelectorAll('input[kCity="kCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }

        function togglekpkM(source) {
          var checkboxes = document.querySelectorAll('input[mCity="mCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }

        function toggleBaloP(source) {
          var checkboxes = document.querySelectorAll('input[pCity="pCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }

        }
        function toggleBaloQ(source) {
          var checkboxes = document.querySelectorAll('input[qCity="qCity"]');
          for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
              checkboxes[i].checked = source.checked;
          }
        }

    </script>
@endsection
