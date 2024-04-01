@extends('layout.master')

@push('plugin-styles')
@endpush

<style>
    .image-upload input[type="file"] {
        display: none;
    }

    .image-upload {
        border-radius: 5px;
        padding: 10px 20px;
        display: inline-block;
        cursor: pointer;
        margin-left:27%;
    }

    .image-upload span {
        color: #333;
        font-weight: bold;
    }

    .image-upload:hover {
        background-color: #e0e0e0;
    }

    .image-upload input[type="file"]:hover+span {
        text-decoration: underline;
    }

    .animated-button {
        position: relative;
        display: inline-block;
        padding: 12px 24px;
        border: none;
        font-size: 16px;
        background-color: inherit;
        border-radius: 100px;
        font-weight: 600;
        color: #ffffff40;
        box-shadow: 0 0 0 2px #ffffff20;
        cursor: pointer;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .animated-button span:last-child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background-color: #2196F3;
        border-radius: 50%;
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .animated-button span:first-child {
        position: relative;
        z-index: 1;
    }

    .animated-button:hover {
        box-shadow: 0 0 0 5px #2195f360;
        color: #ffffff;
    }

    .animated-button:active {
        scale: 0.95;
    }

    .animated-button:hover span:last-child {
        width: 150px;
        height: 150px;
        opacity: 1;
    }

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

    #delete {
        background: transparent;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
        width: 72%;
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
        color: black;
        border: 2px solid black
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

    .glow-effect {
        height: 3px;
        background: #0002A1;
        width: 56px;
        top: -0.75rem;
        border-radius: 3px;
        margin-left: 33%;
        margin-top: 4px;
        margin-bottom: 2%;
        animation: glow 1.5s infinite alternate;
        /* Apply the glow animation */
    }
</style>
@section('content')


<div class="tab-container">
    <div class="tab active" id="tab1" onclick="switchTab(1)">Add Shop Logo</div>
    <div class="tab" id="tab2" onclick="switchTab(2)">Shop Logo</div>
</div>
<div class="tab-content active" id="tabContent1">
    <h3 style="text-align: center;">Add Shop Logo</h3>
    <p class="glow-effect"></p>
    <form id="shopLogoForm" method="POST" action="{{ route('admin.storeShopLogo') }}" enctype="multipart/form-data" style="padding-left: 25%">
        {{ csrf_field() }}
        <h1><strong style="font-size: 22px;font-weight: 600;text-decoration-line: underline;">Upload Files</strong></h1>
        <div class="form-group" style="margin-bottom: 2rem;border: 3px dotted gray; width:60%">
            <div style="margin-top: 23px;text-align: center;">
                <br>
                <h4>Select File here</h4>
                <p style="color: darkgray;">Files Supported: PNG, JPG, JPEG, GIF</p>
            </div>
            <label for="shopLogoInput" class="image-upload">
                <span style="text-decoration: none;background-color: #005af0;color: #ffffff;padding: 10px 20px;border: none;outline: none;transition: 0.3s;">Choice Image  <img src="{{ url('assets/images/sidenav/upload.svg') }}" alt="Delete" style="height: 30px; width: 30px; border-radius: 50px;" title="Delete"></span>
                <input type="file" id="shopLogoInput" name="shop_logo" accept="image/*" required onchange="showPreview(this)">
            </label>
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>

        <div class="form-group">
            <button class="animated-button" type="submit">
                <span>Upload</span>
                <span></span>
            </button></div>
    </form>
</div>


<div class="tab-content" id="tabContent2">
    <div class="modern-table" style="margin-top: 20px; border: 1px solid;">
        <table id="categoryTable">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shopLogos as $index => $shop)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><img src="{{ asset('assets/images/shoplogo/' . $shop->shop_img) }}" alt="Shop Logo" style="max-width: 100px; max-height: 100px;"></td>
                    <td>
                        <button onclick="deleteShopLogo({{ $shop->id }})" style="background: transparent;">
                            <img src="{{ url('assets/images/tr.gif') }}" alt="Delete" style="height: 30px; width: 30px; border-radius: 50px;" title="Delete">
                        </button>
                    </td>
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

    function showFileName(input) {
        var fileName = input.files[0].name;
        var fileLabel = document.getElementById('fileLabel');
        fileLabel.innerText = fileName;
        document.getElementById('cancelIcon').style.display = 'inline'; // Show the cancel icon
    }

    function cancelSelection() {
        var fileInput = document.getElementById('shopLogoInput');
        fileInput.value = ''; // Reset the file input
        var fileLabel = document.getElementById('fileLabel');
        fileLabel.innerText = 'Choose Image';
        document.getElementById('cancelIcon').style.display = 'none'; // Hide the cancel icon
    }

    function showPreview(input) {
        var file = input.files[0];
        var imageType = /^image\//;

        if (!imageType.test(file.type)) {
            alert("Please select an image file.");
            return;
        }

        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById('imagePreview');
            preview.innerHTML = '<img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px;" />';
        }

        reader.readAsDataURL(file);
    }

    function deleteShopLogo(id) {
        if (confirm('Are you sure you want to delete this shop logo?')) {
            fetch("{{ url('admin/deleteShopLogo') }}/" + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload(); // Reload the page to reflect changes
                })
                .catch(error => console.error('Error:', error));
        }
    }
</script>