
@extends ('navigationbar')

@section('content')
    <div class="container" style="padding-top: 5%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('This user have Products associated!') }}</div>

                    <div class="card-body">
                        <p>{{ __('Are you sure you want to delete this user?') }}</p><br>
                        <form method="POST" action="{{ route('confirmDeleteUserAdmin', $user->id) }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                    <a href="{{ route('users') }}" class="btn btn-primary">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
