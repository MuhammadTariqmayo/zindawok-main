@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('admin.sub_occupation.update' , $subOccupation->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Edit SubOccupation</h4>
                        <div class="row">
                          	<div class="col-md-6">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1"> Name:</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$subOccupation->name}}" 
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>
                    

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput1">Occupation:</label>
                                    <div class="col-md-9">
                                        
                                    <select id="parent_id" name="parent_id" class="form-control border-primary" required>
                                    @foreach($occupations as $occupation)
                                            <option value="{{ $occupation->id }}" {{ $occupation->id === $subOccupation->parent_id ? 'selected' : ''}}>{{ $occupation->name }}</option>
                                            @endforeach
                                        
                                        </select>
                                    </div>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group row">
                                    
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
