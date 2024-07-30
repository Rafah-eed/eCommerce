@extends('Admin.master')
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card tale-bg">


				<div class="col-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">

					  <form class="forms-sample" method="post" enctype="multipart/form-data" action="/product/store">
						@if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
						@csrf
						<div class="form-group">
						  <label for="name">product Name</label>
						  <input type="text" class="form-control" name="name" required id="name" placeholder="write your new category name" value={{old('name')}}>
						</div>


						{{-- @if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}


						@error('name')
						<span class="text-danger"> {{$message}}</span>
						@enderror


						<div class="form-group">
						  <label for="price"> product price</label>
						  <input type="number" class="form-control" name="price" required id="price"  placeholder="write your price" value={{old('price')}}>
						</div>

						@error('price')
						<span class="text-danger"> {{$message}}</span>
						@enderror

							  <div class="form-group row">
								<label for="id_category">Category</label>
								<div class="col-sm-9">

								  <select class="form-control" name="id_category">

									@foreach($categories as $one)
										<option value={{$one->id}}>{{$one->name}}</option>
									@endforeach

								  </select>
								</div>
							  </div>

						{{-- another way to code errors :
							@if($errors->has('name'))
						<div class="error">{{$errors->first('name') }}
							@enderror
						</div> --}}


						@error('id_category')
						<span class="text-danger"> {{$message}}</span>
						@enderror

                        <div class="form-group">
                            <label for="qty"> product quantity</label>
                            <input type="number" class="form-control" name="qty" id="qty" value={{old ('qty')}} required placeholder="write the quantity ">
                          </div>

                          @error('qty')
						<span class="text-danger"> {{$message}}</span>
						@enderror


						<div class="form-group">
							<label>File upload</label>
							<input type="file" id="photo" name="photo">
							<div class="input-group col-xs-12">
							</div>
						  </div>

						  @error('photo')
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




@endsection
