@extends('layout.master')

@push('plugin-styles')
@endpush
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

    .profile-avatar-container {
        position: relative;
        display: inline-block;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid green;
        position: relative;
    }

    .glow-ring {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 2px solid transparent;
        box-shadow: 0 0 10px 5px #38caef;
        animation: glow 2s infinite alternate;
    }

    @keyframes glow {
        0% {
            box-shadow: 0 0 10px 5px #FF1E1E;
        }

        100% {
            box-shadow: 0 0 20px 10px #38caef;
        }
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
        margin-left: 15%;
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

    .form__group {
        position: relative;
        padding: 20px 0 0;
        width: 100%;
        max-width: 180px;
    }

    .form__field {
        font-family: inherit;
        width: 100%;
        border: none;
        border-bottom: 2px solid #9b9b9b;
        outline: 0;
        font-size: 17px;
        color: black;
        padding: 7px 0;
        background: transparent;
        transition: border-color 0.2s;
    }

    .form__field::placeholder {
        color: transparent;
    }

    .form__field:placeholder-shown~.form__label {
        font-size: 17px;
        cursor: text;
        top: 20px;
    }

    .form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: 17px;
        color: #D6DAC8;
        pointer-events: none;
    }

    .form__field:focus {
        padding-bottom: 6px;
        font-weight: 700;
        border-width: 3px;
        border-image: linear-gradient(to right, #116399, #38caef);
        border-image-slice: 1;
    }

    .form__field:focus~.form__label {
        position: absolute;
        top: 0;
        display: block;
        transition: 0.2s;
        font-size: 17px;
        color: #38caef;
        font-weight: 700;
    }

    /* reset input */
    .form__field:required,
    .form__field:invalid {
        box-shadow: none;
    }
</style>
@section('content')



@if(Auth::check())
<form method="POST" id="profileForm" action="{{ route('updateProfile') }}">
    {{ csrf_field() }}
    <div class="tab-content active" id="tabContent1">
        <div class="card profile-card">
            <div class="card-body">
                <div class="profile-header">
                    <div class="profile-avatar-container">
                        <div class="profile-avatar">
                            <div class="glow-ring"></div>
                            <img src="https://img.freepik.com/premium-photo/illustration-cute-boy-avatar-graphic-white-background-created-with-generative-ai-technology_67092-4584.jpg" alt="User Avatar" class="profile-avatar">
                        </div>
                    </div>
                    <h5 class="profile-name">{{ Auth::user()->name }}</h5>
                    <p style="height: 1px;background: green;width: 70px;border-radius: 3px;margin-left: 46%;margin-top: -5px;"></p>
                    <p class="profile-email">{{ Auth::user()->shop }}</p>
                    <hr>
                </div>
                <div class="profile-details">
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Name" name="username" id="inputUsername" name="username" value="{{ Auth::user()->username }}" style="width: 140%;">
                                <label for="name" class="form__label" style="">Username :</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="email" class="form__field" placeholder="Name" name="email" id="inputUsername" value="{{ Auth::user()->email }}" style="width: 138%;">
                                <label for="name" class="form__label" style="">Email :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="password" class="form__field" placeholder="Password" name="password" id="inputUsername" value="" style="width: 140%;">
                                <label for="name" class="form__label" style="">Password :</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="password" class="form__field" placeholder="Confirm Password" id="inputUsername" value="" style="width: 138%;">
                                <label for="name" class="form__label">Confirm Password :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="display: none;">
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="text" class="form__field" placeholder="Name" required="" name="name" value="{{ Auth::user()->name }}" style="width: 140%;">
                                <label for="name" class="form__label" style="">Username :</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Address" name="address" id="inputUsername" value="{{ Auth::user()->address }}" style="width: 140%;">
                                <label for="name" class="form__label">Address :</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form__group field">
                                <input type="input" class="form__field" placeholder="Phone" name="phone" id="inputUsername" value="{{ Auth::user()->phone }}" style="width: 140%;">
                                <label for="name" class="form__label">Mobile :</label>
                            </div>
                        </div>
                    </div>
                    <!-- Add more fields here -->
                </div>
                <div class="profile-actions">
                    <button class="btn btn-success btn-save">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@else
{{ redirect('/') }}
@endif
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush
<script>
    $(document).ready(function() {
        $('#inputConfirmPassword').on('keyup', function() {
            var newPassword = $('#inputNewPassword').val();
            var confirmPassword = $(this).val();

            if (newPassword === confirmPassword) {
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            } else {
                $(this).removeClass('is-valid');
                $(this).addClass('is-invalid');
            }
        });
    });
</script>

@push('custom-scripts')

@endpush