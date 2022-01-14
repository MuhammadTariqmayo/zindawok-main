@extends('website_layouts.master')
@section('content')


<div class="px-3 px-md-0 mt-5 pt-3">
    <div class="container p-0">


        <div class="mt-3">
            <div class="border conditionListing bg-white border_radius">
               <div class="col-12 borderbottom">
            <div class="row">
              <div class="job_listing_filter text-center bordertopleft10">
                <h6 class="mb-0 text-white">Area</h6>
              </div>
              <div class="flex_1 btn-group">
                <div class="w-100" data-toggle="modal" data-target="#myModal">
                  <span><i class="fa fa-angle-right angleIconJob"></i></span>
                  <input type="text" class="border-0 w-100 pr-4 bordertopright10 h-100" readonly=""
                    placeholder="select area">
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
                  <select id="category" class="w-100 form-control border-0">
                    <option value="Fashion">Fashion</option>
                    <option value="Education">Education</option>
                    <option value="Computer">Computer</option>
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
                  <select name="" id="subcategory" class="w-100 form-control border-0">
                    <optgroup label="Fashion">
                      <option value="mw">Men's wear</option>
                      <option value="ww">Women's wear</option>
                      <option value="cw">Child's wear</option>
                    </optgroup>
                    <optgroup label="Education">
                      <option value="teacher">Teacher</option>
                      <option value="Ad">Administration</option>
                      <option value="hod">HOD</option>
                    </optgroup>
                    <optgroup label="Computer">
                      <option value="fr">Frontend</option>
                      <option value="des">Designer</option>
                      <option value="be">Backend</option>
                    </optgroup>

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
                  <select name="" id="subcategory2" class="w-100 form-control border-0" id="">
                    <optgroup label="mw">
                      <option value="math">Men suit</option>
                      <option value="phy">Pent Shirt</option>
                      <option value="chem">SuitCoat</option>
                    </optgroup>
                    <optgroup label="ww">
                      <option value="math">Women suit</option>
                      <option value="chem">Baya</option>
                    </optgroup>
                    <optgroup label="cw">
                      <option value="math">Child suit</option>
                      <option value="phy">Pent Shirt</option>
                      <option value="chem">SuitCoat</option>
                    </optgroup>

                    <optgroup label="teacher">
                      <option value="math">Math</option>
                      <option value="phy">Physics</option>
                      <option value="chem">Chemistry</option>
                    </optgroup>
                    <optgroup id="B" label="Ad">
                      <option value="Television">Commerce</option>
                      <option value="Game Console">B Com</option>
                      <option value="Game Console">M Com</option>
                    </optgroup>
                    <optgroup id="B" label="hod">
                      <option value="Television">Computer science Department</option>
                      <option value="Game Console">Math Department</option>
                      </option>
                      <option value="Game Console">English Department</option>
                    </optgroup>
                    <optgroup id="D" label="fr">
                      <option value="Television">React js</option>
                      <option value="Game Console">Angular js</option>
                      <option value="Game Console">Vue js</option>
                    </optgroup>
                    <optgroup id="D" label="des">
                      <option value="Television">Photoshop</option>
                      <option value="Game Console">Illistration</option>
                      <option value="Game Console">Coral Draw</option>
                    </optgroup>
                    <optgroup id="D" label="be">
                      <option value="Television">PHP Developer</option>
                      <option value="Game Console">C# Developer</option>
                      <option value="Game Console">Java Developer</option>
                    </optgroup>


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
                  <select name="" class="form-control w-100 border-0" id="">
                    <option value="" selected="">Select salary range</option>
                    <option value=""> &lt; 20,000</option>
                    <option value=""> 20,000 - 40,000</option>
                    <option value=""> 40,000 - 60,000</option>
                    <option value=""> 60,000 - 80,000</option>
                    <option value=""> 80,000 - 100,000</option>
                    <option value=""> 100,000 - 150,000</option>
                    <option value=""> &gt; 150,000</option>
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
                    <input type="text" class="border w-100 py-2" style="border-radius: 4px;"
                      placeholder="free keyword">
                  </div>
                  <div
                    class="text-center ml-2 border-right btn btn-primary d-flex align-items-center justify-content-center">
                    <h6 class="mb-0 text-white">
                      <span><i class="fa fa-search"></i></span>
                    </h6>
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
              <h4 class="mb-0 text-info">3</h4>
            </span>
            <span>items</span>
          </div>
          <div class="d-flex justify-content-end">
            <small class="text-muted">Displaying 1 to 3 items</small>
          </div>
        </div>
      </div>
        <!-- search result end -->



        <div class="mt-3">
            <div class="p-3 bg-white border_radius">
                <div id="accordion">

                    <div class="">
                        <h4>Scout Mail Applicant's</h4>
                        <div class="col-md-12 p-0 mr-auto mb-3">
                            <div class="d-md-flex">
                                <select name="job_filter" id="job_filter"
                                    class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">
                                    <option value="" selected disabled>Jobs</option>
                                    {{-- @foreach($scoutmailjob as $job) --}}

                                    <option value=""></option>


                                    {{-- @endforeach --}}

                                </select>



                               <input type="date" id="date_filter" name="date_filter"
                                class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">

                             <select name="contract_filter" id="contract_filter"
                                    class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">
                                    <option value="" selected disabled>Select contract type</option>
                                    <option value="Full_time">Full time</option>
                                    <option value="Part_time">Part time</option>
                                </select>
                              <select name="salary_filter" id="salary_filter"
                                    class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">
                                    <option value="" selected="">Select salary range</option>
                                    <option value="20000">
                                        < 20,000</option> <option value="40000"> 20,000 - 40,000
                                    </option>
                                    <option value="60000"> 40,000 - 60,000</option>
                                    <option value="80000"> 60,000 - 80,000</option>
                                    <option value="100000"> 80,000 - 100,000</option>
                                    <option value="150000"> 100,000 - 150,000</option>
                                    <option value="150000"> > 150,000</option>
                                </select>
                              <button class="btn btn-success w100">search</button>
                            </div>
                        </div>
                        <table id="example tbody" style="clear: both"
                            class="table table-bordered table-responsive11 table-striped">
                            <thead class="text-nowrap">
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Contract Type</th>
                                    <th>Location</th>
                                    <th>Salary</th>
                                    <th>CV</th>
                                    <th>Vedio</th>
                                    <th>Scouit Mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Full Time</td>
                                    <td>DHA 4, Lahore</td>
                                    <td><button data-toggle="modal" data-target="#exampleModalCV"
                                            class="btn-info w-100 btn" title="10/30"><i class="fa fa-money"
                                                style="font-size: 14px;color: #000"></i> &nbsp; <span
                                                class="badge badge-secondary">10 / 30 </span></button></td>
                                    <td><a href="CVPage.html"> <button title="3/30" class="btn-secondary w-100 btn"><i
                                                    class="fa fa-file-text" style="font-size: 14px"></i> &nbsp; <span
                                                    class="badge badge-secondary">3 / 30</span></button></a></td>
                                    <td><button class="btn-warning w-100 btn" disabled="" style="cursor: not-allowed"
                                            title="30/30" data-toggle="modal" data-target="#exampleModal"><i
                                                class="fa fa-play-circle" style="font-size: 20px;color: #000"></i>
                                            &nbsp; <span class="badge badge-secondary">30 /
                                                30</span></button></td>
                                    <td><a data-toggle="modal" data-target="#exampleModalSM"><button title="16/30"
                                                class="btn-primary w-100 btn"><i class="fa fa-paper-plane"
                                                    style="font-size: 14px;color: #000"></i> &nbsp; <span
                                                    class="badge badge-secondary">16 /
                                                    30</span></button></a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"
                            rel="stylesheet">
                        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('.summernote').summernote({
                                    toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['para', ['ul', 'paragraph']],
                                    ]
                                });
                            });

                        </script>
                        <style>
                            .note-editable {
                                height: 30vh;
                                overflow-y: auto;
                            }

                        </style>





                    </div>
                </div>
            </div>

        </div>



        <!-- Pagination -->
        <!-- <div class="mt-3">
        <div class="p-3 bg-white border_radius">
          <div class="col-12">
            <div class="pagination justify-content-center">
              <a href="#">«</a>
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">»</a>
            </div>
          </div>
        </div>
      </div> -->
    </div>

    <!-- footer start -->
    <!-- <div class="mt-3">
      <div class="p-3 bg-white border_radius">
        <footer class="footer">
          <div class="container" id="footer-section">
            <div class="row w-100" id="footer-connect">
              <div class="col-12 footer-social-section pt-4 pb-2">
                <h4>Connect With Us: </h4>
              </div>
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

              <div class="col-md-6 ">
                <h4 class="mb-3">Using Zindawork</h4>
                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                <p> <a href="#">Create your CV </a> </p>
                <p> <a href="FAQ.html">Help and FAQ </a> </p>
              </div>

              <div class="col-md-6 ">

                <h4 class="mb-3">About Zindawork</h4>
                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                <p> <a href="PrivacyPolicy.html">Privacy Policy </a> </p>
                <p> <a href="Term&Condition.html">Terms and Conditions </a> </p>
              </div>

              <div class="col-md-6 ">

                <h4 class="mb-3">Search for Jobs</h4>
                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                <p> <a href="index.html#sohail">Recommended jobs</a> </p>
                <p> <a href="index.html#popular">Popular jobs</a> </p>
                <p> <a href="index.html#latext">Latest jobs</a> </p>
              </div>

              <div class="col-md-6 ">

                <h4 class="mb-3">Contact Us</h4>
                <hr class="my-2 d-inline-block mx-auto custom_hr_footer">
                <p style="color:#666666 !important;">Zindawork Pakistan, Lahore</p>
                <p style="color:#666666 !important;">info@zindawork.com</p>
                <p style="color:#666666 !important;">+ 92 000 123 45</p>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="copyright-section pb-4 pt-2" style="color:#666666 !important;">© Copyright Zindawork 2021. All
              rights reserved by Idenbrid.
            </div>
          </div>
        </footer>
      </div>
    </div> -->

</div>


<script>
    function jobFilter(e) {


        let job_filter = $('#job_filter').val();
        // console.log(job_filter);

        // let contract = $('#contract_filter').val();
        // let salary = $('#salary_filter').val();
        // e.preventDefault();

        $.ajax({
            method: 'GET',
            url: "{{url('company/scoutmail-filter')}}/" + (job_filter ? job_filter : 0),


            success: function (response) {

                var len = 0;

                $('#example tbody').empty(); // Empty <tbody>
                if (response['jobApplicant'] != null) {

                    len = response['jobApplicant'].length;
                    $('#removeJobDate').attr('hidden', 'hidden');
                    $('#removeExample').removeAttr('hidden', 'hidden');

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            var id = response['jobApplicant'][i].id;
                            var name = response['jobApplicant'][i].name;
                            var salary = response['jobApplicant'][i].salary;
                            var video = response['jobApplicant'][i].video;
                            var applied_date = response['jobApplicant'][i].applied_date;
                            var email = response['jobApplicant'][i].email;
                            let url = "{{url('company/job-applicant-cv')}}" + "/" + id;
                            let videoPath = "{{asset('/storage/user_video')}}" + "/" + video;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i + 1) + "</td>" +
                                "<td align='center'>" + applied_date + "</td>" +
                                "<td align='center'>" + name + "</td>" +
                                "<td align='center'>" +
                                "<button data-toggle=\"modal\" data-target=\"#salary-" + id +
                                "\"  class=\"btn-info w-100 btn\" title=\"10/30\"><i class=\"fa fa-money\" style=\"font-size: 14px;color: #000\"></i> &nbsp;</button>" +
                                "</td>" +
                                "<td align='center'>" +
                                "<button class=\"btn-warning w-100 btn\" title=\"30/30\" data-toggle=\"modal\" data-target=\"#video-" +
                                id +
                                "\"> <i class=\"fa fa-play-circle\" style=\"font-size: 20px;\"></i> &nbsp;</button>" +
                                "</td>" +
                                "<td>" +
                                "<a  href=\"" + url +
                                "\" class=\"btn btn-secondary w-100\"> <i class=\"fa fa-file-text\" style=\"font-size: 14px\"> </i> &nbsp; </a>" +
                                "</td>" +
                                "<td>" +
                                "<a>" +
                                "<button title=\"16/30\" class=\"btn-primary w-100 btn\"><i class=\"fa fa-paper-plane\" style=\"font-size: 14px;color: #000\"></i> &nbsp; </button>" +
                                "</a>" +
                                "</td>" +
                                "</tr>";

                            $("#example tbody").append(tr_str);

                            var salaryModal = " <div class=\"modal fade p-0 salary-id\" id=\"salary-" + id +
                                "\"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">" +
                                "<div class=\"modal-dialog d-flex justify-content-center align-items-center h-100\" role=\"document\">" +
                                "<div class=\"modal-content shadow\" style=\"height: auto;min-height: auto; max-height: auto;\">" +
                                "<div class=\"modal-header headerStyle shadow\" style=\"top: -10%;\">" +
                                "<button type=\"button\" class=\"crossBtn\" data-dismiss=\"modal\" aria-label=\"Close\"> &times; </button>" +
                                "</div>" +
                                "<div class=\"modal-body p-0 overflow-hidden\">" +
                                "<h3 class=\"text-center card-header py-3text-info\"> Current Salary</h3>" +
                                "<h4 class=\"text-center  py-4\" id=\"user-salary\">" + salary + "</h4>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>";

                            $('body').append(salaryModal);

                            var videoModal = "<div class=\"modal fade p-0 video-id\" id=\"video-" + id +
                                "\"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">" +
                                "<div class=\"modal-dialog d-flex justify-content-center align-items-center h-100\" role=\"document\">" +
                                "<div class=\"modal-content shadow\" style=\"height: 60vh;min-height: 60vh; max-height: 60vh;\">" +
                                "<div class=\"modal-header headerStyle\">" +
                                "<button type=\"button\" class=\"crossBtn\" data-dismiss=\"modal\" aria-label=\"Close\">&times; </button>" +
                                "</div>" +
                                "<div class=\"modal-body p-0 overflow-hidden\">" +
                                "<video controls style=\"height: 60vh; width: 100%\">" +
                                "<source  src=\"" + videoPath + "\" type=\"video/mp4\">" +
                                "<source src=\"" + videoPath + "\" type=\"video/mp4\">" +
                                "Your browser does not support the video tag." +
                                "</video>" +
                                "</div>" +
                                "</div>" +
                                "</div>" +
                                "</div>";

                            $('body').append(videoModal);
                            $("#job_filter option:selected").removeAttr("selected");
                            $("#job_filter option:disabled").attr('selected', 'selected');
                        }
                    } else {
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='7'>No record found.</td>" +
                            "</tr>";
                        $("#example tbody").append(tr_str);
                    }
                } else if (response['allDateJob'] != null) {
                    len = response['allDateJob'].length;
                    $('#jobDate tbody').empty();
                    $('#date_filter').val("YYYY-MM-DD");
                    $('#removeJobDate').removeAttr('hidden', 'hidden');
                    $('#removeExample').attr('hidden', 'hidden');

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            let id = response['allDateJob'][i].id;
                            let title = response['allDateJob'][i].title;
                            let posted_date = response['allDateJob'][i].posted_at;
                            let description = response['allDateJob'][i].type;
                            let url = "{{url('company/job-applicants')}}" + "/" + id;

                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i + 1) + "</td>" +
                                "<td align='center'>" + title + "</td>" +
                                "<td align='center'>" + posted_date + "</td>" +
                                "<td align='center'>" + description + "</td>" +
                                "<td>" +
                                "<a href=\"" + url +
                                "\"  class=\"btn btn-secondary w-100\"> <i class=\"fa fa-file-text\" style=\"font-size: 14px\"> </i> &nbsp; </a>" +
                                "</td>" +
                                "</tr>";
                            $("#jobDate tbody").append(tr_str);

                        }
                    } else {
                        let tr_str = "<tr>" +
                            "<td align='center' colspan='7'>No record found.</td>" +
                            "</tr>";
                        $("#jobDate tbody").append(tr_str);
                    }
                } else if (response['allContractJob'] != null) {
                    len = response['allContractJob'].length;
                    $('#jobDate tbody').empty();
                    $('#removeJobDate').removeAttr('hidden', 'hidden');
                    $('#removeExample').attr('hidden', 'hidden');


                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            let id = response['allContractJob'][i].id;
                            let title = response['allContractJob'][i].title;
                            let posted_date = response['allContractJob'][i].posted_at;
                            let type = response['allContractJob'][i].type;
                            let url = "{{url('company/job-applicants')}}" + "/" + id;



                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i + 1) + "</td>" +
                                "<td align='center'>" + title + "</td>" +
                                "<td align='center'>" + posted_date + "</td>" +
                                "<td align='center'>" + type + "</td>" +
                                "<td>" +
                                "<a href=\"" + url +
                                "\"  class=\"btn btn-secondary w-100\"> <i class=\"fa fa-file-text\" style=\"font-size: 14px\"> </i> &nbsp; </a>" +
                                "</td>" +
                                "</tr>";
                            $("#jobDate tbody").append(tr_str);
                            $("#contract_filter option:selected").removeAttr("selected");
                            $("#contract_filter option:disabled").attr('selected', 'selected');

                        }
                    } else {
                        let tr_str = "<tr>" +
                            "<td align='center' colspan='7'>No record found.</td>" +
                            "</tr>";
                        $("#jobDate tbody").append(tr_str);
                    }
                } else if (response['allSalaryJob'] != null) {
                    len = response['allSalaryJob'].length;
                    $('#jobDate tbody').empty();
                    $('#removeJobDate').removeAttr('hidden', 'hidden');
                    $('#removeExample').attr('hidden', 'hidden');


                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            let id = response['allSalaryJob'][i].id;
                            let title = response['allSalaryJob'][i].title;
                            let posted_date = response['allSalaryJob'][i].posted_at;
                            let type = response['allSalaryJob'][i].type;
                            let url = "{{url('company/job-applicants')}}" + "/" + id;



                            var tr_str = "<tr>" +
                                "<td align='center'>" + (i + 1) + "</td>" +
                                "<td align='center'>" + title + "</td>" +
                                "<td align='center'>" + posted_date + "</td>" +
                                "<td align='center'>" + type + "</td>" +
                                "<td>" +
                                "<a href=\"" + url +
                                "\"  class=\"btn btn-secondary w-100\"> <i class=\"fa fa-file-text\" style=\"font-size: 14px\"> </i> &nbsp; </a>" +
                                "</td>" +
                                "</tr>";
                            $("#jobDate tbody").append(tr_str);
                            $("#salary_filter option:selected").removeAttr("selected");
                            $("#salary_filter option:disabled").attr('selected', 'selected');

                        }
                    } else {
                        let tr_str = "<tr>" +
                            "<td align='center' colspan='7'>No record found.</td>" +
                            "</tr>";
                        $("#jobDate tbody").append(tr_str);
                        $("#salary_filter option:selected").removeAttr("selected");
                        $("#salary_filter option:disabled").attr('selected', 'selected');
                    }
                }
            }
        });

    }

</script>
@endsection
