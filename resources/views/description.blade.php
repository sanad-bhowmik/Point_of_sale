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
    <div class="tab active" id="tab1" onclick="switchTab(1)">Add/Edit Product Model/Color/Description</div>
    <div class="tab" id="tab2" onclick="switchTab(2)">Product Model/Color/Description List</div>
</div>

<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;margin-bottom: 2%;">Add/Edit Product Model/Color/Description</h3>
    <p style="height: 3px;background: #0002A1;width: 56px;top: -0.75rem;border-radius: 3px;margin-left: 23%;margin-top: 4px;"></p>
    <form id="descriptionForm" method="post" action="{{ route('admin.description.save') }}" style="padding-left: 10%;padding-right: 10%;">
        {{ csrf_field() }}

        <input type="hidden" id="categoryId" name="category_id">
        <input type="hidden" id="brandId" name="brand_id">
        <input type="hidden" id="userId" name="user_id" value="{{ auth()->user()->id }}">

        <div class="form-group" style="margin-bottom: 2rem;">
            <label for="categoryName">Product Category</label>
            <br>
            <select id="categoryName" name="category_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;">
                <option value="" selected>Select Category</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 2rem;">
            <label for="brandName">Product Brand</label>
            <br>
            <select id="brandName" name="brand_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; transition: all 0.3s ease;">
                <option value="" selected>Select Brand</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Model/Description/Color</label>
            <br>
            <input type="text" id="description" name="description" placeholder="Model /Description /Color" required>
        </div>
        <div class="form-group">
            <label for="salePrice">SES Price</label>
            <br>
            <input type="text" id="salePrice" name="salePrice" placeholder="* * * * *" required>
        </div>
        <div class="form-group">
            <label for="mrp">MRP</label>
            <br>
            <input type="text" id="mrp" name="mrp" placeholder="* * * * *" required>
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
        <select id="categoryFilter">
            <option value="">All Categories</option>

        </select>
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

    document.addEventListener('DOMContentLoaded', function() {
        switchTab(1);
        loadCategories();
        loadBrands();

        function loadCategories() {
            const selectCategory = document.getElementById('categoryName');
            selectCategory.innerHTML = '<option value="" selected>Select Category</option>';
            fetch("{{ route('admin.category.data') }}")
                .then(response => response.json())
                .then(data => {
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        selectCategory.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching categories:', error));
        }

        function loadBrands() {
            const selectBrand = document.getElementById('brandName');
            selectBrand.innerHTML = '<option value="" selected>Select Brand</option>';
            fetch("{{ route('admin.brand.data') }}")
                .then(response => response.json())
                .then(data => {
                    data.forEach(brand => {
                        const option = document.createElement('option');
                        option.value = brand.id;
                        option.textContent = brand.name;
                        selectBrand.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching brands:', error));
        }

        const descriptionForm = document.getElementById('descriptionForm');
        descriptionForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(descriptionForm);
            fetch("{{ route('admin.description.save') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        throw new Error('Failed to save description');
                    }
                })
                .catch(error => {
                    console.error('Error occurred while saving description:', error);
                    // Display an error message to the user
                    alert('Failed to save description. Please try again.');
                });
        });
    });
</script>