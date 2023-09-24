@extends ('navigationbar')

@section('content')

<div class="products">
   <div class="container" id="container-products">
      <div class="row">
         <div class="col-md-12">
            <!--div class="filters">
               <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
               </ul>
            </div-->
         </div>
         <div class="col-md-12">
            <div class="filters-content">
            <button class="btn btn-green btn-block" id="add-product" onclick="window.location.href='{{ route('addproduct') }}'">Add New Product</button>

               <div class="row grid">
                  @foreach($data as $i)
                  <div class="col-lg-4 col-md-4 all des">
                     <div class="product-item">
                        <a href='{{ route('productedit',['id' => $i->id] ) }}'><img src='{{$i->src}}' alt=""></a>
                        <div class="down-content">
                           <a href="#">
                              <h4>{{$i->name}}</h4>
                           </a>
                           <?php 
                              $price = $i->price*$i->iva+$i->price;
                              echo "<h6> $price €</h6>"
                              ?>
                           <p>{{$i->description}}</p>
                           <button class="btn btn-dark btn-block" id="edit-product" 
                                onclick="window.location.href='{{ route('productedit',['id' => $i->id] ) }}'">Edit</button>
                           <button class="btn btn-dark btn-block" id="edit-product-delete" 
                                 onclick="if(confirm('Are you sure you want to delete this product?')) {
                                       window.location.href='{{ route('productdeleteconfirm',['id' => $i->id] ) }}'
                                 }">Delete
                           </button>


                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>

            </div>
         </div>

         <div class="pagination">
  
    
    @if ($currentPage > 1)
      <a href="{{ '/myProducts/'. ($currentPage - 1) }}">«</a>
    @endif
    
    
    @if ($maxPages > 5 && $currentPage > 3)
      <a href="{{ '/myProducts/'. '1' }}">1</a>
      
      <span>...</span>
    @endif
    
    
    @if ($currentPage > 2)
      <a href="{{ '/myProducts/'. ($currentPage - 2) }}">{{ $currentPage - 2 }}</a>
    @endif
    
    
    @if ($currentPage > 1)
      <a href="{{ '/myProducts/'. ($currentPage - 1) }}">{{ $currentPage - 1 }}</a>
    @endif
    
    
     <a class="active" href="{{ '/myProducts/'. $currentPage }}">{{ $currentPage }}</a>
    
   
    @if ($currentPage < $maxPages)
      <a href="{{ '/myProducts/'. ($currentPage + 1) }}">{{ $currentPage + 1 }}</a>
    @endif
    
   
    @if ($currentPage < $maxPages - 1)
      <a href="{{ '/myProducts/'. ($currentPage + 2) }}">{{ $currentPage + 2 }}</a>
    @endif
    
    
    @if ($maxPages > 5 && $currentPage < $maxPages - 2)
      
      <span>...</span>
      <a href="{{ '/myProducts/'. $maxPages }}">{{ $maxPages }}</a>
    @endif
    
    
    @if ($currentPage < $maxPages)
      <a href="{{ '/myProducts/'. ($currentPage + 1) }}">»</a>
    @endif
  
</div>
        
      </div>
   </div>
</div>
@endsection ('content')
