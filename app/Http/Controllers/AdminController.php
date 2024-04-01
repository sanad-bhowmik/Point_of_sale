<?php

namespace App\Http\Controllers;

use App\Models\AccLedger;
use App\Models\CommissionJournal;
use App\Models\Expense;
use App\Models\Investment;
use App\Models\PaymentDeleteHistory;
use App\Models\PosAccJournalReport;
use App\Models\PosAdjustCreditSale;
use App\Models\PosBankDetail;
use App\Models\PosCustomer;
use App\Models\PosInvoice;
use App\Models\PosStockReport;
use App\Models\PosStockSummary;
use App\Models\PurchaseDetail;
use App\Models\ShopInfo;
use App\Models\SupplierDueReport;
use App\Models\SupplierPaymentHistory;
use App\Models\SupplierTransaction;
use App\Models\User;
use App\PosAddSupplier;
use App\PosBrand;
use App\PosCategory;
use App\PosCostingHead;
use App\PosDescription;
use App\PosPurchaseAdd;
use App\PosPurchaseHistory;
use App\PosPurchaseList;
use App\PosSalesReturn;
use App\PosShopListStatus;
use App\PosUser;
use App\SalesCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class AdminController extends Controller
{
    // All View Down Here //


    public function updateProfile(Request $request)
    {
        $request->validate([]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect()->route('manageAccount')->with('success', 'Profile updated successfully');
    }


    public function showCategoryView()
    {
        return view('category');
    }

    public function showSalesReturn()
    {
        return view('salesReturn');
    }

    public function showSalesCustomer()
    {
        $customers = SalesCustomer::all();
        return view('salesCustomer', ['customers' => $customers]);
    }


    public function storeSalesCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'customerName' => 'required|string',
            'number' => 'required|string',
        ]);

        $customerName = $request->input('customerName');
        $number = $request->input('number');

        // Check if the customer already exists
        $existingCustomer = SalesCustomer::where('name', $customerName)->first();

        if ($existingCustomer) {
            // Update existing customer
            $existingCustomer->update([
                'number' => $number,
            ]);
            $message = 'Sales customer updated successfully.';
        } else {
            // Create new customer
            $salesCustomer = new SalesCustomer();
            $salesCustomer->name = $customerName;
            $salesCustomer->number = $number;
            $salesCustomer->save();
            $message = 'Sales customer added successfully.';
        }

        return redirect()->back()->with('success', $message);
    }


    public function showCommissionJournal()
    {
        $suppliers = PosAddSupplier::all();
        return view('comissionJournal', ['suppliers' => $suppliers]);
    }

    public function showAdjustCredit()
    {
        $adjustCreditSales = PosAdjustCreditSale::all();
        return view('adjustCreditSale', ['adjustCreditSales' => $adjustCreditSales]);
    }

    public function updatePay(Request $request, $id)
    {
        $request->validate([
            'pay' => 'required|numeric',
        ]);

        $adjustCreditSale = PosAdjustCreditSale::findOrFail($id);

        $adjustCreditSale->pay = $request->input('pay');
        $adjustCreditSale->save();

        return response()->json(['message' => 'Pay value updated successfully'], 200);
    }

    public function showSearchInvoice()
    {
        $invoices = PosInvoice::all();
        return view('searchInvoice', ['invoices' => $invoices]);
    }

    public function storeSalesReturn(Request $request)
    {
        $validatedData = $request->validate([
            'invoiceNo' => 'required',
            'reason' => 'required',
        ]);

        $salesReturn = new PosSalesReturn();
        $salesReturn->invoice_num = $validatedData['invoiceNo'];
        $salesReturn->reason = $validatedData['reason'];
        $salesReturn->user_id = 108;

        $salesReturn->save();

        return redirect()->back()->with('success', 'Sales return saved successfully!');
    }

    public function showInvestmentView()
    {
        $investments = Investment::all();
        return view('investment', compact('investments'));
    }

    public function showbankinfo()
    {
        $bankDetails = PosBankDetail::all();
        return view('bankInfo', ['bankDetails' => $bankDetails]);
    }

    public function saveBankInfo(Request $request)
    {
        $request->validate([
            'bankName' => 'required|string',
            'acno' => 'required|numeric',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $bankDetail = new PosBankDetail();
        $bankDetail->name = $request->input('bankName');
        $bankDetail->account_no = $request->input('acno');
        $bankDetail->status = $request->input('status');

        $bankDetail->save();

        return redirect()->back()->with('success', 'Bank details saved successfully.');
    }

    public function showExpenseView()
    {
        $expenses = Expense::all();

        return view('expense', ['expenses' => $expenses]);
    }


    public function showSupplierPaymentView()
    {
        $supplierPaymentHistory = SupplierPaymentHistory::all();
        $paymentDeleteHistory = PaymentDeleteHistory::all();
        $supplierDueReport = SupplierDueReport::all();
        $supplierTransaction = SupplierTransaction::all();
        $suppliers = PosAddSupplier::pluck('name', 'id');

        // Calculate total quantity and total amount
        $totalQty = $supplierTransaction->sum('total_qty');
        $totalAmount = $supplierTransaction->sum('total_amount');

        return view('supplierPayment', [
            'supplierPaymentHistory' => $supplierPaymentHistory,
            'paymentDeleteHistory' => $paymentDeleteHistory,
            'supplierDueReport' => $supplierDueReport,
            'supplierTransaction' => $supplierTransaction,
            'suppliers' => $suppliers,
            'totalQty' => $totalQty,
            'totalAmount' => $totalAmount,
        ]);
    }




    public function deleteSupplierPayment($id)
    {
        $supplierPayment = SupplierPaymentHistory::findOrFail($id);

        PaymentDeleteHistory::create([
            'user_id' => $supplierPayment->user_id,
            'supplier' => $supplierPayment->supplier,
            'reference_no' => $supplierPayment->reference_no,
            'amount' => $supplierPayment->amount,
            'remarks' => $supplierPayment->remarks,
            'status' => $supplierPayment->status,
        ]);

        $supplierPayment->delete();

        return redirect()->route('supplierPayment')->with('success', 'Supplier payment deleted successfully.');
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
        $purchaseHistory = PosPurchaseHistory::all();

        return view('purchase', compact('purchaseList', 'vendors', 'purchaseHistory'));
    }


    public function updateMRP(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'mrpUpdate' => 'required|numeric',
        ]);

        $category = $request->input('categoryName');
        $mrp = $request->input('mrpUpdate');

        $purchaseAdd = PosPurchaseAdd::where('category', $category)->first();

        if ($purchaseAdd) {
            $purchaseAdd->update(['mrp' => $mrp]);

            return redirect()->back()->with('success', 'MRP updated successfully.');
        } else {
            return redirect()->back()->with('error', 'No record found for the selected category.');
        }
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

    public function deleteBrand(Request $request)
    {
        $brandId = $request->input('brandId');
        $brand = PosBrand::find($brandId);
        if ($brand) {
            $brand->delete();
            return response()->json(['message' => 'Brand deleted successfully']);
        } else {
            return response()->json(['error' => 'Brand not found'], 404);
        }
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

    public function deleteSupplier(Request $request)
    {
        $supplierId = $request->input('supplierId');
        $supplier = PosAddSupplier::find($supplierId);
        if ($supplier) {
            $supplier->delete();
            return response()->json(['message' => 'Supplier deleted successfully']);
        } else {
            return response()->json(['error' => 'Supplier not found'], 404);
        }
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
        $shopLogo = ShopInfo::find($id);
        if ($shopLogo) {
            // Delete the shop logo record
            $shopLogo->delete();
            return response()->json(['message' => 'Shop logo deleted successfully.']);
        } else {
            return response()->json(['message' => 'Shop logo not found.'], 404);
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
