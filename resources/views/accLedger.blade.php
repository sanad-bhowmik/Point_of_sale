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
    <div class="tab active" id="tab1" onclick="switchTab(1)" style="display: none;">Acc Journal</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 5%;background-color: #B885E7; color: white;border: 1px solid">LEDGER</h3>
    <button class="button" id="downloadBtn" title="Download" onclick="downloadPDF()">
        <p class="text">
            Download PDF
        </p>
        <div class="svg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
            </svg>
        </div>
    </button>

    <div class="modern-table" style="margin-top: 20px;border: 1px solid;">
        <table id="accLedgerTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Particular</th>
                    <th>Reference No</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                    <th>Narration</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accLedgerData as $ledger)
                <tr>
                    <td>{{ $ledger->id }}</td>
                    <td>{{ $ledger->date }}</td>
                    <td>{{ $ledger->particular }}</td>
                    <td>{{ $ledger->reference_no }}</td>
                    <td>{{ $ledger->debit }}</td>
                    <td>{{ $ledger->credit }}</td>
                    <td>{{ $ledger->balance }}</td>
                    <td>{{ $ledger->narration }}</td>
                    <td>{{ $ledger->status }}</td>
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
</script>
@push('custom-scripts')
@endpush