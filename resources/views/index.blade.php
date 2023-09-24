@extends ('navigationbar')

@section ('content')

    
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="/products/1">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          @foreach($data as $i)
                  <div class="col-lg-4 col-md-4 all des">
                     <div class="product-item">
                        <a ><img src={{$i->src}} alt=""></a>
                        <div class="down-content">
                           <a >
                              <h4>{{$i->name}}</h4>
                           </a>
                           <?php 
                              $price = $i->price*$i->iva+$i->price;
                              echo "<h6> $price €</h6>"
                              ?>
                           <p>{{$i->description}}</p>                       
                        </div>
                     </div>
                  </div>

                  @endforeach
          
          
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Having Trouble at AgriShop</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Do you have any question?</h4>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
                <li><a href="#">Non cum id reprehenderit</a></li>
              </ul>
              <a href="contact.html" class="filled-button">Contact Us</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Unique <em>AgriShop</em> Products</h4>
                  <p>Keep shopping with us and search your favourite products in our Products page.</p>
                </div>
                <div class="col-md-4">
                  <a href="/products/1" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    
    @endsection ('content')

   
