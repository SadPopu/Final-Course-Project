@extends ('navigationbar')

@section('content')
<div class="container" style="padding-top: 5%;">
         @if (session('error'))
            <div class="alert alert-danger">
               {{ session('error') }}
            </div>
         @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>
                  <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        
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
@endsection
