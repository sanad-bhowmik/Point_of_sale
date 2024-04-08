@extends('layout.master')

@push('plugin-styles')
@endpush
<style>
    #permission {
        background-color: white;
        height: 86%;
        width: 100%;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    }

    #icon {
        height: 16px;
        width: 16px;
    }

    .ui-btn {
        --btn-default-bg: rgb(41, 41, 41);
        --btn-padding: 6px 11px;
        --btn-hover-bg: rgb(51, 51, 51);
        --btn-transition: .3s;
        --btn-letter-spacing: .1rem;
        --btn-animation-duration: 1.2s;
        --btn-shadow-color: rgba(0, 0, 0, 0.137);
        --btn-shadow: 0 2px 10px 0 var(--btn-shadow-color);
        --hover-btn-color: #FAC921;
        --default-btn-color: #fff;
        --font-size: 16px;
        --font-weight: 600;
        --font-family: Menlo, Roboto Mono, monospace;
    }


    .ui-btn {
        box-sizing: border-box;
        padding: var(--btn-padding);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--default-btn-color);
        font: var(--font-weight) var(--font-size) var(--font-family);
        background: var(--btn-default-bg);
        border: none;
        cursor: pointer;
        transition: var(--btn-transition);
        overflow: hidden;
        box-shadow: var(--btn-shadow);
    }

    .ui-btn span {
        letter-spacing: var(--btn-letter-spacing);
        transition: var(--btn-transition);
        box-sizing: border-box;
        position: relative;
        background: inherit;
    }

    .ui-btn span::before {
        box-sizing: border-box;
        position: absolute;
        content: "";
        background: inherit;
    }

    .ui-btn:hover,
    .ui-btn:focus {
        background: var(--btn-hover-bg);
    }

    .ui-btn:hover span,
    .ui-btn:focus span {
        color: var(--hover-btn-color);
    }

    .ui-btn:hover span::before,
    .ui-btn:focus span::before {
        animation: chitchat linear both var(--btn-animation-duration);
    }

    @keyframes chitchat {
        0% {
            content: "#";
        }

        5% {
            content: ".";
        }

        10% {
            content: "^{";
        }

        15% {
            content: "-!";
        }

        20% {
            content: "#$_";
        }

        25% {
            content: "№:0";
        }

        30% {
            content: "#{+.";
        }

        35% {
            content: "@}-?";
        }

        40% {
            content: "?{4@%";
        }

        45% {
            content: "=.,^!";
        }

        50% {
            content: "?2@%";
        }

        55% {
            content: "\;1}]";
        }

        60% {
            content: "?{%:%";
            right: 0;
        }

        65% {
            content: "|{f[4";
            right: 0;
        }

        70% {
            content: "{4%0%";
            right: 0;
        }

        75% {
            content: "'1_0<";
            right: 0;
        }

        80% {
            content: "{0%";
            right: 0;
        }

        85% {
            content: "]>'";
            right: 0;
        }

        90% {
            content: "4";
            right: 0;
        }

        95% {
            content: "2";
            right: 0;
        }

        100% {
            content: "";
            right: 0;
        }
    }

    #currentRole {
        text-align: center;
        color: lightgray;
    }

    .container {
        --input-focus: #2d8cf0;
        --input-out-of-focus: #ccc;
        --bg-color: #fff;
        --bg-color-alt: #666;
        --main-color: #323232;
        position: relative;
        cursor: pointer;
    }

    .container input {
        position: absolute;
        opacity: 0;
    }

    .checkmark {
        width: 23px;
        height: 21px;
        position: relative;
        top: 0;
        left: 0;
        border: 2px solid var(--main-color);
        border-radius: 5px;
        background-color: #FF204E;
        transition: all 0.3s;
    }

    .container input:checked~.checkmark {
        background-color: #03C988;
    }

    .checkmark:after {
        content: "";
        width: 5px;
        height: 10px;
        position: absolute;
        top: 2px;
        left: 8px;
        display: none;
        border: solid var(--bg-color);
        border-width: 0 2.5px 2.5px 0;
        transform: rotate(45deg);
    }

    .container input:checked~.checkmark:after {
        display: block;
    }
</style>

@section('content')

<section id="permission">
    <h1 style="font-family: Quicksand; text-align: center; padding: 11px; text-decoration-line: underline; background-image: linear-gradient(to right, hsla(217, 100%, 50%, 1), hsla(186, 100%, 69%, 1)); -webkit-background-clip: text; background-clip: text; color: transparent;">Permission's</h1>

    <div style=" background-color: #FEFBF6;padding: 1px;">
        <div style="display: flex;margin-left: 20%;margin-top: 33px;margin-bottom: 20px;gap: 70px;">
            <div>
                <label for="user">Users: </label>
                <select name="users" id="users" style="padding: 3px;border: 1px solid lightgray;">
                    <option value="role1" selected>Selete One</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="role">Roles: </label>
                <select name="roles" id="roles" style="padding: 3px;border: 1px solid lightgray;">
                    <option value="role1" selected>Selete One</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- <button id="saveBtn">Save</button> -->
            <button class="ui-btn" id="saveBtn">
                <span>
                    Save
                </span>
            </button>
        </div>
        <div id="currentRole"></div>
    </div>



    <div style="padding: 10px;">
        <div class="">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Admin</th>
                            <th>Purchase</th>
                            <th>Sales</th>
                            <th>Stock</th>
                            <th>Account</th>
                            <th>Payment</th>
                            <th>Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-1" style="font-size: large;font-weight: 300;">
                                Admin
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1" style="font-size: large;font-weight: 300;">
                                Shop Owner
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1" style="font-size: large;font-weight: 300;">
                                Shop Worker
                            </td>
                            <td>
                                <label class="container">
                                    <input type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                            <td>
                                <label class="container">
                                    <input checked="checked" type="checkbox">
                                    <div class="checkmark"></div>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/dashboard.js') !!}
@endpush

@push('custom-scripts')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('saveBtn').addEventListener('click', function() {
            var userId = document.getElementById('users').value;
            var roleId = document.getElementById('roles').value;

            // Send AJAX request to update user role
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/updateUserRole');

            // Include CSRF token in the request headers
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // If update is successful, show alert and reload the page
                    alert('User role updated successfully');
                    location.reload();
                } else {
                    alert('Error updating user role');
                }
            };

            xhr.send(JSON.stringify({
                userId: userId,
                roleId: roleId
            }));
        });

        document.getElementById('users').addEventListener('change', function() {
            var userId = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/getUserRole/' + userId);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('currentRole').textContent = 'Current Role: ' + xhr.responseText;
                } else {
                    alert('Error fetching current role');
                }
            };
            xhr.send();
        });
    });
</script>


@endpush