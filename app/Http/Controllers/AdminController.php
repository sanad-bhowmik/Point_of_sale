<?php

namespace App\Http\Controllers;

use App\Models\PosCustomer;
use App\Models\User;
use App\PosAddSupplier;
use App\PosBrand;
use App\PosCategory;
use App\PosDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // All View Down Here //

    public function showCategoryView()
    {
        return view('category');
    }
    public function showSupplierView()
    {
        $suppliers = PosAddSupplier::all();
        return view('supplier', compact('suppliers'));
    }

    public function saveSupplier(Request $request)
    {
        $validatedData = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'supplier_mobile' => 'required|string|max:255',
            'supplier_tr_license' => 'nullable|string|max:255',
            'active_status' => 'required|boolean',
        ]);

        $user_id = Auth::id();

        // Create a new PosAddSupplier instance with the validated data
        $supplier = new PosAddSupplier();
        $supplier->user_id = $user_id;
        $supplier->name = $validatedData['supplier_name'];
        $supplier->address = $validatedData['supplier_address'];
        $supplier->number = $validatedData['supplier_mobile'];
        $supplier->supplier_TR_license = $validatedData['supplier_tr_license'];
        $supplier->status = $validatedData['active_status'];
        $supplier->save();

        return redirect()->back()->with('success', 'Supplier added successfully');
    }

    public function showSeRegistrationView()
    {
        $users = User::all();
        return view('seregistration', compact('users'));
    }


    public function showBrandView()
    {
        $brands = PosBrand::all();

        $categories = PosCategory::all();
        return view('brand', compact('brands', 'categories'));
    }
    public function showDescriptionView()
    {
        return view('description');
    }

    // All View Up Here //


    public function storeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'categoryName' => 'required|string|max:255',
            'vatPercentage' => 'required|numeric',
        ]);

        // Create a new category instance
        $category = new PosCategory();
        $category->name = $validatedData['categoryName'];
        $category->vat = $validatedData['vatPercentage'];
        $category->user_id = auth()->id();

        $category->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function getCategoryData()
    {
        $categories = PosCategory::all();

        return response()->json($categories);
    }

    public function getBrandData()
    {
        $brands = PosBrand::all();

        return response()->json($brands);
    }


    public function storeBrand(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'brand' => 'required|string|max:255',
        ]);

        $userId = auth()->id();

        $categoryId = $request->input('categoryName');
        $category = PosCategory::find($categoryId);
        $categoryName = $category ? $category->name : null;

        $brand = new PosBrand();
        $brand->user_id = $userId;
        $brand->category = $categoryId;
        $brand->category_name = $categoryName;
        $brand->name = $request->input('brand');

        $brand->save();

        return redirect()->back()->with('success', 'Brand saved successfully!');
    }



    public function saveDescription(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'salePrice' => 'required',
            'mrp' => 'required',
        ]);

        $category = PosCustomer::findOrFail($request->input('category_id'));
        $brand = PosBrand::findOrFail($request->input('brand_id'));

        $descriptionCode = Str::random(6);

        $description = new PosDescription();
        $description->user_id = $request->input('user_id');
        $description->category_id = $request->input('category_id');
        $description->brand_id = $request->input('brand_id');
        $description->category = $category->name;
        $description->brand = $brand->name;
        $description->description = $request->input('description');
        $description->description_code = $descriptionCode;
        $description->sale_price = $request->input('salePrice');
        $description->mrp = $request->input('mrp');

        $description->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function saveSeRegistration(Request $request)
    {
        $request->validate([
            'shop_name' => 'required',
            'full_name' => 'required',
            'user_name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'mobile_number' => 'required',
            'email_address' => 'required|email',
            'national_id' => 'required',
            'address' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('full_name');
        $user->email = $request->input('email_address');
        $user->password = bcrypt($request->input('password'));
        $user->username = $request->input('user_name');
        $user->shop = $request->input('shop_name');
        $user->phone = $request->input('mobile_number');
        $user->address = $request->input('address');
        $user->national_id = $request->input('national_id');

        $user->save();

        return redirect()->back()->with('success', 'Shop user created successfully.');
    }

    public function getSuppliers()
    {
        $suppliers = PosAddSupplier::all();
        return response()->json($suppliers);
    }

    public function deleteSupplier($id)
    {
        $supplier = PosAddSupplier::find($id);
        if (!$supplier) {
        }

        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
