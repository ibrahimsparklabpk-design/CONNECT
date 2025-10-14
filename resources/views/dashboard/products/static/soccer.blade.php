@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>Static Products</h1>
        <p>Connecting you with Dominican Businesses Worldwide</p>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Player Name</th>
                        <th>Numbers</th>
                        <th>Qauntity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($soccers as $index => $order)
                        @php
                            $bulkData = json_decode($order->bulk_data, true);
                            $firstPlayer = $bulkData[0] ?? null;
                        @endphp
                        <tr>

                            <td>{{ $soccers->firstItem() + $index }}</td>
                            <td>
                                @if (!empty($order->image) && file_exists(public_path('selected-shirts/' . basename($order->image))))
                                    <img src="{{ asset('selected-shirts/' . basename($order->image)) }}" alt="Logo"
                                        width="80" height="80" class="rounded border">
                                @else
                                    No logo
                                @endif
                            </td>
                            <td>
                                {{ $firstPlayer['name'] ?? '-' }}
                            </td>
                            <td>
                                {{ $firstPlayer['number'] ?? '-' }}
                            </td>
                            <td>
                                {{ $firstPlayer['quantity'] ?? '-' }}
                            </td>
                            <td>
                                {{ !empty($firstPlayer['price']) ? $firstPlayer['price'] : 'Price Unavailable' }}
                            </td>
                            <td>
                                {{ !empty($firstPlayer['total']) ? $firstPlayer['total'] : 'Total Unavailable' }}
                            </td>

                            <td>{{ $order->created_at ? $order->created_at->format('M d, Y') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No custom product found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>



            {{-- ✅ Pagination links --}}
            <div class="d-flex justify-content-center mt-3" style="font-weight:bold; color:#000;">
                <style>
                    .pagination .page-link {
                        color: #000 !important;
                        font-weight: bold !important;
                        border: 1px solid #555 !important;
                    }

                    .pagination .page-item.active .page-link {
                        background-color: #000 !important;
                        border-color: #000 !important;
                        color: #fff !important;
                    }

                    .pagination .page-link:hover {
                        background-color: #333 !important;
                        color: #fff !important;
                    }
                </style>

                {{ $soccers->links('pagination::bootstrap-4') }}
            </div>


        </div>
    </div>
@endsection
