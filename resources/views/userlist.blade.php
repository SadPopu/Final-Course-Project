@extends ('navigationbar')

@section('content')
<div class="users">
   <div class="container" id="container-users">
      <div class="row">
         @foreach($data as $i)
         <div class="col-lg-4 col-md-4 all des">
                        <div class="users-item">
                           <a href="#"><img src={{$i->src}} alt=""></a>
                           <div class="down-content">
                              <a href="#">
                                 <h4>{{$i->username}}</h4>
                              </a>
                              <h5>{{$i->name}}</h5>
                              <h5>{{$i->surname}}</h5>
                              <span>{{$i->email}}</span>
                              
                           </div>
                           <button class="btn btn-dark btn-block" id="edit-product" 
                                onclick="window.location.href='{{ route('editprofileadmin',['id' => $i->id] ) }}'">Edit</button>
                           <button class="btn btn-dark btn-block" id="edit-product-delete" 
                              onclick="if(confirm('Are you sure you want to delete this profile?')) {
                                 window.location.href='{{ route('deleteprofileadmin',['id' => $i->id] ) }}'}">Delete
                           </button>

                        </div>
         </div>
         @endforeach
       </div>
    </div>       
</div>

@endsection ('content')