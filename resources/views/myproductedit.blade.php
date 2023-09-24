@extends ('navigationbar')
@section('content')
<div class="user">
   <div class="container" id="container-users">
      <div class="row2">
         <div class="user-item">
            <div class="down-content">
               <form action="{{ route('sample.validate_update_product')}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                  @method('PUT')
                  @foreach($data as $i)
                  <div class="form-group mb-3">
                     <h4>Product Image</h4>
                     <ul href="#">  <img  id="product-pic" src={{$i->src}} alt=""> </ul>
                     <input type="file" name="src" class="form-control" value="{{$i->src}}"/>
                  </div>
                  <div class="form-group mb-3">
                     <label for="name"> Name: </label>
                     <input type="text" name="name" class="form-control" value="{{$i->name}}"/>
                     @if($errors->has('username'))
                     <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                  </div>

                  <label for="price"> Price: </label>
                  <div class="form-group mb-3">
                     <input type="text" name="price" class="form-control" value="{{$i->price}}"/>
                     @if($errors->has('price'))
                     <span class="text-danger">{{ $errors->first('price') }}</span>
                     @endif
                  </div>
                  <label for="iva"> IVA: </label>
               <div class="form-group mb-3">
                  <input type="number" name="iva" class="form-control" step="0.01" min="0.00" max="0.23" value="{{$i->iva}}"/>
                  @if($errors->has('iva'))
                  <span class="text-danger">{{ $errors->first('iva') }}</span>
                  @endif
               </div>   

                  <label for="description"> Description: </label>
                  <div class="form-group mb-3">
                     <input type="text" name="description" class="form-control" value="{{$i->description}}"/>
                     @if($errors->has('surname'))
                     <span class="text-danger">{{ $errors->first('description') }}</span>
                     @endif
                  </div>
                  
                  <div class="form-group mb-3">
                     <select class="form-control" name="categoryID">
                     <?php
                        $categories = DB::table('categories')->get();
                        foreach ($categories as $category) {
                              echo "<option value='" . $category->id . "'>" . $category->name . "</option>";
                        }
                        ?>
                     </select>
                  </div>
                  <input type="hidden" name="id" class="form-control" value="{{$i->id}}"/>
                  <input type="hidden" name="userID" class="form-control" value="{{$i->userID}}"/>
                  <div class="d-grid mx-auto">
                     <button type="submit" class="btn btn-dark btn-block" id="edit-profile">Save</button>
                  </div>
               </form>
               <button class="btn btn-dark btn-block" id="edit-profile" 
                  onclick="window.location.href='{{ route('myproducts',['page' => 1] ) }}'">Cancel</button>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<script src="/assets/js/profile.js"></script>
@endsection ('content')
