@extends('layout.master')

@push('plugin-styles')
@endpush

<style>
    #categoryFilter {
        height: 26px;
        margin-left: 14px;
        padding: 2px;
        font-family: math;
        border: 1px solid #cac0c0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
        width: 72%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        border-color: #007bff;
    }

    button {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button[type="submit"] {
        background-color: green;
        color: white;
    }

    button[type="submit"]:hover,
    button[type="button"]:hover {
        opacity: 0.8;
    }

    .form-group:focus-within label {
        transform: translateY(-25px);
        font-size: 12px;
        color: #007bff;
    }

    .tab-container {
        display: flex;
        width: 76vw;
        justify-content: center;
        gap: 0.3rem;
        border-bottom: 1px solid navy;
    }

    .tab {
        cursor: pointer;
        font-family: normal;
        font-style: normal;
        font-weight: 400;
        font-size: 121%;
        line-height: 28px;
        text-align: center;
        letter-spacing: -0.001em;
        padding: 0.5px 3vw;
        border-radius: 10px 10px 0px 0px;
        border: 1px solid navy;
        border-bottom-color: white;
        margin-bottom: -1px;

    }

    .tab.active {
        border-color: black;
        background-color: #1B1B1B;
        color: white;
    }

    .tab-content {
        display: none;
        padding: 10px;
        transition: opacity 0.3s ease-in-out;
        background: url(https://img.freepik.com/free-vector/minimalist-white-background-with-neumorphic-circle_1017-39167.jpg);
        background-repeat: no-repeat;
        height: 93%;
        margin-top: 15px;
        border-radius: 10px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }

    .tab-content.active {
        display: block;
        opacity: 1;
        /* Set opacity to 1 for active tab content */
    }

    .modern-table {
        overflow-x: auto;
    }

    .modern-table table {
        width: 100%;
        border-collapse: collapse;
    }

    .modern-table th,
    .modern-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .modern-table th {
        background-color: #f2f2f2;
    }

    .modern-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }



    @keyframes squeeze3124 {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }

        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
            transform: scale3d(1.25, 0.75, 1);
        }

        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
            transform: scale3d(0.75, 1.25, 1);
        }

        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
            transform: scale3d(1.15, 0.85, 1);
        }

        65% {
            -webkit-transform: scale3d(0.95, 1.05, 1);
            transform: scale3d(0.95, 1.05, 1);
        }

        75% {
            -webkit-transform: scale3d(1.05, 0.95, 1);
            transform: scale3d(1.05, 0.95, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
    }
</style>
@section('content')


<div class="tab-container">
    <div class="tab active" id="tab1" onclick="switchTab(1)">Add/Edit Shop User</div>
    <div class="tab" id="tab2" onclick="switchTab(2)">Shop User List</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 2%;">Add/Edit Shop User</h3>
    <p style="height: 3px;background: #0002A1;width: 56px;top: -0.75rem;border-radius: 3px;margin-left: 23%;margin-top: 4px;"></p>
    <form id="shopuserForm" method="post" action="{{ route('admin.seregistration') }}" style="padding-left: 10%;padding-right: 10%;">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: left;">
                <label for="shopName">Shop Name</label>
                <br>
                <input type="text" id="shopName" name="shop_name" placeholder="Enter Shop Name" required>
            </div>

            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: right;">
                <label for="fullName">Full Name</label>
                <br>
                <input type="text" id="fullName" name="full_name" placeholder="Enter Full Name" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: left;">
                <label for="userName">User Name</label>
                <br>
                <input type="text" id="userName" name="user_name" placeholder="Enter User Name" required>
            </div>

            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: right;">
                <label for="password">Password</label>
                <br>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: left;">
                <label for="confirmPassword">Confirm Password</label>
                <br>
                <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: right;">
                <label for="mobileNumber">Mobile Number</label>
                <br>
                <input type="tel" id="mobileNumber" name="mobile_number" placeholder="Enter Mobile Number" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: left;">
                <label for="alternativeMobile">Alternative Mobile Number</label>
                <br>
                <input type="tel" id="alternativeMobile" name="alternative_mobile" placeholder="Enter Alternative Mobile Number">
            </div>

            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: right;">
                <label for="emailAddress">E-mail Address</label>
                <br>
                <input type="email" id="emailAddress" name="email_address" placeholder="Enter E-mail Address" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: left;">
                <label for="nationalID">National ID NO</label>
                <br>
                <input type="text" id="nationalID" name="national_id" placeholder="Enter National ID NO" required>
            </div>

            <div class="form-group" style="margin-bottom: 2rem; width: 48%; float: right;">
                <label for="address">Address</label>
                <br>
                <input type="text" id="address" name="address" placeholder="Enter Address" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit">Save</button>
            <button type="button" onclick="cancelForm()" style="background-color: #c62828;">Cancel</button>
        </div>
    </form>
</div>

<div class="tab-content" id="tabContent2">
    <div class="modern-table" style="margin-top: 20px;border: 1px solid;">
        <table id="userTable">
            <thead>
                <tr>
                    <th>Shop Name</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->shop }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img src="{{ url('assets/images/edit.png') }}" alt="Edit" style="margin-right: 10px;">
                        <img src="{{ url('assets/images/trash.png') }}" alt="Delete">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

<script>
    function switchTab(tabNumber) {
        var tabContents = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabContents.length; i++) {
            tabContents[i].classList.remove("active");
        }

        var selectedTabContent = document.getElementById("tabContent" + tabNumber);
        selectedTabContent.classList.add("active");

        var tabs = document.getElementsByClassName("tab");
        for (var j = 0; j < tabs.length; j++) {
            tabs[j].classList.remove("active");
        }

        var selectedTab = document.getElementById("tab" + tabNumber);
        selectedTab.classList.add("active");

        if (tabNumber === 2) {
            fetchCategoryData();
        }
    }

    $(document).ready(function() {
        // AJAX request to fetch user data
        $.ajax({
            url: "{{ route('admin.seregistration') }}",
            type: "GET",
            dataType: "html",
            success: function(data) {
                $('#userTable tbody').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>