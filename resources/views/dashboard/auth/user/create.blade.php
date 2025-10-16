@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>
            Update Password
        </h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" style="margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-row">
                <div class="form-group">
                    <label for="current_password">Current Password*:</label>
                    <input type="password" id="current_password" required name="current_password">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">New Password*:</label>
                    <input type="password" id="password" required name="password">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password*:</label>
                    <input type="password" id="password_confirmation" required name="password_confirmation">
                </div>
            </div>

            <button class="form-btn">Update Password</button>
        </form>


    </div>
@endsection
