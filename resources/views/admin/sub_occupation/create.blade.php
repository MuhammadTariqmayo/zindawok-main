@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('admin.suboccupation.store')}}">
                    @csrf

                    @csrf
                    @if (count($errors) > 0)
                       <div class="alert alert-sussess">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                       </div>
                     @endif

                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Create Sub Occupation</h4>
                        <div class="row">
                          	<div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">SubOccupation</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" placeholder="Enter sub-occuption"
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Occupation</label>
                                    <div class="col-md-9">
                                        <select class="form-control border-primary" name="parent_id" required>  
                                            <option selected disabled="">Select Occupation</option>
                                            @foreach($occupations as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
