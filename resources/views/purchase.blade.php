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
        border: 1px solid #ddd;
        /* Add border to the entire table */
    }

    .modern-table th,
    .modern-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        /* Add border to each cell bottom */
        border-right: 1px solid #ddd;
        /* Add border to each cell right */
    }

    .modern-table th:last-child,
    .modern-table td:last-child {
        border-right: none;
        /* Remove right border from last cell in each row */
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
    <div class="tab active" id="tab1" onclick="switchTab(1)" style="font-size: 100%;font-family: none;">Add/Edit Purchase</div>
    <div class="tab" id="tab2" onclick="switchTab(2)" style="font-size: 100%;font-family: none;line-height: 21px;font-weight:900;">Purchase List</div>
    <div class="tab" id="tab3" onclick="switchTab(3)" style="font-size: 100%;font-family: none;line-height: 21px;font-weight:900;">MRP Adjustment</div>
    <div class="tab" id="tab4" onclick="switchTab(4)" style="font-size: 100%;font-family: none;line-height: 21px;font-weight:900;">Purchase Return</div>
    <div class="tab" id="tab5" onclick="switchTab(5)" style="font-size: 100%;font-family: none;line-height: 21px;font-weight:900;">Purchase History</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 4%;">Add/Edit Purchase</h3>
    <form id="brandForm" action="{{ route('purchase') }}" method="post" style="padding-left: 10%;padding-right: 10%;font-size: 14px;">
        {{ csrf_field() }}
        <div class="form-row" style="margin-bottom: 2rem;">
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="text" id="date" name="date" placeholder="Date" required class="form-control" style="height: 45px;font-size: 14px;font-weight: bolder;font-family: cursive;" readonly>
            </div>
            <!-- Category -->
            <div class="form-group col-md-6">
                <label for="categoryName">Product Category</label>
                <select id="categoryName" name="categoryName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Category</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->category }}">{{ $vendor->category }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- Brand -->
            <div class="form-group col-md-6">
                <label for="brandName">Product Brand</label>
                <select id="brandName" name="brandName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Brand</option>
                    <!-- Brand options will be dynamically loaded here -->
                </select>
            </div>

            <!-- Decsription -->
            <div class="form-group col-md-6">
                <label for="descriptionName">Product Description</label>
                <select id="descriptionName" name="descriptionName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Description</option>
                </select>
            </div>


        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- MRP -->
            <div class="form-group col-md-6">
                <label for="mrp">MRP</label>
                <input type="text" id="mrp" name="mrp" placeholder="MRP" required class="form-control" style="height: 45px;font-size: 14px;" readonly>
            </div>

            <!-- SES Price -->
            <div class="form-group col-md-6">
                <label for="sesPrice">SES Price</label>
                <input type="text" id="sesPrice" name="sesPrice" placeholder="SES Price" required class="form-control" style="height: 45px;font-size: 14px;" readonly>
            </div>

        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- Vendor -->
            <div class="form-group col-md-6">
                <label for="vendor">Vendor</label>
                <select id="vendor" name="vendor" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Vendor</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->vendor }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Entry Model -->
            <div class="form-group col-md-6">
                <label for="entryModel">Entry Model</label>
                <select id="entryModel" name="entryModel" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Entry Model</option>
                    <option value="Barcode">Barcode</option>
                    <option value="Quantity">Quantity</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <!-- Qty -->
            <div class="form-group col-md-6">
                <label for="qty">Qty</label>
                <input type="text" id="qty" name="qty" placeholder="Qty" required class="form-control" style="height: 45px;font-size: 14px;">
            </div>


            <!-- Barcode -->
            <div class="form-group col-md-6">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Barcode" required class="form-control" style="height: 45px; font-size: 14px;">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" onclick="cancelForm()" class="btn btn-danger">Cancel</button>
        </div>
    </form>

</div>

<!-- Additional tab contents -->
<div class="tab-content" id="tabContent2">

    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Cash Flow List</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div style="margin-top: 20px;margin-bottom: 20px;">
                    <label for="filter">Filter:</label>
                    <input type="text" id="filter" onkeyup="filterTable()" placeholder="Search..." style="width: 17%;">
                </div>
                <div class="table-responsive">
                    <table class="table table-dark" id="cashFlowTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendor</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Description</th>
                                <th>Barcode</th>
                                <th>Cost Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseList as $purchase)
                            <tr>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->vendor }}</td>
                                <td>{{ $purchase->category }}</td>
                                <td>{{ $purchase->brand }}</td>
                                <td>{{ $purchase->description }}</td>
                                <td>{{ $purchase->barcode }}</td>
                                <td>{{ $purchase->cost_price }}</td>
                                <td>{{ $purchase->qty }}</td>
                                <td>{{ $purchase->total }}</td>
                                <td>{{ date('Y/m/d', strtotime($purchase->date)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MRP Adjust -->
<div class="tab-content" id="tabContent3">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Add Customer</h3>
    <!-- mrpAdjust List content -->
    <form id="mrpAdjust" action="{{ route('updateMRP') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-6">
                <label for="categoryName">Product Category</label>
                <select id="categoryName" name="categoryName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Category</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->category }}">{{ $vendor->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6" style="margin-left: 10px;">
                <label for="dropdown2">Brand:</label>
                <select class="form-control" id="dropdown2" name="dropdown2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    @foreach ($purchaseList as $purchase)
                    <option value="{{ $purchase->brand }}">{{ $purchase->brand }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="dropdown3">Description:</label>
                <select class="form-control" id="dropdown3" name="dropdown3" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    @foreach ($purchaseList as $purchase)
                    <option value="{{ $purchase->description }}">{{ $purchase->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6" style="margin-left: 10px;">
                <label for="inputField">Update MRP:</label>
                <input type="text" class="form-control" id="mrpUpdate" name="mrpUpdate" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;" placeholder="0987654321">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<div class="tab-content" id="tabContent4">
    <!-- Purchase Return content -->
    <form id="brandForm" action="{{ route('purchase') }}" method="post" style="padding-left: 10%;padding-right: 10%;font-size: 14px;">
        {{ csrf_field() }}
        <div class="form-row" style="margin-bottom: 2rem;">
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                <input type="text" id="date" name="date" placeholder="Date" required class="form-control" style="height: 45px;font-size: 14px;font-weight: bolder;font-family: cursive;" readonly>
            </div>
            <!-- Category -->
            <div class="form-group col-md-6">
                <label for="categoryName">Product Category</label>
                <select id="categoryName" name="categoryName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Category</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->category }}">{{ $vendor->category }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- Brand -->
            <div class="form-group col-md-6">
                <label for="brandName">Product Brand</label>
                <select id="brandName" name="brandName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Brand</option>
                    <!-- Brand options will be dynamically loaded here -->
                </select>
            </div>

            <!-- Decsription -->
            <div class="form-group col-md-6">
                <label for="descriptionName">Product Description</label>
                <select id="descriptionName" name="descriptionName" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Description</option>
                </select>
            </div>


        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- MRP -->
            <div class="form-group col-md-6">
                <label for="mrp">MRP</label>
                <input type="text" id="mrp" name="mrp" placeholder="MRP" required class="form-control" style="height: 45px;font-size: 14px;" readonly>
            </div>

            <!-- SES Price -->
            <div class="form-group col-md-6">
                <label for="sesPrice">SES Price</label>
                <input type="text" id="sesPrice" name="sesPrice" placeholder="SES Price" required class="form-control" style="height: 45px;font-size: 14px;" readonly>
            </div>

        </div>

        <div class="form-row" style="margin-bottom: 2rem;">
            <!-- Vendor -->
            <div class="form-group col-md-6">
                <label for="vendor">Vendor</label>
                <select id="vendor" name="vendor" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Vendor</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->vendor }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Entry Model -->
            <div class="form-group col-md-6">
                <label for="entryModel">Entry Model</label>
                <select id="entryModel" name="entryModel" required class="form-control" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;height: 45px;font-size: 14px;">
                    <option value="" selected>Select Entry Model</option>
                    <option value="Barcode">Barcode</option>
                    <option value="Quantity">Quantity</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <!-- Qty -->
            <div class="form-group col-md-6">
                <label for="qty">Qty</label>
                <input type="text" id="qty" name="qty" placeholder="Qty" required class="form-control" style="height: 45px;font-size: 14px;">
            </div>


            <!-- Barcode -->
            <div class="form-group col-md-6">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" placeholder="Barcode" required class="form-control" style="height: 45px; font-size: 14px;">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" onclick="cancelForm()" class="btn btn-danger">Cancel</button>
        </div>
    </form>

</div>

<div class="tab-content" id="tabContent5">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Bank List</h3>
    <div style="width: 15%; color: #FF204E;padding: 10px;margin-left: 13px;border-radius: 10px;font-weight: 800;"><span>Total Records: {{ count($purchaseHistory) }}</span></div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th style="border: 1px solid;">ID</th>
                                <th style="border: 1px solid;">Vendor</th>
                                <th style="border: 1px solid;">Category</th>
                                <th style="border: 1px solid;">Brand</th>
                                <th style="border: 1px solid;">Description</th>
                                <th style="border: 1px solid;">Cost Price</th>
                                <th style="border: 1px solid;">Quantity</th>
                                <th style="border: 1px solid;">Particular</th>
                                <th style="border: 1px solid;">Date</th>
                                <th style="border: 1px solid;">Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseHistory as $history)
                            <tr>
                                <td>{{ $history->id }}</td>
                                <td>{{ $history->vendor }}</td>
                                <td>{{ $history->category }}</td>
                                <td>{{ $history->brand }}</td>
                                <td>{{ $history->description }}</td>
                                <td>{{ $history->cost_price }}</td>
                                <td>{{ $history->qty }}</td>
                                <td>{{ $history->particular }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->date)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($history->return_date)->format('Y-m-d') }}</td>
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
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("filter");
        filter = input.value.toUpperCase();
        table = document.getElementById("brandTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tds = tr[i].getElementsByTagName("td");
            for (var j = 0; j < tds.length; j++) {
                td = tds[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

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
    }
</script>

<script>
    var vendorsByCategory = @json($vendors->groupBy('category')->toArray());
    var vendorsByBrand = @json($vendors->groupBy('brand')->toArray());
    var vendorsByDescription = @json($vendors->groupBy('description')->toArray());
    // var vendorsByCategory = @json($vendors->groupBy('category')->toArray());
    // var vendorsByBrand = @json($vendors->groupBy('brand')->toArray());
    // var vendorsByDescription = @json($vendors->groupBy('description')->toArray());

    $(document).ready(function() {
        $('#categoryName').change(function() {
            var category = $(this).val();
            if (category && vendorsByCategory.hasOwnProperty(category)) {
                var filteredBrands = vendorsByCategory[category].map(function(vendor) {
                    return vendor.brand;
                }).filter(function(value, index, self) {
                    return self.indexOf(value) === index;
                });

                $('#brandName').empty().append("<option value='' selected>Select Brand</option>");
                filteredBrands.forEach(function(brand) {
                    $('#brandName').append("<option value='" + brand + "'>" + brand + "</option>");
                });
            } else {
                $('#brandName').empty().append("<option value='' selected>Select Brand</option>");
            }
        });

        $('#brandName').change(function() {
            var brand = $(this).val();
            var category = $('#categoryName').val();
            if (brand && category && vendorsByBrand.hasOwnProperty(brand)) {
                var filteredDescriptions = vendorsByBrand[brand].filter(function(vendor) {
                    return vendor.category === category;
                }).map(function(vendor) {
                    return vendor.description;
                }).filter(function(value, index, self) {
                    return self.indexOf(value) === index;
                });

                $('#descriptionName').empty().append("<option value='' selected>Select Description</option>");
                filteredDescriptions.forEach(function(description) {
                    $('#descriptionName').append("<option value='" + description + "'>" + description + "</option>");
                });
            } else {
                $('#descriptionName').empty().append("<option value='' selected>Select Description</option>");
            }
        });

        $('#descriptionName').change(function() {
            var description = $(this).val();
            if (description && vendorsByDescription.hasOwnProperty(description)) {
                var costPrice = vendorsByDescription[description][0].cost_price;
                var vendor = vendorsByDescription[description][0].vendor;
                var total = vendorsByDescription[description][0].total;

                $('#sesPrice').val(costPrice);
                $('#vendor').val(vendor);
                $('#mrp').val(total);
            } else {
                $('#sesPrice').val('');
                $('#vendor').val('');
                $('#mrp').val('');
            }
        });
    });
</script>

<script>
    var today = new Date();

    var year = today.getFullYear();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var hours = ('0' + today.getHours()).slice(-2);
    var minutes = ('0' + today.getMinutes()).slice(-2);

    var formattedDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes;

    $('#date').val(formattedDateTime);
</script>

@endpush