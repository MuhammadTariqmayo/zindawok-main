@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('admin_salary_store')}}">
                    @csrf

                    @if (count($errors) > 0)
                    <div class="alert alert-success">
                     <ul>
                     @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                     @endforeach
                        </ul>
                        </div>
                    @endif

                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Create Salary</h4>
                        <div class="row">
                          	<div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Start Salary</label>
		                            <div class="col-md-9">
		                                <input type="number" id="userinput1" class="form-control border-primary" placeholder="Enter start_salary"
		                                name="start_salary" required>
		                            </div>
                        		</div>
                     		</div>

                             <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">End salary</label>
		                            <div class="col-md-9">
		                                <input type="number" id="userinput1" class="form-control border-primary" placeholder="Enter end_salary"
		                                name="end_salary" required>
		                            </div>
                        		</div>
                     		</div>
                            <div class="col-md-3">
                                <div class="form-group row">

                                </div>
                            </div>
                        </div>
                    </div>
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
	                          	<i class="la la-check-square-o"></i> Save
	                        </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
