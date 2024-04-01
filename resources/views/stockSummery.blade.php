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
        background-color: #1B1B1B;
        color: white;
    }

    .tab-content {
        display: none;
        padding: 10px;
        transition: opacity 0.3s ease-in-out;
        background: url(https://wallpapercave.com/wp/wp8963675.jpg);
        background-repeat: no-repeat;
        height: 97%;
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
    <div class="tab active" id="tab1" onclick="switchTab(1)" style="display: none;">Stock Summary</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">Stock Summary</h3>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Stock Summary table</h4>
                <p style="height: 3px;background: #B885E7;width: 113px;top: -0.75rem;border-radius: 3px;margin-left: 0%;margin-top: -5px;"></p>
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <div style="display: flex;">
                        <input type="text" id="searchInput" placeholder="Search...">
                        <br>
                        <button style="background: transparent;" onclick="clearSearchInput()">
                            <img src="{{ url('assets/images/x.gif') }}" alt="Clear" style="height: 30px; width: 30px; border-radius: 50px;" title="Clear">
                        </button>
                    </div>
                    <div>
                        <input type="text" id="dateInput" readonly>
                    </div>
                </div>
                <div class="table-responsive" style="margin-top: 20px;border: 1px solid;">
                    <table id="invoiceTable" class="table table-dark">
                        <thead>
                            <tr>
                                <th style="font-size: 100%;">Description</th>
                                <th style="font-size: 100%;">Category</th>
                                <th style="font-size: 100%;">Brand</th>
                                <th style="font-size: 100%; background-color: Violet;border: 1px solid;color :#1B1B1B;">Opening Stock Qty</th>
                                <th style="font-size: 100%;">Purchase Qty</th>
                                <th style="font-size: 100%;">Purchase Return Qty</th>
                                <th style="font-size: 100%;">Sale Qty</th>
                                <th style="font-size: 100%;">Sale Return Qty</th>
                                <th style="font-size: 100%;">Missing Qty</th>
                                <th style="font-size: 100%;background-color: YellowGreen;border: 1px solid;color :#1B1B1B;">Closing Stock Qty</th>
                                <th style="font-size: 100%;background-color: Violet;border: 1px solid;color :#1B1B1B;">Opening Stock Value</th>
                                <th style="font-size: 100%;">Purchase Value</th>
                                <th style="font-size: 100%;">Purchase Return Value</th>
                                <th style="font-size: 100%;">Sale Value</th>
                                <th style="font-size: 100%;">Sale Return Value</th>
                                <th style="font-size: 100%;">Missing Value</th>
                                <th style="font-size: 100%;">Price Protection Value</th>
                                <th style="font-size: 100%;background-color: YellowGreen;border: 1px solid;">Closing Stock Value</th>
                                <th style="font-size: 100%;">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stockSummaries as $stockSummary)
                            <tr>
                                <td style="font-size: 100%;">{{ $stockSummary->description }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->category }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->brand }}</td>
                                <td style="font-size: 100%;background-color: Violet;border: 1px solid;color :#1B1B1B;">{{ $stockSummary->opening_stock_qty }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->purchase_qty }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->purchase_return_qty }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->sale_qty }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->sale_return_qty }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->missing_qty }}</td>
                                <td style="font-size: 100%;background-color: YellowGreen;border: 1px solid;color :#1B1B1B;">{{ $stockSummary->closing_stock_qty }}</td>
                                <td style="font-size: 100%;background-color: Violet;border: 1px solid;color :#1B1B1B;">{{ $stockSummary->opening_stock_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->purchase_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->purchase_return_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->sale_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->sale_return_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->missing_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->price_protection_value }}</td>
                                <td style="font-size: 100%;background-color: YellowGreen;border: 1px solid;">{{ $stockSummary->closing_stock_value }}</td>
                                <td style="font-size: 100%;">{{ $stockSummary->average }}</td>
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
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('dateInput').value = today;

        document.getElementById('searchInput').addEventListener('input', function() {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('.modern-table tbody tr');

            rows.forEach(function(row) {
                var category = row.children[1].textContent.toLowerCase();
                var brand = row.children[2].textContent.toLowerCase();
                var description = row.children[0].textContent.toLowerCase();

                if (category.includes(searchValue) || brand.includes(searchValue) || description.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    function clearSearchInput() {
        document.getElementById('searchInput').value = '';
        var rows = document.querySelectorAll('.modern-table tbody tr');

        rows.forEach(function(row) {
            row.style.display = '';
        });
    }
</script>
@endpush