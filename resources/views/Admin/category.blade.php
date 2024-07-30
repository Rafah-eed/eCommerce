@extends('Admin.master')
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">


				<div class="col-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">

					  <form class="forms-sample" method="post" action="/category/store">
						@if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
						@csrf
						<div class="form-group">
						  <label for="name">category Name</label>
						  <input type="text" class="form-control" name="name" id="name" required placeholder="write your new category name" value={{old ('name')}} >
						</div>


						{{-- @if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}


						@error('name')
						<span class="text-danger"> {{$message}}</span>
						@enderror


						<div class="form-group">
						  <label for="description">category Description</label>
						  <input type="text" class="form-control" name="description" id="description" required placeholder="write your new category name" value={{old ('description')}}>
						</div>



						{{-- another way to code errors :
							@if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}


						@error('name')
						<span class="text-danger"> {{$message}}</span>
						@enderror


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
