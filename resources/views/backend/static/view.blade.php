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
                        <table class="table table-bordered table-striped team-roster-table" id="playersTable"
                            style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Fit Type</th>
                                    <th>Kit Type</th>
                                    <th>Sleeves</th>
                                    <th>Player Name</th>
                                    <th>Number</th>
                                    <th>Price</th>
                                    <th>Goalkeeper Kit</th>
                                    <th>Staff Option</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($soccer as $index => $item)
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
                                        <td>{{ ucfirst($item['fit_type']) }}</td>
                                        <td>{{ ucfirst($item['kit_type']) }}</td>
                                        <td>{{ ucfirst($item['sleeves_length']) }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['number'] }}</td>

                                       <td><strong>${{ number_format(($item['total'] ?? 0) + ($item['guide_total'] ?? 0), 2) }}</strong>
                                        </td>

                                        <td>{{ ucfirst($item['goalkeeper_kit']) }}</td>
                                        <td>{{ ucfirst($item['staff_other']) }}</td>
                                        <td>{{ !empty($item['created_at']) ? \Carbon\Carbon::parse($item['created_at'])->format('d M Y') : '--' }}
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

                                        <td>
                                            <form action="{{ route('static.cart.clear') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button type="submit"
                                                    style="background:black;color:white;border:none;padding:6px 14px;border-radius:5px;cursor:pointer;"
                                                    class="btn btn-sm btn-warning">
                                                    Clear Cart
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
                        </table>

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
