@extends ('navigationbar')
@section('content')
<div class="user">
<div class="container" id="container-users">
   <div class="row2">
      <div class="user-item">
         
         <div class="down-content">
          
         <form action="{{ route('sample.validate_update_admin')}}" method="POST" enctype="multipart/form-data" >
               @csrf
               @method('PUT') 
               @foreach($user as $i)
               <div class="form-group mb-3">
               <h4>Profile Image</h4>
               <ul href="#">  <img  id="profile-pic" src={{$i->src}} alt=""> </ul>
               <input type="file" name="src" class="form-control" id="resize-image-name">
               </div>
               <div class="form-group mb-3">
                  <label for="username"> Username: </label>
                  <input type="text" name="username" class="form-control" value="{{$i->username}}"/>
                  @if($errors->has('username'))
                  <span class="text-danger">{{ $errors->first('username') }}</span>
                  @endif
               </div>
               <label for="name"> Name: </label>
               <div class="form-group mb-3">
                  <input type="text" name="name" class="form-control" value="{{$i->name}}"/>
                  @if($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
               </div>
               <label for="surname"> Surname: </label>
               <div class="form-group mb-3">
                  <input type="text" name="surname" class="form-control" value="{{$i->surname}}"/>
                  @if($errors->has('surname'))
                  <span class="text-danger">{{ $errors->first('surname') }}</span>
                  @endif
               </div>
               <label for="email"> Email: </label>
               <div class="form-group mb-3">
                  <input type="email" name="email" class="form-control" value="{{$i->email}}"/>
                  @if($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <label for="IBAN"> IBAN: </label>
               <div class="form-group mb-3">
                  <input type="text" name="IBAN" class="form-control" value="{{$i->IBAN}}"/>
                  @if($errors->has('IBAN'))
                  <span class="text-danger">{{ $errors->first('IBAN') }}</span>
                  @endif
               </div>
               <label for="NIF"> NIF: </label>
               <div class="form-group mb-3">
                  <input type="number" name="NIF" class="form-control" value="{{$i->NIF}}" />
                  @if($errors->has('NIF'))
                  <span class="text-danger">{{ $errors->first('NIF') }}</span>
                  @endif
               </div>
               <label for="phoneNumber"> Phone Number: </label>
               <div class="form-group mb-3">
                  <input type="text" name="phoneNumber" class="form-control" value="{{$i->phoneNumber}}"/>
                  @if($errors->has('phoneNumber'))
                  <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                  @endif
               </div>
               <label for="address"> Address: </label>
               <div class="form-group mb-3">
                  <input type="text" name="address" class="form-control" value="{{$i->address}}"/>
                  @if($errors->has('address'))
                  <span class="text-danger">{{ $errors->first('address') }}</span>
                  @endif
               </div>
               <label for="postalCode"> Postal Code: </label>
               <div class="form-group mb-3">
                  <input type="text" name="postalCode" class="form-control" value="{{$i->postalCode}}"/>
                  @if($errors->has('postalCode'))
                  <span class="text-danger">{{ $errors->first('postalCode') }}</span>
                  @endif
               </div>
               <label for="locality"> Locality: </label>
               <div class="form-group mb-3">
                  <input type="text" name="locality" class="form-control" value="{{$i->locality}}"/>
                  @if($errors->has('locality'))
                  <span class="text-danger">{{ $errors->first('locality') }}</span>
                  @endif
               </div>

               <label for="roleID"> Role ID: </label>
               <div class="form-group mb-3">
                     <select class="form-control" name="roleID">
                        <option value="2">Customer</option>   
                        <option value="1">Admin</option>
                     </select>
            
               </div>
               <input type="hidden" class="form-control" name="id" value="{{$i->id}}"/>

               <div class="d-grid mx-auto">

                  <button type="submit" class="btn btn-dark btn-block" id="edit-profile">Save</button>
               </div>
              
            </form>
            <button class="btn btn-dark btn-block" id="edit-profile" onclick="window.location.href='{{ route('users') }}'">Cancel</button>

            @endforeach 
         </div>
      </div>
   </div>
</div>
</div>
<script src="/assets/js/profile.js"></script>
@endsection ('content')
