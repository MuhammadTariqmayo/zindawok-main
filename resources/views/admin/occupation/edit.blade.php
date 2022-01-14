@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('admin.occupation.update' , $occupation->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Edit Occupation</h4>
                        <div class="row">
                          	<div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Occupation</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$occupation->name}}" 
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>

                             <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Industry</label>
		                            <div class="col-md-9">
                                    <select class="form-control border-primary" name="industry" required>  
                                            <option selected disabled="">Select industry</option>
                                           
                                            @foreach($industry as $row)
                                            @if($row->id == $occupation->industry_id)
                                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                            @else
                                            <option value="{{$row->id}}" >{{$row->name}}</option>
                                            @endif
                                            @endforeach
                                            
                                          
                                        </select>
		                            </div>
                        		</div>
                     		</div>
                           
                        </div>
                    </div>
	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
	                          	<i class="la la-check-square-o"></i> Update
	                        </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
