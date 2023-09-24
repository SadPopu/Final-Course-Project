@extends ('navigationbar')
@section('content')
<--div class="user">
<div class="container" id="container-users">
   <div class="row">
      <div class="user-item">
         
         <div class="down-content">
            <form action="{{ route('sample.validate_update', ['id' => Auth::user()->id]) }}" method="POST">
               @csrf
                  <h4>Profile Picture</h4>
                  <a>
                  <ul href="#">  <img id="profile-pic" src={{Auth::user()->src}} alt=""> </ul>
                   <h4>Username</h4>
                   <ul class="editable" id="username">{{Auth::user()->username}}</ul>
                   <a></a>
                   <h4>Name</h4>
                   <ul class="editable" id="name">{{Auth::user()->name}}</ul>
                   <h4>Surname</h4>
                   <ul class="editable" id="surname">{{Auth::user()->surname}}</ul>
                   <h4>NIF</h4>
                   <ul class="editable" id="NIF">{{Auth::user()->NIF}}</ul>
                   <h4>email</h4>
                   <ul class="editable" id="email">{{Auth::user()->email}}</ul>
                   <h4>Phone Number</h4>
                   <ul class="editable" id="phoneNumber">{{Auth::user()->phoneNumber}}</ul>
                   <h4>Address</h4>
                   <ul class="editable" id="address">{{Auth::user()->address}}</ul>
                   <h4>Postal Code</h4>
                   <ul class="editable" id="postalCode">{{Auth::user()->postalCode}}</ul>
                   <h4>Locality</h4>
                   <ul class="editable" id="locality">{{Auth::user()->locality}}</ul>
                   <button type="submit" class="btn btn-dark btn-block" id="edit-profile-save" >Save</button>
                   </form>
            
         </div>
      </div>
      <button class="btn btn-dark btn-block" id="edit-profile-cancel" onclick="cancel()">Cancel</button>
      <button class="btn btn-dark btn-block" id="edit-profile" onclick="window.location.href='{{ route('profileedit') }}'">Edit</button>
   </div>
</div>
</div>
<script src="/assets/js/profile.js"></script>
@endsection ('content')
