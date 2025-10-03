@extends('backend.layout.master')


@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <!-- 🛒 Heading (Centered) -->
                <div style="display: flex; justify-content: center; padding-top: 40px; padding-bottom: 40px;"
                    class="pt-4 mb-4">
                    <h2 class="fw-bold text-center m-0">🛒 Cart Items</h2>
                </div>

                <!-- 🧾 Table -->
                <div class="team-form-container" style="padding-bottom: 40px;">
                    <div class="table-responsive">
                        <a href="{{ route('custome.index') }}"
                            style="background-color: #000000; 
          color: #fff; 
          padding: 8px 18px; 
          margin-bottom: 8px;
          border-radius: 5px; 
          text-decoration: none; 
          font-weight: bold; 
          transition: 0.3s; 
          float: right;">
                            ← Back
                        </a>

                        <h3>Cart Items</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Shirt Size</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cart as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['number'] }}</td>
                <td>{{ strtoupper($item['shirt_size']) }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ number_format($item['total'], 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h4>Grand Total: ${{ number_format($grandTotal, 2) }}</h4>


                        <form action="{{ route('custome.cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning">Clear Cart</button>
                        </form>

                    </div>
                </div>

                <!-- ✅ Checkout Button -->
                <!-- ✅ Checkout Button - Properly Centered -->
                <div style="display: flex; justify-content: center; padding-bottom: 50px; padding-top: 50px;">
    <a href="{{ route('custom-order.create') }}" class="addtocart_btn">
        Proceed to Checkout ( ${{ number_format($grandTotal, 2) }} )
    </a>
</div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
