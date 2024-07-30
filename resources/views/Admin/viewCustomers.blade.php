@extends('Admin.master')
@section('content')
<div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card tale-bg">

				<div class="col-lg-12 grid-margin stretch-card">
				  <div class="card">
					<div class="card-body">
					  <h4 class="card-title">Cateories Table</h4>

					  <div class="table-responsive">
						<table class="table table-hover">
						  <thead>
							<tr>
							  <th>First Name</th>
							  <th>Last Name</th>
							  <th>Sex</th>
							  <th>Date Of Birth</th>
                              <th>Address</th>
                              <th>Update</th>
                              <th>Delete</th>
							</tr>
						  </thead>
						  <tbody>
							@if(Session::get('fail'))
								<div class="alert alert-danger">{{Session::get('fail')}}</div>
							@endif
							@if(Session::get('success'))
								<div class="alert alert-success">{{Session::get('success')}}</div>
							@endif


							@foreach($customers as $one)

                                <tr>
                                <td>{{$one->f_name}}</td>
                                <td>{{$one->l_name}}</td>

                                @if ($one->sex=='M'){
                                    <td>Male</td>
                                }
                                else{
                                    <td>Female</td>
                                }
                                 @endif
                                <td>{{$one->date_of_birth}}</td>
                                <td>{{$one->address}}</td>
                                <td>
                                    <form class="forms-sample" method="post" action="/category/edit">
                                        <input type="number" class="form-control" name="id" id="id" hidden="" value={{$one->id}}>

                                        @csrf
                                        <button type="submit" class="btn btn-sm  account-image-reset " >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <form class="forms-sample" method="post" action="/category/delete">
                                        <input type="number" class="form-control" name="id" id="id" hidden="" value={{$one->id}}>

                                        @csrf
                                        <button type="submit" class="btn btn-sm  account-image-reset " >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                    </svg>
                                        </button>
                                    </form>
                                </td>

                                </tr>
							@endforeach

						  </tbody>
						</table>
					  </div>
					</div>
				  </div>
				</div>


              </div>
            </div>
		  </div>

</div>



@endsection
