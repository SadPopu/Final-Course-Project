<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AgriShop</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/agrishop.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="icon" type="image/x-icon" href="/storage/images/logo.jpg">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

 
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/"><h2>Agri <em>Shop</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/products/1">Our Products</a>
              </li>
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('registration')}}">Register</a>
              </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/myProducts/1">My Products</a>
              </li>
            <?php if (Auth::user()->roleID == 1):?>
              <li class='nav-item'>
              <a style="color:yellow;" class='nav-link' href="{{route('users')}}">Users</a>
            </li>
            <li class='nav-item'>
              <a style="color:yellow;" class='nav-link' href="{{route('categories.index')}}">Categories</a>
            </li>
            <?php endif ?>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
              </li>
            @endguest 
            <li class="nav-item">
            <button id="cart-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
              <i class="fa fa-shopping-cart"></i> Cart (<span id="cart-count">0</span>)
            </button>
            </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="cart-items" id="cart-items-modal"></div>
        <br><div class="cart-total">Total: <span id="cart-total-modal"></span>€</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Checkout</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('content') 
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; AgriShop
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

     <!-- Bootstrap core JavaScript -->
     <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/owl.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/isotope.js"></script>
    <script src="../assets/js/accordions.js"></script>
    <script src="/assets/js/cart.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>

</html>