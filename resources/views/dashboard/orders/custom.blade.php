@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>Custom Orders</h1>
        <p>Review all recent custom uniform orders</p>

        @php
            $isPDF = isset($singleOrder); // true if PDF view
            $customOrders = $isPDF ? collect([$singleOrder]) : $customOrders;
        @endphp

        <div class="orders-wrapper mt-5">
            @forelse ($customOrders as $order)
                <div class="order-card mb-5 p-4 border rounded-3 shadow-sm bg-white">

                    {{-- ===== ORDER HEADER ===== --}}
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                        <h4 class="fw-bold text-primary mb-0">
                            <i class="fas fa-shopping-bag me-1"></i> Order #{{ $order->id }}
                        </h4>
                        <span class="text-muted small">
                            {{ $order->created_at ? $order->created_at->format('M d, Y') : '-' }}
                        </span>
                    </div>

                    {{-- ===== ORDER DETAILS ===== --}}
                    <div class="row g-3">
                        <div class="col-md-6"><strong>First Name:</strong> {{ $order->first_name }}</div>
                        <div class="col-md-6"><strong>Last Name:</strong> {{ $order->last_name }}</div>
                        <div class="col-md-6"><strong>Email:</strong> {{ $order->email }}</div>
                        <div class="col-md-6"><strong>Phone:</strong> {{ $order->phone }}</div>
                        <div class="col-md-6"><strong>Country:</strong> {{ $order->country }}</div>
                        <div class="col-md-6"><strong>City:</strong> {{ $order->city }}</div>
                        <div class="col-md-6"><strong>State:</strong> {{ $order->state }}</div>
                        <div class="col-md-6"><strong>ZIP Code:</strong> {{ $order->zip_code }}</div>
                        <div class="col-md-6"><strong>Address:</strong> {{ $order->address }}</div>
                        <div class="col-md-6"><strong>Account Holder:</strong> {{ $order->account_holder_name }}</div>
                        <div class="col-md-6"><strong>Total Amount:</strong> ${{ number_format($order->amount, 2) }}</div>
                    </div>

                    {{-- ===== CUSTOM UNIFORMS SECTION ===== --}}
                    <div class="mt-5">
                        <h4 class="fw-bold border-bottom pb-2 mb-3 text-secondary">
                            <i class="fas fa-tshirt me-1"></i> Custom Products for this Order
                        </h4>

                        @forelse ($order->uniforms as $index => $customUniform)
                            <div class="uniform-card border-start border-4 border-primary p-4 rounded-3 mb-4 bg-light">
                                <h5 class="fw-bold text-primary mb-3">
                                    Product #{{ $index + 1 }}
                                </h5>

                                {{-- PRODUCT DETAILS --}}
                                <div class="row g-3">
                                    <div class="col-md-6"><strong>Fit Type:</strong>
                                        {{ ucfirst($customUniform->fit_type) }}</div>
                                    <div class="col-md-6"><strong>Kit Type:</strong>
                                        {{ ucfirst($customUniform->kit_type) }}</div>
                                    <div class="col-md-6"><strong>Collar Type:</strong>
                                        {{ ucfirst($customUniform->collar_type) }}</div>
                                    <div class="col-md-6"><strong>Team Logo:</strong>
                                        {{ ucfirst($customUniform->team_logo) }}</div>
                                    <div class="col-md-6"><strong>Outfield Players Socks:</strong>
                                        {{ ucfirst($customUniform->outfield_players_socks) }}</div>
                                    <div class="col-md-6"><strong>Inside Shirt Collar:</strong>
                                        {{ ucfirst($customUniform->inside_shirt_collar) }}</div>
                                    <div class="col-md-6"><strong>Padded:</strong>
                                        {{ ucfirst($customUniform->padded ?? 'N/A') }}</div>
                                    <div class="col-md-6"><strong>Sleeves Length:</strong>
                                        {{ ucfirst($customUniform->sleeves_length) }}</div>
                                </div>
                                <div>
                                    @if (!empty($customUniform->image) && file_exists(public_path('images/base64/logos/' . basename($customUniform->image))))
                                        @php
                                            $imageUrl = asset('images/base64/logos/' . basename($customUniform->image));
                                        @endphp

                                        <img src="{{ $imageUrl }}" alt="Logo" width="100" height="100"
                                            class="rounded border me-3">

                                        {{-- Download button --}}
                                        <div style="margin-top:5px;">
                                            <a href="{{ $imageUrl }}"
                                                download="{{ $customUniform->team_logo ?? 'logo' }}.png"
                                                class="btn btn-sm btn-primary">
                                                Download Design
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded p-3 text-center" style="width:100px;height:100px;">
                                            No Logo
                                        </div>
                                    @endif
                                </div>

                                {{-- PLAYERS (bulk_data) --}}
                                @php
                                    $players = json_decode($customUniform->bulk_data, true);
                                @endphp

                                @if (!empty($players))
                                    <div class="mt-4">
                                        <h5 class="fw-bold text-secondary">Players Information</h5>
                                        <table class="table table-bordered table-sm align-middle mt-2">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Shirt Size</th>
                                                    <th>Short Size</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($players as $i => $player)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $player['name'] ?? '-' }}</td>
                                                        <td>{{ $player['number'] ?? '-' }}</td>
                                                        <td>{{ strtoupper($player['shirt_size'] ?? '-') }}</td>
                                                        <td>{{ strtoupper($player['short_size'] ?? '-') }}</td>
                                                        <td>{{ $player['quantity'] ?? '-' }}</td>
                                                        <td>${{ number_format($player['price'] ?? 0, 2) }}</td>
                                                        <td>${{ number_format($player['total'] ?? 0, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-center text-muted fst-italic">
                                No custom uniforms found for this order.
                            </div>
                        @endforelse
                    </div>

                    {{-- DOWNLOAD PDF BUTTON (only dashboard) --}}
                    {{-- DOWNLOAD PDF + PATTERN & LOGO SECTION (only if product exists) --}}
                    @if (!$isPDF && $order->uniforms->isNotEmpty())
                        <div class="container mt-4">

                            {{-- Row 1: Pattern & Logo --}}
                            <div class="row justify-content-center text-center g-5 mb-4">
                                @foreach ($order->uniforms as $customUniform)
                                    {{-- Pattern Column --}}
                                    <div class="col-md-4">
                                        <h6 class="mb-2 fw-semibold text-secondary">Pattern</h6>
                                        @php
                                            $patternPath = public_path('custom/pattern/' . $customUniform->pattern);
                                            $patternUrl = asset('custom/pattern/' . $customUniform->pattern);
                                        @endphp

                                        @if (!empty($customUniform->pattern) && file_exists($patternPath))
                                            <img src="{{ $patternUrl }}" alt="Pattern" width="140" height="140"
                                                class="rounded border shadow-sm mb-2">
                                            <div>
                                                <a href="{{ $patternUrl }}" download="pattern.png"
                                                    class="btn btn-sm btn-primary px-3">
                                                    Download Pattern
                                                </a>
                                            </div>
                                        @else
                                            <div class="border rounded p-3 d-flex align-items-center justify-content-center"
                                                style="width:140px;height:140px;margin:auto;">
                                                No Pattern
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Logo Column --}}
                                    <div class="col-md-4">
                                        <h6 class="mb-2 fw-semibold text-secondary">Logo</h6>
                                        @php
                                            $logoFile = basename($customUniform->logo);
                                            $logoPath = public_path('custom/logo/' . $logoFile);
                                            $logoUrl = asset('custom/logo/' . $logoFile);
                                        @endphp

                                        @if (!empty($logoFile) && file_exists($logoPath))
                                            <img src="{{ $logoUrl }}" alt="Logo" width="140" height="140"
                                                class="rounded border shadow-sm mb-2">
                                            <div>
                                                <a href="{{ $logoUrl }}" download="{{ $logoFile }}"
                                                    class="btn btn-sm btn-primary px-3">
                                                    Download Logo
                                                </a>
                                            </div>
                                        @else
                                            <div class="border rounded p-3 d-flex align-items-center justify-content-center"
                                                style="width:140px;height:140px;margin:auto;">
                                                No Logo
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            {{-- Row 2: PDF Download Button --}}
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="{{ route('custom-order.download.pdf', ['order_id' => $order->id]) }}"
                                        class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-file-pdf me-1"></i> Download Full Order PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            @empty
                <div class="text-center text-danger fw-bold p-4 border rounded-3 bg-white shadow-sm">
                    <i class="fas fa-exclamation-circle me-2"></i> No custom orders found.
                </div>
            @endforelse
        </div>

        {{-- Pagination (only dashboard) --}}
        @if (!$isPDF)
            <div class="d-flex justify-content-center mt-3" style="font-weight:bold; color:#000;">
                {{ $customOrders->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
