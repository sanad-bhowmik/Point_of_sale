@extends('layout.master')

@push('plugin-styles')
@endpush
<style>
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
    input[type="date"],
    input[type="number"] {
        /* width: 39%; */
        width: 100%;
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
        border-radius: 10px;
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
        background: url(https://wallpapercave.com/wp/wp8963675.jpg);
        background-repeat: no-repeat;
        height: 100%;
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
    <div class="tab active" id="tab1" onclick="switchTab(1)">Shop Payment</div>
    <div class="tab" id="tab2" onclick="switchTab(2)">Shop Payment List</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Shop Payment</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Payment</h4>
                <p style="height: 3px;background: #B885E7;width: 150px;top: -0.75rem;border-radius: 3px;margin-left: 0%;margin-top: -5px;"></p>
                <form id="bankForm" method="POST" action="{{ route('saveShopPayment') }}" style="padding-left: 10%;padding-right: 10%;">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fromDate">From :</label>
                            <br>
                            <input type="date" id="fromDate" name="fromDate" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="toDate">To :</label>
                            <br>
                            <input type="date" id="toDate" name="toDate" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="monthNo">Month Number:</label>
                            <br>
                            <input type="number" id="monthNo" name="monthNo" style="background-color: #fcffb3;" required>
                        </div>
                    </div>

                    <div class="form-row" style="margin-top: 45px;">
                        <div class="form-group col-md-4">
                            <label for="remarks">Remarks:</label>
                            <br>
                            <input type="text" id="remarks" name="remarks" placeholder="Enter remarks" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="transactionID">Transaction ID:</label>
                            <br>
                            <input type="text" id="transactionID" name="transactionID" style="background-color: #fcffb3;" placeholder="Enter transaction ID" required>
                        </div>

                        <div class="form-group col-md-4" style="margin-top: 20px;">
                            <p>Monthly Fee: <span id="monthlyFeePlaceholder">350</span></p>
                            <p>Total Fee: <span id="totalFeePlaceholder" style="background-color: #f6ff99;padding: 5px;border-radius: 5px;font-weight: 900;">350</span></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<div class="tab-content" id="tabContent2">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Shop Payment List</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Shop Payment List</h4>
                <p style="height: 3px;background: #B885E7;width: 150px;top: -0.75rem;border-radius: 3px;margin-left: 0%;margin-top: -5px;"></p>

                <div class="table-responsive">
                    <table id="invoiceTable" class="table table-dark">
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>StatusPayment</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Monthly Fee</th>
                                <th>Total</th>
                                <th>Transaction ID</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shopPayments as $payment)
                            <tr>
                                <td>{{ $payment->sl_no }}</td>
                                <td style="background-color: {{ $payment->status_payment == 'Approved' ? '#28dd1e' : ($payment->status_payment == 'Pending' ? '#fabe28' : 
                                                ($payment->status_payment == 'Cancel' ? 'red' : 'inherit')) }};
                                          color: white;">
                                    {{ $payment->status_payment }}
                                </td>

                                <td>{{ $payment->date->format('Y-m-d') }}</td>
                                <td>{{ $payment->month }}</td>
                                <td>{{ $payment->monthly_fee }}</td>
                                <td>{{ $payment->total }}</td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>{{ $payment->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
</script>


@endpush