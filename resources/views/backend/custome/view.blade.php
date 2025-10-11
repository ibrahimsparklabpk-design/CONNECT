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

                        <table class="table table-bordered table-striped team-roster-table" id="playersTable"
                            style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Player Name</th>
                                    <th>Kit Type</th>
                                    <th>Team Logo</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Remove Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp
                                @forelse ($sessionCart as $index => $item)
                                    @php
                                        // Agar bulk_data exist kare, playerPrice calculate karo
                                        $playerPrice = 0;
                                        if (!empty($item['bulk_data']) && is_array($item['bulk_data'])) {
                                            foreach ($item['bulk_data'] as $player) {
                                                $playerPrice += floatval($player['total'] ?? 0);
                                            }
                                        }

                                        // Agar item me grand_total exist kare, use karo
                                        $grandTotalItem = isset($item['grand_total'])
                                            ? floatval($item['grand_total'])
                                            : $playerPrice;
                                        $totalPrice += $grandTotalItem;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if (!empty($item['image']))
                                                <img src="{{ asset($item['image']) }}" width="50" alt="Uniform Image"
                                                    onerror="this.src='{{ asset('images/no-image.png') }}'">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $item['name'] ?? 'N/A' }}</td>
                                        <td>{{ ucfirst($item['kit_type']) }}</td>
                                        <td>{{ ucfirst($item['team_logo']) }}</td>
                                        <td>{{ isset($item['sleeves_length']) ? ucfirst($item['sleeves_length']) : 'N/A' }}</td>
                                        <!-- Use grand_total if available -->
                                        <td>
                                            {{ isset($item['created_at']) ? \Carbon\Carbon::parse($item['created_at'])->format('d M Y') : '--' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('custome.destroy', $index) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Remove Item</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No cart items found.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tfoot>
                                <tr style="background-color: #000; color: #fff; font-weight: bold;">
                                    <td colspan="7" class="text-end" style="padding: 12px; font-size: 16px;">
                                        Over All Grand Total:
                                    </td>
                                    <td colspan="3" style="padding: 12px; font-size: 16px;">
                                        ${{ number_format($totalPrice, 2) }}
                                    </td>
                                </tr>
                            </tfoot>

                        </table>
                        <div class="d-flex justify-content-center" style="padding-top: 10px">
                            {{ $customeUniform->links() }}
                        </div>

                        <form action="{{ route('custome.cart.clear') }}" method="POST" style="padding-top: 10px"
                            onsubmit="return confirm('Are you sure you want to clear the cart?');">
                            @csrf
                            <button type="submit"
                                style="
        background-color: #000;
        color: #fff;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    "
                                onmouseover="this.style.backgroundColor='#333'"
                                onmouseout="this.style.backgroundColor='#000'">
                                Clear Cart
                            </button>
                        </form>

                    </div>
                </div>

                <div style="display: flex; justify-content: center; padding-bottom: 50px; padding-top: 50px;">
                    <a href="{{ route('custom-order.create') }}" class="addtocart_btn">
                        Proceed to Checkout
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
