@extends ('navigationbar')

@section('content')

<div class="row justify-content-center">

	<div class="col-md-4">
   @if ($message = Session::get('success'))
      <div class="alert alert-info">
         {{$message}} 
      </div>
   @endif
		<div class="card">
			<div class="card-header"> Login</div>
			<div class="card-body">
				<form action="{{route('sample.validate_login') }}" method="Post">
					@csrf
					<div class="form-group mb-3">
					<label for="username"> Username: </label>
						<input type="text" name="username" class="form-control" placeholder="username"/>
						@if($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<label for="password"> Pw: </label>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="password"/>
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					
					
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

		
@endsection ('content')
