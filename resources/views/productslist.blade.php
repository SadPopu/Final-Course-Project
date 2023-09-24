@extends ('navigationbar')

@section('content')

<div class="products">
   <div class="container" id="container-products">
      <div class="row">
         <div class="col-md-12">
         <div class="filters">
            <ul>
               <li class="btn active" data-filter="*">All Products</li>
               @foreach($categories as $category)
               <li class="btn" data-filter="{{$category->id}}">{{$category->name}}</li>
               @endforeach
            </ul>
            
         </div>
</div>
         </div>
         <div class="col-md-12">
            <div class="filters-content">
               <div class="row grid">
               
                  @foreach($data as $i)
                  <div class="col-lg-4 col-md-4 all des">
                     <div class="product-item" data-filter="{{$i->categoryID}}">
                        <a href="#"><img src='{{$i->src}}' alt=""></a>
                        <div class="down-content">
                           <a href="#">
                              <h4 class="product-name">{{$i->name}}</h4>
                           </a>
                           <?php 
                              $price = $i->price*$i->iva+$i->price;
                              echo "<h6 class='product-price'> $price €</h6>"
                              ?>
                           <p>Description: {{$i->description}}</p>
                           
                           <ul class="buttons-cart">
                              <button class="btn btn-primary add-to-cart" data-id="{{ $i->id }}" 
                                 data-name="{{ $i->name }}" data-price="{{ $price }}">Add to Cart
                              </button>
                              <button class="btn btn-primary remove-from-cart" data-id="{{ $i->id }}" 
                              >Remove from Cart
                              </button>
                           </ul>
                           <?php if (Auth::check()):?>

                           <?php if (Auth::user()->roleID == 1):?>
                              
                              <?php
                                 $user = DB::table('users')->where('id', '=', $i->userID)->first(); 
                                 echo "<div>
                                             <h4 style='color: red'><br>Admin View</h4>
                                             <h4>Username: $user->username</h4>
                                       </div>"
                              ?>
                              <button class="btn btn-dark btn-block" id="edit-product" 
                                onclick="window.location.href='{{ route('producteditadmin',['id' => $i->id] ) }}'">Edit</button>
                                <button class="btn btn-dark btn-block" id="edit-product-delete" 
                                 onclick="if(confirm('Are you sure you want to delete this product?')) {
                                       window.location.href='{{ route('productdeleteconfirmadmin',['id' => $i->id] ) }}'
                                 }">Delete
                           </button>
                           <?php endif ?>
                           <?php endif ?>
                           <div id="add-to-cart-success" style="display:none;">
                              Product added to cart!
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         <div class="pagination">
  
    <!-- Show previous page button if not on the first page -->
    @if ($currentPage > 1)
      <a href="{{ '/products/'. ($currentPage - 1) }}">«</a>
    @endif
    
    <!-- Show first page button if there are more than five pages -->
    @if ($maxPages > 5 && $currentPage > 3)
      <a href="{{ '/products/'. '1' }}">1</a>
      <!-- Show ... to indicate skipped pages -->
      <span>...</span>
    @endif
    
    <!-- Show two pages before the current page button if not on the first two pages -->
    @if ($currentPage > 2)
      <a href="{{ '/products/'. ($currentPage - 2) }}">{{ $currentPage - 2 }}</a>
    @endif
    
    <!-- Show one page before the current page button if not on the first page -->
    @if ($currentPage > 1)
      <a href="{{ '/products/'. ($currentPage - 1) }}">{{ $currentPage - 1 }}</a>
    @endif
    
    <!-- Show current page button -->
     <a class="active" href="{{ '/products/'. $currentPage }}">{{ $currentPage }}</a>
    
    <!-- Show one page after the current page button if not on the last page -->
    @if ($currentPage < $maxPages)
      <a href="{{ '/products/'. ($currentPage + 1) }}">{{ $currentPage + 1 }}</a>
    @endif
    
    <!-- Show two pages after the current page button if not on the last two pages -->
    @if ($currentPage < $maxPages - 1)
      <a href="{{ '/products/'. ($currentPage + 2) }}">{{ $currentPage + 2 }}</a>
    @endif
    
    <!-- Show last page button if there are more than five pages -->
    @if ($maxPages > 5 && $currentPage < $maxPages - 2)
      <!-- Show ... to indicate skipped pages -->
      <span>...</span>
      <a href="{{ '/products/'. $maxPages }}">{{ $maxPages }}</a>
    @endif
    
    <!-- Show next page button if not on the last page -->
    @if ($currentPage < $maxPages)
      <a href="{{ '/products/'. ($currentPage + 1) }}">»</a>
    @endif
  
</div>
        
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/assets/js/filterProducts.js"></script>

@endsection ('content')
