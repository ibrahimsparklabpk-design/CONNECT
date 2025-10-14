@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>Static Orders</h1>
        <p>Connecting you with Dominican Businesses Worldwide</p>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        {{-- <th>Order ID</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount($)</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td>#{{ $order->id }}</td> --}}
                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>${{ number_format($order->amount, 2) }}</td>
                            <td>{{ $order->country }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->created_at->format('M d Y') }}</td> 
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- ✅ Pagination links --}}
            <div class="d-flex justify-content-center mt-3" style="font-weight:bold; color:#000;">
                <style>
                    .pagination .page-link {
                        color: #000 !important;
                        /* dark text */
                        font-weight: bold !important;
                        /* bold text */
                        border: 1px solid #555 !important;
                    }

                    .pagination .page-item.active .page-link {
                        background-color: #000 !important;
                        /* dark background for active */
                        border-color: #000 !important;
                        color: #fff !important;
                        /* white text for active */
                    }

                    .pagination .page-link:hover {
                        background-color: #333 !important;
                        color: #fff !important;
                    }
                </style>

                {{ $orders->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
@endsection
