@extends('Admin.master')
@section('content')
<div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                
				
				<div class="col-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">
					  
					  <form class="forms-sample" method="post" action="/category/update">
						@if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
						@csrf
						
						<input type="number"  name="id" id="id" hidden value="{{$exist->id}}">
						
						<div class="form-group">
						  <label for="name">category Name</label>
						  <input type="text" class="form-control" name="name" id="name" value="{{$exist->name}}" placeholder="{{$exist->name}}">
						</div>
						
						<div class="form-group">
						  <label for="description">category Description</label>
						  <input type="text" class="form-control" name="description" id="description" value="{{$exist->description}}" placeholder="{{$exist->description}}">
						</div>
						
						<button type="submit" class="btn btn-primary mr-2">Update</button>
						<button class="btn btn-light">Cancel</button>
					  </form>
					</div>
				  </div>
				</div>
              </div>
            </div>
		  </div>
	   </div>
	</div>
</div>
			
                                          

@endsection