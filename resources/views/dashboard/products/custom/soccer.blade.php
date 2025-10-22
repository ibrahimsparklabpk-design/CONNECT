@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>Custom Products</h1>
        <p>Connecting you with Dominican Businesses Worldwide</p>

        <div class="orders-wrapper mt-4">

            @forelse($customUniform as $index => $order)
                @php
                    $bulkData = json_decode($order->bulk_data, true);
                @endphp

                <div class="order-card mb-4 p-3 border rounded shadow-sm bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-bold mb-0">#{{ $customUniform->firstItem() + $index }}</h5>
                        <span class="text-muted">
                            {{ $order->created_at ? $order->created_at->format('M d, Y') : '-' }}
                        </span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        @if (!empty($order->image))
                            <img src="{{ asset('images/base64/logos/' . basename($order->image)) }}" alt="Logo"
                                width="100" height="100" class="rounded border me-3">
                        @else
                            <div class="border rounded p-3 text-center" style="width:100px;height:100px;">No Logo</div>
                        @endif

                        <div>
                            {{-- <p class="mb-1"><strong>Product ID:</strong> {{ $order->id }}</p> --}}
                            <p class="mb-1"><strong>Products:</strong> {{ is_array($bulkData) ? count($bulkData) : 0 }}
                            </p>

                            @php
                                // ✅ Total quantity calculation
                                $totalQuantity = 0;
                                if (is_array($bulkData)) {
                                    foreach ($bulkData as $item) {
                                        $qty = isset($item['quantity']) ? (int) $item['quantity'] : 0;
                                        $totalQuantity += $qty;
                                    }
                                }
                            @endphp

                            <p class="mb-1"><strong>Quantities:</strong> {{ $totalQuantity }}</p>
                        </div>
                    </div>

                    {{-- Players Details --}}
                    @if (is_array($bulkData) && count($bulkData) > 0)
                        <div class="players-box border-top pt-3">
                            @foreach ($bulkData as $player)
                                <div class="player-row border p-2 mb-2 rounded bg-light">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Name:</strong> {{ $player['name'] ?? '-' }}</div>
                                        <div class="col-md-2"><strong>No:</strong> {{ $player['number'] ?? '-' }}</div>
                                        <div class="col-md-2"><strong>Qty:</strong> {{ $player['quantity'] ?? '-' }}</div>
                                        <div class="col-md-2"><strong>Price:</strong> {{ $player['price'] ?? '-' }}</div>
                                        <div class="col-md-3"><strong>Total:</strong> {{ $player['total'] ?? '-' }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-danger">Invalid or empty data.</p>
                    @endif
                </div>

            @empty
                <div class="text-center text-danger fw-bold p-4 border rounded bg-white">
                    No custom product found.
                </div>
            @endforelse

            {{-- ✅ Pagination --}}
            <div class="d-flex justify-content-center mt-3" style="font-weight:bold; color:#000;">
                {{ $customUniform->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
