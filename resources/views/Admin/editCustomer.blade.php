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
						  <label for="f_name">First Name</label>
						  <input type="text" class="form-control" name="f_name" id="f_name" value="{{$exist->f_name}}" placeholder="{{$exist->f_name}}">
						</div>

                        <div class="form-group">
						  <label for="l_name">Last Name</label>
						  <input type="text" class="form-control" name="l_name" id="l_name" value="{{$exist->l_name}}" placeholder="{{$exist->l_name}}">
						</div>

                        <div class="form-group">
                        <select class="form-control" name="sex" value="{{$exist->sex}}">
                                        <option value='M'>Male</option>
                                        <option value='F'>Female</option>
                                </select>
						</div>
						
                        <div class="form-group">
						  <label for="date_of_birth">Date Of Birth</label>
						  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$exist->date_of_birth}}" placeholder="{{$exist->date_of_birth}}">
						</div>

						<div class="form-group">
						  <label for="address">Address</label>
						  <input type="text" class="form-control" name="address" id="address" value="{{$exist->address}}" placeholder="{{$exist->address}}">
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