<?php

namespace App\Http\Controllers;

use App\Models\AccLedger;
use App\Models\PosAccJournalReport;
use App\Models\PosCustomer;
use App\Models\PosStockReport;
use App\Models\PosStockSummary;
use App\Models\PurchaseDetail;
use App\Models\ShopInfo;
use App\Models\User;
use App\PosAddSupplier;
use App\PosBrand;
use App\PosCategory;
use App\PosCostingHead;
use App\PosDescription;
use App\PosPurchaseAdd;
use App\PosPurchaseList;
use App\PosShopListStatus;
use App\PosUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class AdminController extends Controller
{
    // All View Down Here //

    public function showCategoryView()
    {
        return view('category');
    }
    public function manageAccount()
    {
        return view('manageAccount');
    }

    public function showAccLedgerView()
    {
        $accLedgerData = AccLedger::all();

        return view('accLedger', ['accLedgerData' => $accLedgerData]);
    }

    public function showAccJournalView()
    {
        $accJournalData = PosAccJournalReport::all();
        return view('accJournal', ['accJournalData' => $accJournalData]);
    }

    public function showStockModule()
    {
        $stockReports = PosStockReport::all();
        $totalQty = PosStockReport::sum('qty');
        $categories = PosStockReport::distinct()->pluck('category')->filter()->values();
        $brands = PosStockReport::distinct()->pluck('model')->filter()->values();
        $descriptions = PosStockReport::distinct()->pluck('description')->filter()->values();

        $purchaseLists = PosPurchaseList::all();

        return view('stockModule', compact('stockReports', 'totalQty', 'categories', 'brands', 'descriptions', 'purchaseLists'));
    }


    public function showStockSummery()
    {
        $stockSummaries = PosStockSummary::all();

        // Pass the data to the view
        return view('stockSummery', compact('stockSummaries'));
    }

    public function showPurchaseView()
    {
        $purchaseList = PosPurchaseList::all();
        $vendors = PosPurchaseList::all();

        return view('purchase', compact('purchaseList', 'vendors'));
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
        $users = PosUser::all();
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

    public function showShopStatusView()
    {
        $shopStatusList = PosShopListStatus::all();
        return view('shopStatus', compact('shopStatusList'));
    }

    public function showShopLogoView()
    {
        $shopLogos = ShopInfo::whereNotNull('shop_img')->get();

        return view('shopLogo', compact('shopLogos'));
    }

    public function showCostingHeadView()
    {
        $costingHeads = PosCostingHead::all();
        return view('costingHead', ['costingHeads' => $costingHeads]);
    }

    public function getDescriptionData()
    {
        $descriptions = PosDescription::all();

        return response()->json($descriptions);
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
            'user_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required',
            'sale_price' => 'required',
            'mrp' => 'required',
        ]);

        $description = new PosDescription();
        $description->user_id = $request->input('user_id');
        $description->category = $request->input('category');
        $description->category_id = $request->input('category_id');
        $description->brand = $request->input('brand');
        $description->brand_id = $request->input('brand_id');
        $description->description_code = $request->input('description_code');
        $description->description = $request->input('description');
        $description->sale_price = $request->input('sale_price');
        $description->mrp = $request->input('mrp');
        $description->save();
        return redirect()->back()->with('success', 'Description saved successfully.');
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

        // Create a new instance of the PosUser model
        $user = new PosUser();
        $user->shop_name = $request->input('shop_name');
        $user->full_name = $request->input('full_name');
        $user->user_name = $request->input('user_name');
        $user->password = bcrypt($request->input('password'));
        $user->number = $request->input('mobile_number');
        $user->email = $request->input('email_address');
        $user->NID_no = $request->input('national_id');
        $user->address = $request->input('address');

        // Save the user
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Shop user created successfully.');
    }

    public function deleteUser($id)
    {
        $user = PosUser::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
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

    public function storeCostingHead(Request $request)
    {
        $request->validate([
            'costing_head' => 'required|string|max:255',
            'expense_type' => 'required|string|max:255',
            'status' => 'required|in:Active,InActive',
        ]);

        $userId = Auth::id();

        $costingHead = new PosCostingHead();
        $costingHead->user_id = $userId;
        $costingHead->costing_head = $request->input('costing_head');
        $costingHead->expense_type = $request->input('expense_type');
        $costingHead->status = $request->input('status');

        $costingHead->save();

        return redirect()->back()->with('success', 'Costing Head added successfully');
    }

    public function storeShopLogo(Request $request)
    {
        $request->validate([
            'shop_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        $destinationPath = public_path('assets/images/shoplogo');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $imageName = time() . '.' . $request->shop_logo->extension();

        $request->shop_logo->move($destinationPath, $imageName);

        $shopInfo = new ShopInfo();
        $shopInfo->shop_img = $imageName;
        $shopInfo->save();

        return redirect()->back()->with('success', 'Shop logo uploaded successfully.');
    }

    public function deleteShopLogo($id)
    {
        try {
            $shopLogo = ShopInfo::findOrFail($id);
            $shopLogo->delete();

            return response()->json(['message' => 'Shop logo deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete shop logo.'], 500);
        }
    }


    public function updateShopStatus(Request $request, $id)
    {
        try {
            $shopStatus = PosShopListStatus::findOrFail($id);
            $shopStatus->status = $request->status;
            $shopStatus->save();

            return response()->json(['message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function storePurchase(Request $request)
    {

        $validatedData = $request->validate([
            'date' => 'required|date',
            'categoryName' => 'required',
            'brandName' => 'required',
            'descriptionName' => 'required',
            'mrp' => 'required|numeric',
            'sesPrice' => 'required|numeric',
            'vendor' => 'required',
            'entryModel' => 'nullable',
            'qty' => 'required|numeric',
            'barcode' => 'required',
        ]);

        $purchase = new PosPurchaseAdd();
        $purchase->user_id = auth()->user()->id;
        $purchase->date = $validatedData['date'];
        $purchase->category = $validatedData['categoryName'];
        $purchase->brand = $validatedData['brandName'];
        $purchase->description = $validatedData['descriptionName'];
        $purchase->mrp = $validatedData['mrp'];
        $purchase->sell_price = $validatedData['sesPrice'];
        $purchase->vendor = $validatedData['vendor'];
        $purchase->entry_model = $validatedData['entryModel'];
        $purchase->barcode = $validatedData['barcode'];
        $purchase->quantity = $validatedData['qty'];

        $purchase->save();

        return redirect()->back()->with('success', 'Purchase record saved successfully.');
    }
}
