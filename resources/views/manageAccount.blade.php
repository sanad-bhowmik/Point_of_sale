@extends('layout.master')

@push('plugin-styles')
@endpush

<style>
    .profile-card {
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    }

    .profile-header {
        text-align: center;
        padding: 20px;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid green;
    }

    .profile-name {
        margin-top: 10px;
        font-size: 1.5rem;
        color: #333;
    }

    .profile-email {
        color: #777;
    }

    .profile-details {
        padding: 20px;
    }

    .profile-detail {
        margin-bottom: 15px;
    }

    .profile-detail label {
        font-weight: bold;
    }

    .profile-actions {
        text-align: center;
        margin-top: 20px;
    }

    .btn-edit,
    .btn-save,
    .btn-cancel {
        margin-right: 10px;
    }
</style>
@section('content')

<div class="tab-content active" id="tabContent1">
    <div class="card profile-card">
        <div class="card-body">
            <div class="profile-header">
                <img src="https://img.freepik.com/premium-photo/illustration-cute-boy-avatar-graphic-white-background-created-with-generative-ai-technology_67092-4584.jpg" alt="User Avatar" class="profile-avatar">
                <h5 class="profile-name">{{ Auth::user()->name }}</h5>
                <p class="profile-email">{{ Auth::user()->email }}</p>
                <hr>
            </div>
            <div class="profile-details">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputUsername">Username:</label>
                            <input type="text" class="form-control" id="inputUsername" value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputEmail">Email:</label>
                            <input type="email" class="form-control" id="inputEmail" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputPassword">Password:</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Enter new password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputConfirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputAddress">Address:</label>
                            <input type="text" class="form-control" id="inputAddress" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-detail">
                            <label for="inputPhone">Phone:</label>
                            <input type="text" class="form-control" id="inputPhone" value="{{ Auth::user()->phone }}">
                        </div>
                    </div>
                </div>
                <!-- Add more fields here -->
            </div>
            <div class="profile-actions">
                <button class="btn btn-primary btn-edit">Edit Profile</button>
                <button class="btn btn-success btn-save d-none">Save</button>
                <button class="btn btn-secondary btn-cancel d-none">Cancel</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush

@push('custom-scripts')

@endpush