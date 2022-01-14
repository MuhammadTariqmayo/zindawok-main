@extends('admin_layouts.master')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert.css') }}">
<script>
  $(document).ready(function() {
        
    $('#link_table').DataTable({
        "aoColumnDefs": [{"bSortable": false, "aTargets": [0,3]}],
        "bProcessing": true,
        "bServerSide": true,
        "aaSorting": [[0, "desc"]],
        "sPaginationType": "full_numbers",
        "sAjaxSource": "{{ url('admin/getCompanyEmails') }}",
        "aLengthMenu": [[10, 50, 100, 500], [10, 50, 100, 500]]
    });  
  });

</script>
@endsection
@section('content')
<div class="content-body">
    
  <section id="configuration">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Company Emails</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <p class="card-text"></p>
                    <table class="table table-striped table-bordered zero-configuration data-table" id="link_table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Subject</th>
                          <th>Description</th> 
                          <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</div>
@endsection

@section('script')
<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 2000);


  </script>
@if(Session::get('success')) 
  <script>
    $(document).ready(function () 
    {
      toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
    });
  </script>
@endif
@endsection