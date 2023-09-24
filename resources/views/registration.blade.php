@extends ('navigationbar')

@section('content')

<div class="row justify-content-center">
@if ($message = Session::get('success'))

<div class="alert alert-info">
   {{$message}} 
</div>
@endif

	<div class="col-md-4">
		<div class="card">
			<div class="card-header"> Registration</div>
			<div class="card-body">
				<form action="{{route('sample.validate_registration') }}" method="Post">
					@csrf
					<div class="form-group mb-3">
					<label for="username"> Username: </label>
						<input type="text" name="username" class="form-control" />
						@if($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<label for="password"> Pw: </label>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<label for="name"> Name: </label>
					<div class="form-group mb-3">
						<input type="text" name="name" class="form-control" />
						@if($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<label for="surname"> Surname: </label>
					<div class="form-group mb-3">
						<input type="text" name="surname" class="form-control" />
						@if($errors->has('surname'))
							<span class="text-danger">{{ $errors->first('surname') }}</span>
						@endif
					</div>
					<label for="email"> Email: </label>
					<div class="form-group mb-3">
						<input type="email" name="email" class="form-control" />
						@if($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<label for="IBAN"> IBAN: </label>
					<div class="form-group mb-3">
						<input type="text" name="IBAN" class="form-control" />
						@if($errors->has('IBAN'))
							<span class="text-danger">{{ $errors->first('IBAN') }}</span>
						@endif
					</div>
					<label for="NIF"> NIF: </label>
					<div class="form-group mb-3">
						<input type="number" name="NIF" class="form-control" />
						@if($errors->has('NIF'))
							<span class="text-danger">{{ $errors->first('NIF') }}</span>
						@endif
					</div>
					<label for="phoneNumber"> Phone Number: </label>
					<div class="form-group mb-3">
						<input type="text" name="phoneNumber" class="form-control" />
						@if($errors->has('phoneNumber'))
							<span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
						@endif
					</div>
					<label for="address"> Address: </label>
					<div class="form-group mb-3">
						<input type="text" name="address" class="form-control" />
						@if($errors->has('address'))
							<span class="text-danger">{{ $errors->first('address') }}</span>
						@endif
					</div>
					<label for="postalCode"> Postal Code: </label>
					<div class="form-group mb-3">
						<input type="text" name="postalCode" class="form-control" />
						@if($errors->has('postalCode'))
							<span class="text-danger">{{ $errors->first('postalCode') }}</span>
						@endif
					</div>
					<label for="locality"> Locality: </label>
					<div class="form-group mb-3">
						<input type="text" name="locality" class="form-control" />
						@if($errors->has('locality'))
							<span class="text-danger">{{ $errors->first('locality') }}</span>
						@endif
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block">Register</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

		
@endsection ('content')
