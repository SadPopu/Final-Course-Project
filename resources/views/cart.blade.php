@extends ('navigationbar')

@section('content')
<div class="container">
    <h1>Cart Items</h1>

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['quantity'] * $item['price'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right">
            <p><strong>Total: {{ $total }}</strong></p>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection