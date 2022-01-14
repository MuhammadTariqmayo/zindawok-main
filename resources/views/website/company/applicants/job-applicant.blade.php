@extends('website_layouts.master')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/style1.css')}}">

@endsection
@section('content')

<div class="px-3 px-md-0 mt-5 pt-3">

    <div class="">
        <div class="p-3 bg-white border_radius mt-3">
            <div class="mt-3">
                <div class="bg-white border_radius p-3 py-5">
                    <h4 class="text-center">Applicant's</h4>
                </div>
            </div>
            {{--                <h3 class="text-center py-3">Job Listing</h3>--}}
            <div class="col-md-12 p-0 mr-auto mb-3">
                <div class="d-md-flex">

                    <select name="job_filter" id="job_filter" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0"
                        onchange="jobFilter(event)">
                        <option value="" selected disabled>Jobs</option>
                        @foreach($companyJobsApplicant as $job)

                        <option value="{{$job->id}}">{{$job->title}} - {{$job->about}}</option>


                        @endforeach

                    </select>
                    <input type="date" id="date_filter" name="date_filter"
                        class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">
                    <select name="contract_filter" id="contract_filter"
                        class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" onchange="jobFilter(event)">
                        <option value="" selected disabled>Select contract type</option>
                        <option value="Full_time">Full time</option>
                        <option value="Part_time">Part time</option>
                        {{--                            <option value="">Freelance</option>--}}
                    </select>
                    <select name="salary_filter" id="salary_filter" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0"
                        onchange="jobFilter(event)">
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
                    {{-- <a onclick="jobFilter(event)"  class="btn btn-success w100" >search</a> --}}

                </div>
            </div>
            <div id="removeExample">
                <table id="example" class="display nowrap example" style="width:100%;overflow-x: auto;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Applied date</th>
                            <th>Applicant Nama</th>
                            <th>Salary <a href="CVPage.html"> &nbsp; <span class="badge badge-secondary">3 /
                                        30</span></a></th>
                            <th>Vedio <a href="CVPage.html"> &nbsp; <span class="badge badge-secondary">3 /
                                        30</span></a></th>
                            <th>CV <a href="CVPage.html"> &nbsp; <span class="badge badge-secondary">3 / 30</span></a>
                            </th>
                            <th>Scouit Mail <a href="CVPage.html"> &nbsp; <span class="badge badge-secondary">3 /
                                        30</span></a></th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: top">

                    </tbody>
                </table>
            </div>

            <div hidden="hidden" id="removeJobDate">
                <table id="jobDate" class="display nowrap" style="width:100%;overflow-x: auto;">
                    <thead>
                        <tr>
                            <th class="text-center"> # </th>
                            <th class="text-center"> Job title </th>
                            <th class="text-center"> Posted date </th>
                            <th class="text-center"> Type </th>
                            <th class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: top">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<script>
    function jobFilter(e) {

        let job = $('#job_filter').val();
        let job_date = $('#date_filter').val();
        let contract = $('#contract_filter').val();
        let salary = $('#salary_filter').val();
        e.preventDefault();

        $.ajax({
            method: 'GET',
            url: "{{url('company/job-filter')}}/" + (job ? job : 0) + "/" + (job_date ? job_date : 0) + "/" + (
                contract ? contract : null) + "/" + (salary ? salary : 0),


            success: function (response) {
                alert(response);

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
@section('script')
@if(Session::get('success'))
<script>
    $(document).ready(function () {
        toastr.success('<?php echo Session::get('
            success ');?>', 'Zindawork Says', {
                timeOut: 2000
            })
    });

</script>

@endif

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js">
</script>

<script type="text/javascript">
    var jq = $.noConflict(true);
    jq(document).ready(function () {
        var table = jq('#example , #jobDate').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)',
            },
            responsive: true,
            bFilter: true,
            bPaginate: true,
            iDisplayLength: 100
        });
        new jq.fn.dataTable.FixedHeader(table);

    });

</script>
@endsection
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
