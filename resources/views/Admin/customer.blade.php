@extends('Admin.master')
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">


				<div class="col-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">

					  <form class="forms-sample" method="post" action="/customer/store">
						@if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
						@csrf
						<div class="form-group">
						  <label for="f_name">First Name</label>
						  <input type="text" class="form-control" name="f_name" id="f_name" required placeholder="write your first name" value={{old ('f_name')}} >
						</div>

						{{-- @if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}

                        @error('f_name')
						<span class="text-danger"> {{$message}}</span>
						@enderror

                        <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" class="form-control" name="l_name" id="l_name" required placeholder="write your last name" value={{old ('l_name')}} >
                        </div>

                        @error('l_name')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror

                        <div class="form-group">
                        <label for="sex">sex</label>
                            <div class="col-sm-9">

                                <select class="form-control" name="sex">
                                        <option value='M'>Male</option>
                                        <option value='F'>Female</option>
                                </select>
                            </div>
                        </div>

                            @error('sex')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror

						<div class="form-group">
						  <label for="date_of_birth">Date of birth</label>
						  <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required placeholder="write your birth date " value={{old ('date_of_birth')}}>
						</div>

                            @error('date_of_birth')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" required placeholder="write your address" value={{old ('address')}}>
                            </div>

                            @error('address')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror

						{{-- another way to code errors :
							@if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}

						<button type="submit" class="btn btn-primary mr-2">Submit</button>
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
