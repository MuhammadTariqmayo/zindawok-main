@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('admin_cities_update' , $city->id)}}">
          
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Edit City</h4>
                        <div class="row">
                        <!-- <div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Province Id</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$city->province_id}}" 
		                                name="province" required>
		                            </div>
                        		</div>
                     		</div> -->
                          	<div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">City Name</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$city->name}}" 
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>
                   
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
	                          	<i class="la la-check-square-o"></i> Update
	                        </button>
	                    </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
