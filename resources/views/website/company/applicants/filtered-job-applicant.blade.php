@extends('website_layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">
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
                </div>
                <div id="removeExample">
                    <table id="example" class="display nowrap example" style="width:100%;overflow-x: auto;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Applied date</th>
                            <th>Applicant Nama</th>
                            <th>Salary      <a href="CVPage.html" >  &nbsp; <span class="badge badge-secondary">3 / 30</span></a></th>
                            <th>Vedio       <a href="CVPage.html" >  &nbsp; <span class="badge badge-secondary">3 / 30</span></a></th>
                            <th>CV          <a href="CVPage.html" >  &nbsp; <span class="badge badge-secondary">3 / 30</span></a></th>
                            <th>Scouit Mail <a href="CVPage.html" >  &nbsp; <span class="badge badge-secondary">3 / 30</span></a></th>
                        </tr>
                        </thead>
                        <tbody style="vertical-align: top">
                        @foreach($jobApplicants as $applicant)
                            @php($i=0)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$applicant->applied_date}}</td>
                                    <td>{{$applicant->name}}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#salary-{{$applicant->id}}"   class="btn-info w-100 btn" title="10/30"><i class="fa fa-money" style="font-size: 14px;color: #000"></i> &nbsp;</button>
                                    </td>
                                    <td>
                                        <button class="btn-warning w-100 btn" title="30/30" data-toggle="modal" data-target="#video-{{$applicant->id}}"> <i class="fa fa-play-circle" style="font-size: 20px;"></i> &nbsp;</button>
                                    </td>
                                    <td>
                                        <a  href="{{url('company/job-applicant-cv/'.$applicant->id)}}" class="btn btn-secondary w-100"> <i class="fa fa-file-text" style="font-size: 14px"> </i> &nbsp; </a>
                                    </td>
                                    <td></td>
                                </tr>

                                <div class="modal fade p-0 " id="salary-{{$applicant->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog d-flex justify-content-center align-items-center h-100" role="document">
                                        <div class="modal-content shadow" style="height: auto;min-height: auto; max-height: auto;">
                                            <div class="modal-header headerStyle shadow" style="top: -10%;">
                                                <button type="button" class="crossBtn" data-dismiss="modal" aria-label="Close"> &times; </button>
                                            </div>
                                            <div class="modal-body p-0 overflow-hidden">
                                                <h3 class="text-center card-header py-3text-info"> Current Salary</h3>
                                                <h4 class="text-center  py-4" >{{$applicant->salary}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade p-0 video-id" id="video-{{$applicant->id}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog d-flex justify-content-center align-items-center h-100" role="document">
                                        <div class="modal-content shadow" style="height: 60vh;min-height: 60vh; max-height: 60vh;">
                                            <div class="modal-header headerStyle">
                                                <button type="button" class="crossBtn" data-dismiss="modal" aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-body p-0 overflow-hidden">

                                                <video controls style="height: 60vh; width: 100%" >
                                                    <source id="" src="{{asset('/storage/user_video/'.$applicant->video)}}" type="video/mp4">
                                                    <source src="{{asset('/storage/user_video/'.$applicant->video)}}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
{{--                                            <iframe style="height: 60vh; width: 100%" class="responsive-iframe" src="{{asset('/storage/user_video/'.$applicant->video)}}" frameborder="0"  allow="autoplay:false;" allowfullscreen=""></iframe>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                        {{--                                <!-- Modal -->--}}
                        {{--                                <!-- <Modal Applicant -->--}}

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('script')
    @if(Session::get('success'))
        <script>
            $(document).ready(function () {
                toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
            });


        </script>

    @endif

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

    <script type="text/javascript">


        var jq = $.noConflict(true);
        jq(document).ready(function () {
            var table = jq('#example').DataTable({
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
