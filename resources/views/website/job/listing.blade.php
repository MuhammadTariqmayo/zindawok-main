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
         <h3 class="text-center py-3">Job Listing</h3>
         <table id="example" class="display nowrap" style="width:100%;overflow-x: auto;">
            <thead>
               <tr>
                  <th>Seq.</th>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Salary</th>
                  <th>Date</th>
                  <th>Welcome Bonus</th>
                  <th>Shift</th>
                  <th>Vedio</th>
                  <th>Description</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody style="vertical-align: top">
               @foreach($jobs as $job)
                  <tr>
                     <td>{{ $job->id }}</td>
                     <td>
                        <img src="{{ asset('storage/job_image/'.$job->image) }}" style="width: 50px;height:50px;border:1px solid #ddd" alt="">
                     </td>
                     <td>{{ $job->company }}</td>
                     <td class="text1" style="max-width: 200px;">{{ $job->title }}</td>
                     <td> {{ $job->start_salary }}-{{ $job->end_salary }} </td>
                     <td> {{ $job->posted_at }} </td>
                     <td> Rs: {{ $job->welcome_bonus }}/- </td>
                     <td> {{ $job->shift }} </td>
                     <td>
                        <video style="width: 50px;height:50px; border: 1px solid #ddd;" controls>
                           <source src="{{ asset('storage/job_video/'.$job->video)}}" type="video/mp4">
                        </video>
                     </td>
                     <td class="text1" style="max-width: 400px">{{ $job->about }}</td>
                     <td>
                        <a href="{{ route('company.job.detail' , $job->id )}}">
                           <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                        </a> &nbsp;
                        <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="" title="Delete Job">
                              <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </a>
                        <a href="{{ route('company.job.edit' , $job->id )}}">
                           <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        </a>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
<div class="modal" id="smallModal" style="height: 40vh !important;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Are You Sure ?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Do You Want To Delete This Job
      <div class="modal-footer">
        <button type="button" class="btn btn-danger mr-3" data-dismiss="modal">Cancel</button>
         <form action="{{ route('company.job.delete', $job->id) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Yes</button>
         </form>
      </div>
      </div>

      <!-- Modal footer -->


    </div>
  </div>
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
