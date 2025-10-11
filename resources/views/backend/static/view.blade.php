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
                        <a href="{{ route('static.index') }}"
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
                                    <th>Fit Type</th>
                                    <th>Kit Type</th>
                                    <th>Sleeves</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($soccerCart as $index => $item)
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
                                        <td>
                                            @if (is_array($item['name']))
                                                {{ implode(', ', $item['name']) }}
                                            @else
                                                {{ $item['name'] ?? 'N/A' }}
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($item['fit_type']) }}</td>
                                        <td>{{ ucfirst($item['kit_type']) }}</td>
                                        <td>{{ ucfirst($item['sleeves_length']) }}</td>
                                        <td><strong>${{ $item['grand_total'] ?? 0 }}</strong></td>
                                        <td>
                                            {{ !empty($item['created_at']) ? \Carbon\Carbon::parse($item['created_at'])->format('d M Y') : '--' }}
                                        </td>
                                        <td>
                                            <form action="{{ route('static.cart.remove', $index) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="background:black;color:white;border:none;padding:6px 14px;border-radius:5px;cursor:pointer;">
                                                    Remove Item
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" class="text-center">No cart items found.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            {{-- ✅ GRAND TOTAL from Session --}}
                            {{-- ✅ GRAND TOTAL from Session --}}
                            @if (!empty($soccerCart) && count($soccerCart) > 0)
                                @php
                                    $grandSum = 0;
                                    foreach ($soccerCart as $item) {
                                        $grandSum += floatval($item['grand_total'] ?? 0);
                                    }

                                    // ✅ Grand total ko session me store karo
                                    session(['checkout_grand_total' => $grandSum]);
                                @endphp
                                <tfoot>
                                    <tr style="background-color: #000; color: #fff; font-weight: bold;">
                                        <td colspan="6" class="text-end" style="padding: 12px; font-size: 16px;">
                                            Overall Grand Total:
                                        </td>
                                        <td colspan="3" style="padding: 12px; font-size: 16px;">
                                            ${{ number_format($grandSum, 2) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif

                        </table>

                        <div class="d-flex justify-content-center" style="padding-top: 10px">
                            {{-- {{ $soccerCart->links() }} --}}
                        </div>
                        <div style="padding-top: 10px;">
                            <form action="{{ route('static.cart.clear') }}" method="POST" style="display:inline;">
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



                        {{-- ✅ Grand Total --}}
                        {{-- <div id="grandTotal" style="text-align:center; font-size:20px; font-weight:bold;">
                            0
                        </div> --}}
                    </div>

                </div>

                <!-- ✅ Checkout Button -->
                <!-- ✅ Checkout Button - Properly Centered -->
                <div style="display: flex; justify-content: center; padding-bottom: 50px; padding-top: 50px;">
                    <a href="{{ route('order.create') }}" class="addtocart_btn">
                        Proceed to Checkout
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
