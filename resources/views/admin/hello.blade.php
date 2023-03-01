@extends('admin.master')

@section('content')

	<div class="p-5 m-5"></div>
	<div class="card text-center bg-danger">
		<div class="card-header">
		Something Error
		</div>
				<div class="card-body">
					<h5 class="card-title">You are not super-admin</h5>
					<p class="card-text">Sorry! you cann't do anything if you are not Super-Admin</p>
					<a href="{{url('admin/setting')}}" class="btn btn-primary">Back</a>
				</div>
			<div class="card-footer text-muted">
		
		</div>
	</div>
@endsection