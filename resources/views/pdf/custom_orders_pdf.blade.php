<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order #{{ $singleOrder->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.4;
            margin: 20px;
        }

        h1,
        h2,
        h3,
        h4 {
            margin: 5px 0;
            text-align: center;
            color: #1a1a1a;
        }

        h1 {
            font-size: 24px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 16px;
            margin-top: 20px;
        }

        h4 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        /* HEADER */
        .order-header {
            border: 2px solid #1a73e8;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            background-color: #f0f4ff;
        }

        .order-header p {
            margin: 5px 0;
            font-size: 12px;
        }

        .total-amount {
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
            text-align: right;
            color: #1a73e8;
        }

        /* UNIFORM CARD */
        .uniform-card {
            border: 1px solid #ccc;
            border-left: 5px solid #1a73e8;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .uniform-card h4 {
            margin-bottom: 10px;
            color: #1a73e8;
            font-size: 14px;
        }

        /* Horizontal Product Details */
        .product-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 10px;
        }

        .product-details p {
            margin: 0;
            font-size: 12px;
            flex: 1 1 150px;
            /* min width for each detail */
        }

        /* PLAYERS TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 11px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #1a73e8;
            color: #fff;
            font-weight: bold;
            padding: 6px;
            text-align: center;
        }

        td {
            padding: 5px;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            background-color: #e8f0fe;
            padding: 5px;
            margin: 12px 0 5px 0;
            border-left: 4px solid #1a73e8;
        }

        .footer {
            text-align: center;
            font-size: 11px;
            color: #777;
            margin-top: 30px;
        }

        @media print {
            body {
                margin: 0;
            }

            .order-header,
            .uniform-card {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <h1>Custom Uniform Order</h1>
    <h2>Order #{{ $singleOrder->id }}</h2>

    <div class="order-header">
        <p><strong>Created:</strong> {{ $singleOrder->created_at->format('M d, Y') }}</p>
        <p><strong>Customer:</strong> {{ $singleOrder->first_name }} {{ $singleOrder->last_name }}</p>
        <p><strong>Email:</strong> {{ $singleOrder->email }} | <strong>Phone:</strong> {{ $singleOrder->phone }}</p>
        <p><strong>Address:</strong> {{ $singleOrder->address }}, {{ $singleOrder->city }}, {{ $singleOrder->state }},
            {{ $singleOrder->zip_code }}, {{ $singleOrder->country }}</p>
        <p><strong>Account Holder:</strong> {{ $singleOrder->account_holder_name }}</p>
        <p class="total-amount">Total Amount: ${{ number_format($singleOrder->amount, 2) }}</p>
    </div>

    <h3>Custom Products</h3>

    @foreach ($customUniforms as $uniform)
        <div class="uniform-card"
            style="overflow:auto; margin-bottom:20px; border:1px solid #ccc; padding:12px; border-radius:6px; background:#f9f9f9;">
            <h4 style="color:#1a73e8;">Product #{{ $loop->iteration }}</h4>

            {{-- Images Row (Design + Logo + Pattern) --}}
<table style="width:100%; text-align:center; margin:10px 0; border-collapse:collapse;">
    <tr>
        <td style="width:33%;">
            <h6 style="font-size:12px; margin-bottom:5px;">Design</h6>
            @if (!empty($productBase64))
                <img src="{{ $productBase64 }}" width="120" height="120"
                    style="border:1px solid #ccc; border-radius:6px; object-fit:cover;">
            @else
                <div style="width:120px; height:120px; border:1px solid #ccc; line-height:120px;">No Design</div>
            @endif
        </td>

        <td style="width:33%;">
            <h6 style="font-size:12px; margin-bottom:5px;">Logo</h6>
            @if (!empty($logoBase64))
                <img src="{{ $logoBase64 }}" width="120" height="120"
                    style="border:1px solid #ccc; border-radius:6px; object-fit:cover;">
            @else
                <div style="width:120px; height:120px; border:1px solid #ccc; line-height:120px;">No Logo</div>
            @endif
        </td>

        <td style="width:33%;">
            <h6 style="font-size:12px; margin-bottom:5px;">Pattern</h6>
            @if (!empty($patternBase64))
                <img src="{{ $patternBase64 }}" width="120" height="120"
                    style="border:1px solid #ccc; border-radius:6px; object-fit:cover;">
            @else
                <div style="width:120px; height:120px; border:1px solid #ccc; line-height:120px;">No Pattern</div>
            @endif
        </td>
    </tr>
</table>



            {{-- Product details --}}
            <div>
                <p><strong>Fit Type:</strong> {{ ucfirst($uniform->fit_type) }}</p>
                <p><strong>Kit Type:</strong> {{ ucfirst($uniform->kit_type) }}</p>
                <p><strong>Collar Type:</strong> {{ ucfirst($uniform->collar_type) }}</p>
                <p><strong>Team Logo:</strong> {{ $uniform->team_logo }}</p>
                <p><strong>Outfield Socks:</strong> {{ ucfirst($uniform->outfield_players_socks) }}</p>
                <p><strong>Inside Collar:</strong> {{ ucfirst($uniform->inside_shirt_collar) }}</p>
                <p><strong>Padded:</strong> {{ ucfirst($uniform->padded ?? 'N/A') }}</p>
                <p><strong>Sleeves:</strong> {{ ucfirst($uniform->sleeves_length) }}</p>
            </div>

            <div style="clear:both;"></div>

            {{-- Players Table --}}
            @php $players = json_decode($uniform->bulk_data, true); @endphp
            @if (!empty($players))
                <div class="section-title"
                    style="font-weight:bold; background:#e8f0fe; padding:5px; margin:12px 0 5px 0; border-left:4px solid #1a73e8;">
                    Players Information
                </div>
                <table style="width:100%; border-collapse:collapse; font-size:11px; margin-top:10px;">
                    <thead>
                        <tr style="background:#1a73e8; color:#fff;">
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
            @endif
        </div>
    @endforeach



    <div class="footer">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </div>

</body>

</html>
