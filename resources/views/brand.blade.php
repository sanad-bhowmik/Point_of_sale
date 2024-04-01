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

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 37%;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        animation-name: blowUp;
        animation-duration: 0.5s;
    }

    @keyframes blowUp {
        from {
            transform: scale(0.5);
        }

        to {
            transform: scale(1);
        }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>



@section('content')


<div class="tab-container">
    <div class="tab active" id="tab1" onclick="switchTab(1)">Add/Edit Product Brand</div>
    <div class="tab" id="tab2" onclick="switchTab(2)">Product Brand List</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 4%;">Add/Edit Product Brand</h3>
    <form id="brandForm" action="{{ route('admin.brand.store') }}" method="post" style="padding-left: 10%;padding-right: 10%;">
        {{ csrf_field() }}
        <div class="form-group" style="margin-bottom: 2rem;">
            <label for="categoryName">Product Category</label>
            <br>
            <select id="categoryName" name="categoryName" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;">
                <option value="" selected>Select Category</option>
                <!-- Options will be dynamically added here -->
            </select>
        </div>

        <div class="form-group">
            <label for="brand">Brand</label>
            <br>
            <input type="text" id="brand" name="brand" placeholder="Brand name" required>
        </div>
        <div class="form-group">
            <button type="submit">Save</button>
            <button type="button" onclick="cancelForm()" style="background-color: #c62828;">Cancel</button>
        </div>
    </form>
</div>


<div class="tab-content" id="tabContent2">
    <div style="margin-bottom: 20px;display: flex;">
        <label for="categoryFilter">Filter by Category:</label>
        <select id="categoryFilter" onchange="filterByCategory()">
            <option value="">All Categories</option>
            @foreach($categories as $category)
            <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button style="background-color: transparent; display: none;" onclick="searchByCategory()"><img src="{{ url('assets/images/search.png') }}" alt="search"></button>
    </div>
    <div class="modern-table" style="margin-top: 20px;border: 1px solid;">
        <table id="brandTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->category_name }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <button class="editBtn" style="background: transparent;"> <img src="{{ url('assets/images/edit.png') }}" alt="Edit" style="margin-right: 10px;"></button>
                        <button class="deleteBtn" style="background: transparent;" title="Delete"><img src="{{ url('assets/images/tr.gif') }}" alt="Delete" style="height: 30px; width: 30px ;border-radius: 50px;"></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="editBrandForm">
            <div class="form-group">
                <input type="hidden" id="brandId" name="brand_id">
                <label for="editedBrand">Brand Name</label>
                <input type="text" id="editedBrand" name="editedBrand" required>
            </div>
            <button type="submit">Save</button>
        </form>
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
    }

    function filterByCategory() {
        var selectedCategory = document.getElementById("categoryFilter").value;
        var rows = document.querySelectorAll("#brandTable tbody tr");

        rows.forEach(row => {
            var categoryCell = row.querySelector("td:nth-child(2)");
            if (selectedCategory === "" || categoryCell.textContent === selectedCategory) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function searchByCategory() {
        filterByCategory();
    }

    document.addEventListener('DOMContentLoaded', function() {
        switchTab(1);
        loadCategories();

        function loadCategories() {
            fetch("{{ route('admin.category.data') }}")
                .then(response => response.json())
                .then(data => {
                    const selectCategory = document.getElementById('categoryName');
                    const categoryFilter = document.getElementById('categoryFilter');
                    selectCategory.innerHTML = '';
                    categoryFilter.innerHTML = '<option value="">All Categories</option>';

                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        selectCategory.appendChild(option);

                        const filterOption = document.createElement('option');
                        filterOption.value = category.name;
                        filterOption.textContent = category.name;
                        categoryFilter.appendChild(filterOption);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));
        }
    });
</script>

<script>
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    function openModal() {
        modal.style.display = "block";
        modal.classList.add("blow-up");
        var row = this.parentNode.parentNode;
        var brandId = row.querySelector('td:first-child').textContent;
        var brandName = row.querySelector('td:nth-child(3)').textContent;
        document.getElementById("brandId").value = brandId;
        document.getElementById("editedBrand").value = brandName;
    }

    function deleteBrand() {
        var confirmation = confirm("Are you sure you want to delete this brand?");
        if (confirmation) {
            var row = this.parentNode.parentNode;
            var brandId = row.querySelector('td:first-child').textContent;

            // Send AJAX request to delete brand
            fetch("{{ route('admin.brand.delete') }}", {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        brandId: brandId
                    })
                })
                .then(response => {
                    if (response.ok) {
                        row.remove();
                        alert("Brand deleted successfully!");
                    } else {
                        throw new Error('Failed to delete brand');
                    }
                })
                .catch(error => {
                    console.error('Error deleting brand:', error);
                    alert("Failed to delete brand");
                });
        }
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    var editButtons = document.querySelectorAll("#brandTable tbody tr .editBtn");
    editButtons.forEach(function(button) {
        button.onclick = openModal;
    });

    var deleteButtons = document.querySelectorAll("#brandTable tbody tr .deleteBtn");
    deleteButtons.forEach(function(button) {
        button.onclick = deleteBrand;
    });
</script>
@endpush