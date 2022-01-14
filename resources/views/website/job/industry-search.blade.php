@extends('website_layouts.master')
@section('content')
    <div class="px-3 px-md-0 mt-5 pt-3">
        <div class="mt-3">
            <div class="border conditionListing bg-white border_radius">
                <div class="col-12 borderbottom">
                    <div class="row">
                        <div class="job_listing_filter text-center bordertopleft10">
                            <h6 class="mb-0 text-white">Area</h6>
                        </div>
                        <div class="flex_1 btn-group">
                            <div class="w-100">
                                <span><i class="fa fa-angle-right angleIconJob"></i></span>
                                <select id="city_id" name="city_id" class="w-100 form-control border-0">
                                    <option value="" selected="" disabled="">Select City:</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 borderbottom">
                    <div class="row">
                        <div class="job_listing_filter text-center">
                            <h6 class="mb-0 text-white">Industry</h6>
                        </div>
                        <div class="flex_1 btn-group">
                            <div class="w-100">
                                <span><i class="fa fa-angle-right angleIconJob"></i></span>
                                <select id="industry_id" name="industry_id" class="w-100 form-control border-0">
                                    <option value="" selected="" disabled="">Select Industry:</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 borderbottom">
                    <div class="row">
                        <div class="job_listing_filter text-center">
                            <h6 class="mb-0 text-white">Occupation</h6>
                        </div>
                        <div class="flex_1 btn-group">
                            <div class="w-100">
                                <span><i class="fa fa-angle-right angleIconJob"></i></span>
                                <select name="occupation_id" id="occupation_id" class="w-100 form-control border-0">
                                    <option  value='' selected disabled>Select Occupation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 borderbottom">
                    <div class="row">
                        <div class="job_listing_filter text-center">
                            <h6 class="mb-0 text-white">Suboccupation</h6>
                        </div>
                        <div class="flex_1 btn-group">
                            <div class="w-100">
                                <span><i class="fa fa-angle-right angleIconJob"></i></span>
                                <select name="sub_occupation_id" id="sub_occupation" class="w-100 form-control border-0" id="">
                                    <option  value='' selected disabled >Select Sub Occupation</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 borderbottom">
                    <div class="row">
                        <div class="job_listing_filter text-center">
                            <h6 class="mb-0 text-white">Salary</h6>
                        </div>
                        <div class="flex_1 btn-group">
                            <div class="w-100">
                                <span><i class="fa fa-angle-right angleIconJob"></i></span>
                                <select name="salary"  class="form-control w-100 border-0" id="salary">
                                    <option value="" disabled selected="">Select salary range</option>
                                    <option value="20000"> &lt; 20,000</option>
                                    <option value="40000"> 20,000 - 40,000</option>
                                    <option value="60000"> 40,000 - 60,000</option>
                                    <option value="80000"> 60,000 - 80,000</option>
                                    <option value="100000"> 80,000 - 100,000</option>
                                    <option value="150000"> 100,000 - 150,000</option>
                                    <option value="150000"> &gt; 150,000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="job_listing_filter text-center borderbottomleft10">
                            <h6 class="mb-0 text-white">Keyword</h6>
                        </div>
                        <div class="flex_1 m-2 mb-0">
                            <div class="d-flex">
                                <div class="flex_1 btn-group">
                                    <input type="text" class="border w-100 py-2" style="border-radius: 4px;" placeholder="free keyword">
                                </div>
                                <div
                                    class="text-center ml-2 border-right btn btn-primary d-flex align-items-center justify-content-center">
                                    <a class="text-decoration-none" id="search">
                                        <h6 class="mb-0 text-white">
                                            <span><i class="fa fa-search"></i></span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var $optgroups = $('#subcategory > optgroup');
                var $optgroups2 = $('#subcategory2 > optgroup');

                $("#category").on("change", function () {
                    var selectedVal = this.value;

                    $('#subcategory').html($optgroups.filter('[label="' + selectedVal + '"]'));
                });

                $("#subcategory").on("change", function () {
                    var selectedVal = this.value;

                    $('#subcategory2').html($optgroups2.filter('[label="' + selectedVal + '"]'));
                });
            });

        </script>
        <!-- filter end -->
        <!-- search result start -->
        <div class="mt-3">
            <div class="p-3 bg-white border_radius text-right">
                <div class="d-flex justify-content-end align-items-center mb-2">
                    <span class="pr-2">Results</span>
                    <span class="pr-2">
              <h4 class="mb-0 text-info">12,345</h4>
            </span>
                    <span>items</span>
                </div>
                <div class="d-flex justify-content-end">
                    <small class="text-muted">Displaying 1 to 30 items</small>
                </div>
            </div>
        </div>
        <!-- search result end -->
        <!-- job list start -->
        <div class="bg-white mt-3">
            <nav>
                <div class="nav nav-tabs d-flex border-0 text-center" id="nav-tab" role="tablist" style="font-size: 14px;">
                    <a class="nav-item nav-link flex_1 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Recommended</a>
                    <a class="nav-item nav-link flex_1" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">New Jobs</a>
                    <a class="nav-item nav-link flex_1" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Salary base</a>
                </div>
            </nav>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="mt-2">
                    <a href="JobDetailPage.html" class="text-decoration-none textBlack">
                        <div class="p-3 bg-white border_radius position-relative">
                            <div class="jobListingSection">
                                <span class="badge CbadgeCustom">ad</span>
                                <div class="d-flex mt-2">
                                    <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                    <div class="flex_1">
                                        <small>Persol Marketing Co., Ltd.</small>
                                        <h5 class="mb-0 text3 undelineTitleJob">Earn money even tomorrow !! Single-shot part-time job ★
                                            Inspection / event</h5>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="img/yarn.png" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1">
                                        60,000 - 80,000
                                    </small>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="img/location.png" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1 text-capitalize">
                                        DHA phase 6 lahore, pakistan
                                    </small>
                                </div>
                                <div>
                                    <div class="mb-1 font500">Application Barometer</div>
                                    <div class="progress height25pxProgressBar">
                                        <div class="progress-bar height25pxProgressBar" style="width:200%"> 200% applied</div>
                                    </div>
                                </div>
                                <div class="text-center mx-5 py-2 lineHight1-2">
                                    After 3 Posts period end in days <small class="text-muted">(Until 07:00 on March 01)</small>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-secondary1 w-25">
                                        <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                    </button>
                                    <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-3">
                    <img src="img/newImg/side-top-banner4.jpg" class="w-100 border3Img" alt="">
                </div>


                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @foreach($searchJobs as $job)
                    <div class="mt-3">
                        <div class="p-3 bg-white border_radius">
                            <div class="jobListingSection">
                                <a href="{{url('jobDetail/'.$job->id)}}" class="text-decoration-none">
                                <div class="d-flex justify-content-between">
                                    <small class="border p-1 text-danger border-danger borderradius4"> <b>{{$job->welcome_bonus}}/RKR- Welcome
                                            bonus</b></small>
                                    <small class="text-muted">3 days ago</small>
                                </div>

                                <div class="d-flex mt-2">
                                    <img src="{{asset('storage/job_image/'.$job->image)}}" class="mr-2 img100" alt="">
                                    <div class="flex_1">
                                        <small>{{$job->company->name}}.</small>
                                        <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot {{$job->type}} job ★ Inspection / event
                                        </h5>
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

                                        <form id="book_mark" onclick="bookMark({{$job->id}})" class="w-25">
                                            <button id="submit"  class="btn btn-secondary1 w-100">
                                                <img class='header_icon_bookmark_buttom mx-auto' src={{asset('frontend-assets/img/bookmark.png')}}   />
                                            </button>
                                        </form>
                                        <form class="w-75" id="apply_job" onclick="applyJob({{$job->id}})">
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
                                        <a href="{{url('/jobApply/'.$job->id)}}" class="btn btn-success w-75 ml-2" >Procced to Apply</a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="mt-3">
                    <img src="img/newImg/side-top-banner4.jpg" class="w-100 border3Img" alt="">
                </div>



            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="mt-2">
                    <a href="JobDetailPage.html" class="text-decoration-none textBlack">
                        <div class="p-3 bg-white border_radius position-relative">
                            <div class="jobListingSection">

                                <span class="badge CbadgeCustom">ad</span>

                                <div class="d-flex mt-2">
                                    <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                    <div class="flex_1">
                                        <small>Persol Marketing Co., Ltd.</small>
                                        <h5 class="mb-0 text3 undelineTitleJob">Earn money even tomorrow !! Single-shot part-time job ★
                                            Inspection / event</h5>
                                    </div>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="img/yarn.png" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1">
                                        60,000 - 80,000
                                    </small>
                                </div>
                                <div class="d-flex my-2 align-items-center">
                                    <img src="img/location.png" class="width18 mr-2" alt="">
                                    <small class="flex_1 text1 text-capitalize">
                                        DHA phase 6 lahore, pakistan
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
                                    <button class="btn btn-secondary1 w-25">
                                        <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                    </button>
                                    <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-3">
                    <img src="img/newImg/side-top-banner4.jpg" class="w-100 border3Img" alt="">
                </div>


                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="p-3 bg-white border_radius">
                        <div class="jobListingSection">
                            <div class="d-flex justify-content-between">
                                <small class="border p-1 text-danger border-danger borderradius4"> <b>1,000/RKR- Welcome
                                        bonus</b></small>
                                <small class="text-muted">3 days ago</small>
                            </div>

                            <div class="d-flex mt-2">
                                <img src="img/newImg/4.png" class="mr-2 img100" alt="">
                                <div class="flex_1">
                                    <small>Persol Marketing Co., Ltd.</small>
                                    <h5 class="mb-0 text3">Earn money even tomorrow !! Single-shot part-time job ★ Inspection / event
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/yarn.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1">
                                    60,000 - 80,000
                                </small>
                            </div>
                            <div class="d-flex my-2 align-items-center">
                                <img src="img/location.png" class="width18 mr-2" alt="">
                                <small class="flex_1 text1 text-capitalize">
                                    DHA phase 6 lahore, pakistan
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
                                <button class="btn btn-secondary1 w-25">
                                    <img src='img/bookmark.png' class='header_icon_bookmark_buttom mx-auto' />
                                </button>
                                <button class="btn btn-success w-75 ml-2">Procced to Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job list end -->

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
                                                    <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue.
                                                        Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut
                                                        ultrices nulla nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices
                                                        nulla nec felis </h6>
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
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue.
                                                    Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut
                                                    ultrices nulla nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices
                                                    nulla nec felis </h6>
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
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue.
                                                    Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut
                                                    ultrices nulla nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices
                                                    nulla nec felis </h6>
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
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue.
                                                    Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut
                                                    ultrices nulla nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices
                                                    nulla nec felis </h6>
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
                                                <h6 class="text2">Nullam nec massa arcu. Cras ut ultrices nulla. Vivamus nec felis congue.
                                                    Cras ut ultrices nulla nec felis Cras ut ultrices nulla. Vivamus nec felis congue. Cras ut
                                                    ultrices nulla nec felisCras ut ultrices nulla. Vivamus nec felis congue. Cras ut ultrices
                                                    nulla nec felis </h6>
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
            <img src="img/newImg/side-top-banner4.jpg" class="w-100 border3Img" alt="">
        </div>

        <!-- ad end -->



        <!-- footer start -->
        <div class="mt-3">
            <div class="p-3 bg-white border_radius">
                <footer class="footer">
                    <div class="container" id="footer-section">
                        <div class="row w-100" id="footer-connect">
                            <div class="col-12 footer-social-section pt-4 pb-2">
                                <h4>Connect With Us: </h4>
                            </div>
                            <!-- Main Menu -->
                            <div class="col-md-12" style="clear: both;">
                                <div class="footer-main-menu-section pb-2 d-flex flex-wrap">
                                    <p class="mr-auto"> <a href="Howitswork.html">How Its Works</a> </p>
                                    <p class="mr-auto"> <a href="PricePlan.html">Pricing</a> </p>
                                    <p class=""> <a href="#">Why Zindawork?</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <!-- Detail Footer -->
                            <!-- Footer About Detail -->
                            <div class="col-md-6 ">
                                <h4 class="mb-3">Using Zindawork</h4>
                                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                                <p> <a href="#">Create your CV </a> </p>
                                <p> <a href="FAQ.html">Help and FAQ </a> </p>
                            </div>
                            <!-- Footer Nav 1 -->
                            <div class="col-md-6 ">
                                <!-- Links -->
                                <h4 class="mb-3">About Zindawork</h4>
                                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                                <p> <a href="PrivacyPolicy.html">Privacy Policy </a> </p>
                                <p> <a href="Term&Condition.html">Terms and Conditions </a> </p>
                            </div>
                            <!-- Footer Nav 2 -->
                            <div class="col-md-6 ">
                                <!-- Links -->
                                <h4 class="mb-3">Search for Jobs</h4>
                                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                                <p> <a href="index.html#sohail">Recommended jobs</a> </p>
                                <p> <a href="index.html#popular">Popular jobs</a> </p>
                                <p> <a href="index.html#latext">Latest jobs</a> </p>
                            </div>
                            <!-- Footer Contact us Details -->
                            <div class="col-md-6 ">
                                <!-- Contacts Links -->
                                <h4 class="mb-3">Contact Us</h4>
                                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                                <p style="color:#666666 !important;">Zindawork Pakistan, Lahore</p>
                                <p style="color:#666666 !important;">info@zindawork.com</p>
                                <p style="color:#666666 !important;">+ 92 000 123 45</p>
                            </div>
                        </div>
                    </div>
                    <!-- Copyright -->
                    <div class="container">
                        <div class="copyright-section pb-4 pt-2" style="color:#666666 !important;">© Copyright Zindawork 2021. All
                            rights reserved by Idenbrid.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div>
        </div>











        <script>
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
        <!-- model Area start-->
        <form action="">
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div id="accordion">

                                <div class="card mb-2">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#punjabProvince">
                                            Punjab
                                        </a>
                                    </div>
                                    <div id="punjabProvince" class="collapse" data-parent="#accordion">
                                        <div class="card-body p-3">
                                            <!-- city start punjab -->
                                            <div id="accordioncity">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#lahoreCity">
                                                            Lahore
                                                        </a>
                                                    </div>
                                                    <div id="lahoreCity" class="collapse" data-parent="#accordioncity">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleL(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCIty"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCIty"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCIty"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCIty"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#islamabadCity">
                                                            Islamabad
                                                        </a>
                                                    </div>
                                                    <div id="islamabadCity" class="collapse" data-parent="#accordioncity">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="togglei(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    iCity="iCIty" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    iCity="iCIty" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    iCity="iCIty" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    iCity="iCIty" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#rawalpindiCity">
                                                            Rawalpind
                                                        </a>
                                                    </div>
                                                    <div id="rawalpindiCity" class="collapse" data-parent="#accordioncity">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggler(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    rCity="rCity" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    rCity="rCity" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    rCity="rCity" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" class="border mr-2"
                                                                                                                    rCity="rCity" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#bahawalpurCity">
                                                            Bahawalpur
                                                        </a>
                                                    </div>
                                                    <div id="bahawalpurCity" class="collapse" data-parent="#accordioncity">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleb(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" bCity="bCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" bCity="bCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" bCity="bCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" bCity="bCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#multanCity">
                                                            Multan
                                                        </a>
                                                    </div>
                                                    <div id="multanCity" class="collapse" data-parent="#accordioncity">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input type="checkbox"
                                                                                                                onclick="togglem(this);" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- city end punjab -->
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-2">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#sindhProvince">
                                            Sindh
                                        </a>
                                    </div>
                                    <div id="sindhProvince" class="collapse" data-parent="#accordion">
                                        <div class="card-body p-3">
                                            <!-- city start punjab -->
                                            <div id="accordioncitySindh">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#karachiCity">
                                                            Karachi
                                                        </a>
                                                    </div>
                                                    <div id="karachiCity" class="collapse" data-parent="#accordioncitySindh">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleSingthK(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#hydrabadCity">
                                                            Hydrabad
                                                        </a>
                                                    </div>
                                                    <div id="hydrabadCity" class="collapse" data-parent="#accordioncitySindh">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleSingthH(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" hCity="hCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" hCity="hCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" hCity="hCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" hCity="hCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#sukkhurCity">
                                                            Sukkhur
                                                        </a>
                                                    </div>
                                                    <div id="sukkhurCity" class="collapse" data-parent="#accordioncitySindh">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleSingthS(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" sCity="sCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" sCity="sCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" sCity="sCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" sCity="sCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#larkanaCity">
                                                            Larkarna
                                                        </a>
                                                    </div>
                                                    <div id="larkanaCity" class="collapse" data-parent="#accordioncitySindh">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleSingthL(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" lCity="lCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- city end punjab -->
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-2">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#kpkProvince">
                                            Khyber Pakhtunkhwa
                                        </a>
                                    </div>
                                    <div id="kpkProvince" class="collapse" data-parent="#accordion">
                                        <div class="card-body p-3">
                                            <div id="accordioncitykpk">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#abbottabadCity">
                                                            Abbottabad
                                                        </a>
                                                    </div>
                                                    <div id="abbottabadCity" class="collapse" data-parent="#accordioncitykpk">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="togglekpkA(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" aCity="aCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" aCity="aCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" aCity="aCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" aCity="aCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#charsaddaCity">
                                                            Charsadda
                                                        </a>
                                                    </div>
                                                    <div id="charsaddaCity" class="collapse" data-parent="#accordioncitykpk">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input type="checkbox" onclick="togglekpkC"
                                                                                                                class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" cCity="cCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" cCity="cCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" cCity="cCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" cCity="cCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#kohatCity">
                                                            Kohat
                                                        </a>
                                                    </div>
                                                    <div id="kohatCity" class="collapse" data-parent="#accordioncitykpk">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="togglekpkK(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" kCity="kCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#mardanCity">
                                                            Mardan
                                                        </a>
                                                    </div>
                                                    <div id="mardanCity" class="collapse" data-parent="#accordioncitykpk">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="togglekpkM(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" mCity="mCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#balochistanProvince">
                                            Balochistan
                                        </a>
                                    </div>
                                    <div id="balochistanProvince" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div id="accordioncitybalochistan">
                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="card-link" data-toggle="collapse" href="#peshawarCity">
                                                            Peshawar
                                                        </a>
                                                    </div>
                                                    <div id="peshawarCity" class="collapse" data-parent="#accordioncitybalochistan">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleBaloP(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" pCity="pCity"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" pCity="pCity"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" pCity="pCity"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input type="checkbox" pCity="pCity"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-2">
                                                    <div class="card-header">
                                                        <a class="collapsed card-link" data-toggle="collapse" href="#quettaCity">
                                                            Quetta
                                                        </a>
                                                    </div>
                                                    <div id="quettaCity" class="collapse" data-parent="#accordioncitybalochistan">
                                                        <div class="card-body pb-0 px-0">
                                                            <div class="checkbox px-3">
                                                                <label class="d-flex align-items-center"><input onclick="toggleBaloQ(this);"
                                                                                                                type="checkbox" class="border mr-2" value=""> Select All </label>
                                                            </div>
                                                            <hr class="my-2">
                                                            <div class="p-0">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input qCity="qCity" type="checkbox"
                                                                                                                    class="border mr-2" value=""> DHA </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input qCity="qCity" type="checkbox"
                                                                                                                    class="border mr-2" value=""> Johar Town </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input qCity="qCity" type="checkbox"
                                                                                                                    class="border mr-2" value=""> Gulberg </label>
                                                                </div>
                                                                <hr class="my-2">
                                                                <div class="checkbox pl-5">
                                                                    <label class="d-flex align-items-center"><input qCity="qCity" type="checkbox"
                                                                                                                    class="border mr-2" value="">Cantt </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex w-100">
                                <div class="w-25"> <input type="reset" class="btn btn-secondary w-100" value="clear" /></div>
                                <div class="w-75"> <a href="JobListing.html">
                                        <button type="button" class="btn btn-primary w-100 ml-2">result 12,345</button>
                                    </a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#industry_id").on('change', function(){
                // $("#occupation_id").empty().append("<option value=''>Select Occupation</option>");
                // $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
                var industry_id = $("#industry_id").val();
                if(industry_id != "") {
                    $.ajax({
                        method: "GET",
                        url: '/getOccupations/' + industry_id,
                        success: function(result) {
                            if(result.status == "success") {
                                console.log(result.occupations);
                                $.each(result.occupations, function(key, value){
                                    $("#occupation_id").append(
                                        "<option value=" + value.id +">"+value.name+"</option>"
                                    );
                                });
                                {{--$('#job_count').html('result' + result.countIndustyJobs);--}}

                                {{--$('#industry').attr('href','{{url('industryJobs')}}/'+industry_id);--}}
                            }
                        }
                    });
                }
            });

            $("#occupation_id").on('change', function(){
                // $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
                var occupation_id = $("#occupation_id").val();
                var industry_id = $("#industry_id").val();
                if(occupation_id != "" && industry_id != "") {
                    $.ajax({
                        method: "GET",
                        url: '/getSubOccupations/' + occupation_id,
                        success: function(result) {
                            if(result.status == "success") {
                                console.log(result.occupations);
                                $.each(result.occupations, function(key, value){
                                    $("#sub_occupation").append(
                                        "<option value=" + value.id +">"+value.name+"</option>"
                                    );
                                });
                                {{--$('#job_count').html('result '  +  result.occupationCount);--}}
                                {{--$('#industry').attr('href','{{url('industryJobs')}}/'+industry_id+'/'+occupation_id);--}}

                            }
                        }
                    });
                }
            });

            $("#sub_occupation").on('change', function(){
                var sub_occupation = $("#sub_occupation").val();
                var occupation_id = $("#occupation_id").val();
                var industry_id = $("#industry_id").val();
                if(sub_occupation != "" && industry_id != "" && occupation_id != "") {
                    $.ajax({
                        method: "GET",
                        url: '/getSubOccupationsCount/' + sub_occupation,
                        success: function(result) {
                            if(result.status == "success") {
                                console.log(result.occupations);
                                $.each(result.occupations, function(key, value){
                                    $("#sub_occupation").append(
                                        "<option value=" + value.id +">"+value.name+"</option>"
                                    );
                                });
                                {{--$('#job_count').html('result ' + result.subOccupationCount)--}}
                                {{--$('#industry').attr('href','{{url('industryJobs')}}/'+industry_id+'/'+occupation_id+'/'+sub_occupation);--}}
                            }
                        }
                    });
                }
            });

            $("#salary").on('change',function (){
                let city_id=$('#city_id').val();
                let industy_id=$('#industry_id').val();
                let occupation_id=$('#occupation_id').val();
                let sub_occupation_id=$('#sub_occupation').val();
                let salary=$('#salary').val();

                $.ajax({
                    method: "GET",
                    url: "/countCityJobs/" + city_id,
                    success: function(data) {
                        console.log(data)
                        $("#count_jobs").html("Result: " + data.jobs);
                        $('#search').attr('href', '{{url('jobListing')}}/'+city_id+"/"+industy_id+"/"+occupation_id+"/"+sub_occupation_id+"/"+salary);
                    }
                });


            });
        });

        function applyJob(jobID){
            let job_id=jobID;
            event.preventDefault();
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
        }
    </script>
@endsection
