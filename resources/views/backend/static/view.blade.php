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
                    <table class="table table-bordered table-striped team-roster-table" id="playersTable" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Fit Type</th>
                                <th>Kit Type</th>
                                <th>Team Logo</th>
                                <th>Sleeves</th>
                                <th>Player Name</th>
                                <th>Number</th>
                                <th>Qty</th>
                                <th>Goalkeeper Kit</th>
                                <th>Staff Option</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($soccer as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucfirst($item->fit_type) }}</td>
                                    <td>{{ ucfirst($item->kit_type) }}</td>
                                    <td>{{ ucfirst($item->team_logo) }}</td>
                                    <td>{{ ucfirst($item->sleeves_length) }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ ucfirst($item->goalkeeper_kit) }}</td>
                                    <td>{{ ucfirst($item->staff_other) }}</td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No cart items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
