@extends('Admin.master')
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">


				<div class="col-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">

					  <form class="forms-sample" method="post" enctype="multipart/form-data" action="/product/update">
						@if(Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @if(Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
						@csrf

						<input type="number"  name="id" id="id" hidden value="{{$exist->id}}">

						<div class="form-group">
						  <label for="name">Name</label>
						  <input type="text" class="form-control" name="name" id="name" value="{{$exist->name}}" placeholder="{{$exist->name}}">
						</div>

                            <div class="form-group row">
                                <label for="id_category">Category</label>
                                <div class="col-sm-9">

                                    <select class="form-control" name="id_category">
                                        <option name="id_category" value="{{($exist->id_category)}}">{{$existCategory->name}}</option>
                                        @foreach($allCategory as $three)

                                            <option name="id_category" value="{{$three->id}}">{{$three->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="name" value="{{$exist->price}}" placeholder="{{$exist->price}}">
                            </div>

                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="text" class="form-control" name="qty" id="qty" value="{{$exist->qty}}" placeholder="{{$exist->qty}}">
                            </div>

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" id="photo" name="photo" value="{{$exist->photo}}">
                                <div class="input-group col-xs-12">
                                </div>
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
