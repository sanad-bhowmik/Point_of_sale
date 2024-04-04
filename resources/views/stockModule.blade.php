@extends('layout.master')

@push('plugin-styles')
@endpush
<style>
    .glow-effect {
        height: 3px;
        background: #0002A1;
        width: 56px;
        top: -0.75rem;
        border-radius: 3px;
        margin-left: 41%;
        margin-top: 4px;
        margin-bottom: 2%;
        animation: glow 1.5s infinite alternate;
        /* Apply the glow animation */
    }

    @keyframes glow {
        0% {
            box-shadow: 0 0 10px #0002A1;
        }

        50% {
            box-shadow: 0 0 20px #0002A1;
        }

        100% {
            box-shadow: 0 0 10px #0002A1;
        }
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
        /* background: url(https://img.freepik.com/free-vector/minimalist-white-background-with-neumorphic-circle_1017-39167.jpg); */
        background-repeat: no-repeat;
        height: 95%;
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
    <div class="tab active" id="tab1" onclick="switchTab(1)">Stock Report</div>
    <div class="tab " id="tab2" onclick="switchTab(2)">Stock/Price Adjustment</div>
    <div class="tab " id="tab3" onclick="switchTab(3)">Stock Adjustment Report</div>
    <div class="tab " id="tab4" onclick="switchTab(4)">Product With barcode</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;">Stock Report</h3>
    <p class="glow-effect"></p>
    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
        <div>
            <label for="category">Category: </label>
            <select name="category" id="categoryDropdown">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="brand">Brand: </label>
            <select name="brand" id="brandDropdown">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                <option value="{{ $brand }}">{{ $brand }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="description">Description: </label>
            <select name="description" id="descriptionDropdown">
                <option value="">Select Description</option>
                @foreach ($descriptions as $description)
                <option value="{{ $description }}">{{ $description }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button id="searchButton" class="mb-4 btn-success" style="border-radius: 10px; color: white">Search</button>

    <div style="border: 1px solid black;width: 142px;padding: 3px;background-color: #337ab7;color: white;">Total Quantity: {{ $totalQty }}</div>
    <div class="modern-table-container" style="height: 400px; overflow-y: auto;">
        <div class="modern-table" style="border: 1px solid;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="font-size: 100%;">Category</th>
                        <th style="font-size: 100%;">Model</th>
                        <th style="font-size: 100%;">Description</th>
                        <th style="font-size: 100%;">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stockReports as $report)
                    <tr>
                        <td style="font-size: 100%;">{{ $report->category }}</td>
                        <td style="font-size: 100%;">{{ $report->model }}</td>
                        <td style="font-size: 100%;">{{ $report->description }}</td>
                        <td style="font-size: 100%;">{{ $report->qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="tab-content " id="tabContent2">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Stock / Price Adjustment</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Stock / Price Adjustment</h4>
                <p style="height: 3px;background: #B885E7;width: 150px;top: -0.75rem;border-radius: 3px;margin-left: 0%;margin-top: -5px;"></p>
                <div class="table-responsive">
                    <table id="invoiceTable" class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Cost Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseLists as $index => $purchase)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $purchase->category }}</td>
                                <td>{{ $purchase->brand }}</td>
                                <td>{{ $purchase->description }}</td>
                                <td>{{ $purchase->cost_price }}</td>
                                <td>{{ $purchase->qty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content " id="tabContent3">
    <h3 style="text-align: center;">Stock Adjustment Report</h3>
    <p class="glow-effect"></p>
</div>

<div class="tab-content" id="tabContent4">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Product With barcode</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark" id="cashFlowTable">
                        <thead>
                            <tr>
                                <th>Si no</th>
                                <th>Vendor</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Barcode</th>
                                <th>Cost Price</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 1;
                            @endphp
                            @foreach ($purchaseLists as $purchase)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $purchase->vendor }}</td>
                                <td>{{ $purchase->category }}</td>
                                <td>{{ $purchase->brand }}</td>
                                <td>{{ $purchase->description }}</td>
                                <td>{{ $purchase->barcode }}</td>
                                <td>{{ $purchase->cost_price }}</td>
                                <td>
                                    @if ($purchase->qty > 0)
                                    Available
                                    @else
                                    Unavailable
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($purchase->date)->format('Y-m-d') }}</td>
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
    document.getElementById('searchButton').addEventListener('click', function() {
        var category = document.getElementById('categoryDropdown').value;
        var brand = document.getElementById('brandDropdown').value;
        var description = document.getElementById('descriptionDropdown').value;

        var rows = document.querySelectorAll('.modern-table tbody tr');

        rows.forEach(function(row) {
            var rowData = row.querySelectorAll('td');
            var rowCategory = rowData[0].innerText.trim();
            var rowBrand = rowData[1].innerText.trim();
            var rowDescription = rowData[2].innerText.trim();

            var categoryMatch = category === '' || rowCategory === category;
            var brandMatch = brand === '' || rowBrand === brand;
            var descriptionMatch = description === '' || rowDescription === description;

            row.style.display = categoryMatch && brandMatch && descriptionMatch ? '' : 'none';
        });
    });
</script>
@endpush