// Initialize cart
var cart = [];

// Load cart from session storage on page load
if (sessionStorage.getItem('cart')) {
    cart = JSON.parse(sessionStorage.getItem('cart'));
    updateCart();
    updateCartModal();
}

// Add to cart button click event
$(document).on('click', '.add-to-cart', function(e) {
    e.preventDefault();
    // Get product data
    var id = $(this).data('id');
    var name = $(this).data('name');
    var price = $(this).data('price');

    // Check if product already exists in cart
    var exists = false;
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === id) {
            cart[i].quantity++;
            exists = true;
            break;
        }
    }

    // If product doesn't exist in cart, add it
    if (!exists) {
        var product = {
            id: id,
            name: name,
            price: price,
            quantity: 1
        };
        cart.push(product);
    }

    // Save cart to session storage
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Update cart
    updateCart();
    updateCartModal();

    // Show success message
    $('#add-to-cart-success').fadeIn(500).delay(1000).fadeOut(500);
});


// Remove item from cart button click event
$(document).on('click', '.remove-from-cart', function(e) {
    e.preventDefault();

    // Get product data
    var id = $(this).data('id');

    // Remove product from cart
    for (var i = 0; i < cart.length; i++) {
        if (cart[i].id === id) {
            cart.splice(i, 1);
            break;
        }
    }

    // Save cart to session storage
    sessionStorage.setItem('cart', JSON.stringify(cart));

    // Update cart
    updateCart();
    updateCartModal()

    // Show success message
    $('#remove-from-cart-success').fadeIn(500).delay(1000).fadeOut(500);
});




function updateCart() {
    var total = 0;
    var itemCount = 0;
    var cartItems = '';

    for (var i = 0; i < cart.length; i++) {
        total += cart[i].price * cart[i].quantity;
        itemCount += cart[i].quantity;

        cartItems += '<div class="cart-item">';
        cartItems += '<h6 class="cart-item-title">' + cart[i].name + '</h6>';
        cartItems += '<div class="cart-item-details">';
        cartItems += '<span class="cart-item-price">' + cart[i].price + '</span>';
        cartItems += '<span class="cart-item-quantity">' + cart[i].quantity + '</span>';
        cartItems += '<a href="#" class="remove-from-cart" data-id="' + cart[i].id + '">Remove</a>';
        cartItems += '</div></div>';
    }
    console.log(total.toFixed(2));
    $('#cart-total-modal').html(total.toFixed(2));
    $('#cart-item-count').html(itemCount);
    $('#cart-items').html(cartItems);

    // Update cart button
    $('#cart-count').html(itemCount);
}




function updateCartModal() {
    var total = 0;
    var itemCount = 0;
    var cartItems = '';
  
    if (cart.length == 0) {
      cartItems = '<h6 style="text-align: center">Your Cart is Empty </h6>';
    } else {
      cartItems += '<table id="cartTable">';
      cartItems += '<thead><tr><th>Item</th><th>Price</th><th>Quantity</th><th></th></tr></thead>';
      cartItems += '<tbody>';
  
      for (var i = 0; i < cart.length; i++) {
        var itemTotal = cart[i].price * cart[i].quantity;
        total += itemTotal;
        itemCount += cart[i].quantity;
  
        cartItems += '<tr>';
        cartItems += '<td class="cart-item-title">' + cart[i].name + '</td>';
        cartItems += '<td class="cart-item-price">' + cart[i].price + '€</td>';
        cartItems += '<td class="cart-item-quantity">';
        cartItems += '<button class="decrement-quantity" data-id="' + cart[i].id + '">-</button>';
        cartItems += cart[i].quantity;
        cartItems += '<button class="increment-quantity" data-id="' + cart[i].id + '">+</button>';
        cartItems += '</td>';
        cartItems += '<td><a href="#" class="remove-from-cart" data-id="' + cart[i].id + '">Remove</a></td>';
        cartItems += '</tr>';
      }
  
      cartItems += '</tbody></table>';
    }
  
    $('#cart-total-modal').html(total.toFixed(2));
    $('#cart-item-count-modal').html(itemCount);
    $('#cart-items-modal').html(cartItems);
  }
  

$(document).ready(function() {
    // Show cart modal
    $('#cartModal').on('show.bs.modal', function(event) {
        updateCartModal();
    });
});

// Decrement quantity button
$(document).on('click', '.decrement-quantity', function(e) {
    e.preventDefault();
    var itemId = $(this).data('id');
    var item = cart.find(function(item) {
        return item.id === itemId;
    });
    if (item.quantity > 1) {
        item.quantity--;
        updateCart();
        updateCartModal();
    }
});

// Increment quantity button
$(document).on('click', '.increment-quantity', function(e) {
    e.preventDefault();
    var itemId = $(this).data('id');
    var item = cart.find(function(item) {
        return item.id === itemId;
    });
    item.quantity++;
    updateCart();
    updateCartModal();
});