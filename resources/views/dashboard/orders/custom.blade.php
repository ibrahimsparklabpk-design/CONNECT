@extends('dashboard.app')

@section('content')
<div class="dashboard-box-content">
    <h1>Custom Orders</h1>
    <p>Review all recent custom uniform orders</p>

    <div class="orders-wrapper mt-4">
        @forelse ($customOrders as $order)
            <div class="order-card mb-4 p-3 border rounded shadow-sm bg-white">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="fw-bold mb-0">Order #{{ $order->id }}</h5>
                    <span class="text-muted">
                        {{ $order->created_at ? $order->created_at->format('M d, Y') : '-' }}
                    </span>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2"><strong>First Name:</strong> {{ $order->first_name }}</div>
                    <div class="col-md-6 mb-2"><strong>Last Name:</strong> {{ $order->last_name }}</div>
                    <div class="col-md-6 mb-2"><strong>Email:</strong> {{ $order->email }}</div>
                    <div class="col-md-6 mb-2"><strong>Phone:</strong> {{ $order->phone }}</div>
                    <div class="col-md-6 mb-2"><strong>Country:</strong> {{ $order->country }}</div>
                    <div class="col-md-6 mb-2"><strong>City:</strong> {{ $order->city }}</div>
                    <div class="col-md-6 mb-2"><strong>State:</strong> {{ $order->state }}</div>
                    <div class="col-md-6 mb-2"><strong>ZIP Code:</strong> {{ $order->zip_code }}</div>
                    <div class="col-md-6 mb-2"><strong>Address:</strong> {{ $order->address }}</div>
                    <div class="col-md-6 mb-2"><strong>Account Holder:</strong> {{ $order->account_holder_name }}</div>
                    <div class="col-md-6 mb-2"><strong>Total Amount:</strong> ${{ number_format($order->amount, 2) }}</div>
                </div>

                <div class="mt-3">
                    <a href="{{ route('download.pdf') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-file-pdf"></i> Download PDF
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center text-danger fw-bold p-4 border rounded bg-white">
                No custom orders found.
            </div>
        @endforelse
    </div>

    {{-- ✅ Pagination --}}
    <div class="d-flex justify-content-center mt-3" style="font-weight:bold; color:#000;">
        {{ $customOrders->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
