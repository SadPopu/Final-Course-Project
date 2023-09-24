@extends ('navigationbar')
@section('content')
<div class="user">
<div class="container" id="container-users">
   <div class="row">
      <div class="user-item" id="createitem">
         
         <div class="down-content">
         <form action="{{ route('sample.validate_add_product')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="form-group mb-3">
                  <h4>Choose a Product Image</h4>
                  <input type="file" name="src" class="form-control">
               </div>
               <div class="form-group mb-3">
                  <label for="name"> Product Name: </label>
                  <input type="text" name="name" class="form-control" Placeholder="Product Name"/>
                  @if($errors->has('username'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
               </div>
               <label for="description"> Description: </label>
               <div class="form-group mb-3">
                  <input type="text" name="description" class="form-control" Placeholder="Description"/>
                  @if($errors->has('surname'))
                  <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
               </div>  
               <label for="price"> Price (€): </label>
               <div class="form-group mb-3">
                  <input type="number" name="price" class="form-control" Placeholder="Input Price"/>
                  @if($errors->has('price'))
                  <span class="text-danger">{{ $errors->first('price') }}</span>
                  @endif
               </div>
               <label for="iva"> IVA: </label>
               <div class="form-group mb-3">
                  <input type="number" name="iva" class="form-control" step="0.01" min="0.00" max="0.23"Placeholder="0.23"/>
                  @if($errors->has('iva'))
                  <span class="text-danger">{{ $errors->first('iva') }}</span>
                  @endif
               </div>   
               <label for="categoryID"> Categoria: </label>
               <div class="form-group mb-3">
               <select class="form-control" name="categoryID">
                  <?php
                     // Fetch categories from database
                     $categories = DB::table('categories')->get();

                     // Iterate over categories and create an option for each one
                     foreach ($categories as $category) {
                           echo "<option value='" . $category->id . "'>" . $category->name . "</option>";
                     }
                  ?>
                 
            </select>
            </div>
               <button type="submit" class="btn btn-dark btn-block" id="edit-profile">Save</button>
            </form>
         </div>
      </div>
   </div>
</div>
</div>
<script src="/assets/js/profile.js"></script>
@endsection ('content')
