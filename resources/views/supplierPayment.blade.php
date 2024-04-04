@extends('layout.master')

@push('plugin-styles')
@endpush
<style>
    .totals {
        display: flex;
        gap: 30px;
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
        font-size: 93%;
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
        background: hsla(248, 21%, 15%, 1);
background: linear-gradient(90deg, hsla(248, 21%, 15%, 1) 0%, hsla(250, 14%, 61%, 1) 100%);
background: -moz-linear-gradient(90deg, hsla(248, 21%, 15%, 1) 0%, hsla(250, 14%, 61%, 1) 100%);
background: -webkit-linear-gradient(90deg, hsla(248, 21%, 15%, 1) 0%, hsla(250, 14%, 61%, 1) 100%);
filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#211F2F", endColorstr="#918CA9", GradientType=1 );;
        color: white;
    }

    .tab-content {
        display: none;
        padding: 10px;
        transition: opacity 0.3s ease-in-out;
        background: url(https://wallpapercave.com/wp/wp8963675.jpg);
        background-repeat: no-repeat;
        height: 87%;
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

    .button {
        padding: 0.2rem 3rem;
        border: none;
        outline: none;
        font-size: 1.3rem;
        border-radius: 0.3rem;
        font-weight: 600;
        background-color: rgba(255, 255, 255, 0.953);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: 0.4s ease-in-out;
        border: 1px solid gray;
        margin-bottom: 16px;
    }

    .button .text {
        position: absolute;
        left: 1.2rem;
        top: 0.6rem;
        transition: 0.4s ease-in-out;
        color: rgb(50, 50, 50);
    }

    .svg {
        transform: translateY(-20px) rotate(30deg);
        opacity: 0;
        width: 2rem;
        transition: 0.4s ease-in-out;
    }

    .button:hover {
        background-color: rgb(50, 50, 50);
    }

    .button:hover .svg {
        display: inline-block;
        transform: translateY(0px) rotate(0deg);
        opacity: 1;
    }

    .button:hover .text {
        opacity: 0;
    }

    .button:active {
        scale: 0.97;
    }
</style>



@section('content')
<div class="tab-container">
    <div class="tab active" id="tab1" onclick="switchTab(1)">Pay Supplier</div>
    <div class="tab " id="tab2" onclick="switchTab(2)">Supplier Payment</div>
    <div class="tab " id="tab3" onclick="switchTab(3)">Deleted Payment History</div>
    <div class="tab " id="tab4" onclick="switchTab(4)">Supplier Due Report</div>
    <div class="tab " id="tab5" onclick="switchTab(5)">Supplier Transition</div>
</div>


<div class="tab-content active" id="tabContent1">
    <h1>hello2</h1>
</div>


<div class="tab-content" id="tabContent2">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Supplier Payment History</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>SI No</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Reference No</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplierPaymentHistory as $index => $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->toDateString() }}</td>
                                <td>{{ $payment->supplier }}</td>
                                <td>{{ $payment->reference_no }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->remarks }}</td>
                                <td>
                                    <form action="{{ route('supplierPayment.delete', $payment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?')">
                                        {{ csrf_field() }}
                                        <!-- @method('DELETE') -->
                                        <button type="submit" style="background: transparent; border: none;">
                                            <img src="{{ url('assets/images/tr.gif') }}" alt="Delete" style="height: 30px; width: 30px;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="tab-content" id="tabContent3">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Payment Delete History</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>SI no</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Reference No</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paymentDeleteHistory as $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->toDateString() }}</td>
                                <td>{{ $payment->supplier }}</td>
                                <td>{{ $payment->reference_no }}</td>
                                <td>{{ $payment->amount }}</td>
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


<div class="tab-content" id="tabContent4">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Supplier Due Report</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group" style="margin-bottom: 2rem; display:flex;gap:9px;">
                    <label for="categoryName">Supplier:</label>
                    <br>
                    <select id="categoryName" name="categoryName" required style="padding: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;">
                        <option value="" selected>Select Supplier</option>
                        @foreach($suppliers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Supplier</th>
                                <th>Total Purchase</th>
                                <th>Total Purchase Return</th>
                                <th>Total Purchase Amendment</th>
                                <th>Total Payment</th>
                                <th>Due</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplierDueReport as $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->supplier }}</td>
                                <td>{{ $report->total_purchase }}</td>
                                <td>{{ $report->total_purchase_return }}</td>
                                <td>{{ $report->total_purchase_amendment }}</td>
                                <td>{{ $report->total_payment }}</td>
                                <td>{{ $report->due }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->created_at)->toDateString() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="tab-content " id="tabContent5">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Supplier Transition</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="totals">
                    <p style="background: #0a837f;padding: 10px;font-size: large;border-radius: 10px;border: 1px solid;color: white;">Total Quantity: <b>{{ $totalQty }}</b> </p>
                    <p style="background: #383845;padding: 10px;font-size: large;border-radius: 10px;border: 1px solid;color: white;">Total Amount: <b>{{ $totalAmount }}</b></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Si</th>
                                <th>Supplier</th>
                                <th>Particular</th>
                                <th>Total Qty</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplierTransaction as $report)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->supplier_name }}</td>
                                <td>{{ $report->particular }}</td>
                                <td>{{ $report->total_qty }}</td>
                                <td>{{ $report->total_amount }}</td>
                                <td>{{ $report->transaction_date }}</td>
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
@push('custom-scripts')
@endpush