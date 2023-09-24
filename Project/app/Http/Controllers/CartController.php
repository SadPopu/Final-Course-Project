<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the cart items from the session
        $cart = session()->get('cart');
        return view('cart', ['cart' => $cart]);
    }

    /**
     * Add an item to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // Get the product data from the request
        $product = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => 1,
        ];

        // Get the cart items from the session
        $cart = session()->get('cart', []);

        // Check if the product already exists in the cart
        $exists = false;
        foreach ($cart as &$item) {
            if ($item['id'] === $product['id']) {
                $item['quantity']++;
                $exists = true;
                break;
            }
        }

        // If the product doesn't exist in the cart, add it
        if (!$exists) {
            $cart[] = $product;
        }

        // Save the cart items to the session
        session()->put('cart', $cart);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Item added to cart.');
    }
}