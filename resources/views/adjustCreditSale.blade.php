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
        background-color: #FF5BAE;
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
    <div class="tab active" id="tab1" onclick="switchTab(1)" style="display: none;">Adjust Credit Sale</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Adjust Credit Sale</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Adjust Credit Sale table</h4>
                <p style="height: 3px;background: #B885E7;width: 150px;top: -0.75rem;border-radius: 3px;margin-left: 0%;margin-top: -5px;"></p>
                <div id="search" style="margin-bottom: 20px; display: flex; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <input type="date" id="datepicker" name="invoice_date" class="form-control">
                    </div>
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Customer Name">
                    </div>
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number">
                    </div>
                    <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <input type="text" id="invoice_num" name="invoice_num" class="form-control" placeholder="Invoice Number">
                    </div>
                    <div class="form-group" style="margin-top: -10px;" title="click">
                        <button type="button" id="searchBtn" class="btn"><img style="height: 35px;" src="{{ url('assets/images/sidenav/search.gif') }}" alt=""></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="invoiceTable" class="table table-dark">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Due</th>
                                <th>Pay</th>
                                <th>Invoice Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adjustCreditSales as $adjustCreditSale)
                            <tr>
                                <td>{{ $adjustCreditSale->id }}</td>
                                <td>{{ $adjustCreditSale->invoice }}</td>
                                <td>{{ $adjustCreditSale->customer_name }}</td>
                                <td>{{ $adjustCreditSale->mobile }}</td>
                                <td>{{ $adjustCreditSale->total_amount }}</td>
                                <td>{{ $adjustCreditSale->paid_amount }}</td>
                                <td>{{ $adjustCreditSale->due }}</td>
                                <td style="width: 100px;"><input type="text" value="{{ intval($adjustCreditSale->pay) }}" class="pay-input"></td>
                                <td>{{ $adjustCreditSale->invoice_date }}</td>
                                <td><button class="adjust-btn" data-id="{{ $adjustCreditSale->id }}">Adjust</button></td>
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
<script>
    $(document).ready(function() {
        $("#searchBtn").click(function() {
            var invoice_date = $("#datepicker").val();
            var customer_name = $("#customer_name").val();
            var mobile = $("#mobile").val();
            var invoice_num = $("#invoice_num").val();

            // Filtering logic
            $("#invoiceTable tbody tr").each(function() {
                var rowDate = $(this).find("td:eq(8)").text();
                var rowCustomer = $(this).find("td:eq(2)").text();
                var rowMobile = $(this).find("td:eq(3)").text();
                var rowInvoiceNum = $(this).find("td:eq(1)").text();

                if (
                    (invoice_date === '' || rowDate === invoice_date) &&
                    (customer_name === '' || rowCustomer === customer_name) &&
                    (mobile === '' || rowMobile === mobile) &&
                    (invoice_num === '' || rowInvoiceNum === invoice_num)
                ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>


@endpush