<?php

use App\Http\Controllers\AdminController;
use App\Models\SalesItemReport;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('pages.user-pages.login');
});


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:

Route::get('/route-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:

Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Config cache has been cleared';
});

// Clear view cache:

Route::get('/view-clear', function () {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});


Route::get('/home', function () {
    $data = SalesItemReport::pluck('net_amount')->toJson();

    return view('dashboard', ['dataString' => $data]);
});

Route::get('/permission', 'AdminController@permission')->name('permission')->middleware('role:1');
Route::post('/updateUserRole', 'AdminController@updateRole')->name('updateUserRole');
Route::post('/updateUserRole', 'AdminController@updateRole')->name('updateUserRole');
Route::get('/getUserRole/{userId}', 'AdminController@getUserRole')->name('getUserRole');

// ----------------------Admin Controller------------------------//
Route::get('/manageAccount', 'AdminController@manageAccount')->name('manageAccount')->middleware('role:1,2,3');
Route::post('/update-profile', 'AdminController@updateProfile')->name('updateProfile')->middleware('role:1,2,3');


Route::get('/category', 'AdminController@showCategoryView')->name('admin.category')->middleware('role:1,2,3');

Route::post('/category/store', 'AdminController@storeCategory')->name('admin.category.store')->middleware('role:1,2,3');
Route::get('/category/data', 'AdminController@getCategoryData')->name('admin.category.data')->middleware('role:1,2,3');

Route::get('/brand/data', 'AdminController@getBrandData')->name('admin.brand.data')->middleware('role:1,2,3');
Route::get('/brand', 'AdminController@showBrandView')->name('admin.brand')->middleware('role:1,2,3');
Route::post('/brand/store', 'AdminController@storeBrand')->name('admin.brand.store')->middleware('role:1,2,3');
Route::delete('/brand/delete', 'AdminController@deleteBrand')->name('admin.brand.delete')->middleware('role:1,2,3');


Route::get('/description', 'AdminController@showDescriptionView')->name('admin.description')->middleware('role:1,2,3');
Route::get('/description/data', 'AdminController@getDescriptionData')->name('admin.description.data')->middleware('role:1,2,3');
Route::post('/description/save', 'AdminController@saveDescription')->name('admin.description.save')->middleware('role:1,2,3');

Route::get('/seregistration', 'AdminController@showSeRegistrationView')->name('admin.seregistration')->middleware('role:1,2,3');
Route::post('/save-se-registration', 'AdminController@saveSeRegistration')->name('save.seregistration')->middleware('role:1,2,3');
Route::delete('/deleteUser/{id}', 'AdminController@deleteUser')->name('deleteUser')->middleware('role:1,2,3');

Route::get('/supplier', 'AdminController@showSupplierView')->name('admin.supplier')->middleware('role:1,2,3');
Route::post('/supplier', 'AdminController@saveSupplier')->name('admin.supplier.save')->middleware('role:1,2,3');
Route::delete('/supplier/delete', 'AdminController@deleteSupplier')->name('admin.supplier.delete')->middleware('role:1,2,3');

Route::get('/costingHead', 'AdminController@showCostingHeadView')->name('admin.costingHead')->middleware('role:1,2,3');
Route::post('/costingHead', 'AdminController@storeCostingHead')->name('admin.costingHead')->middleware('role:1,2,3');

Route::get('/shopLogo', 'AdminController@showShopLogoView')->name('admin.shopLogo')->middleware('role:1,2,3');
Route::post('/shopLogo', 'AdminController@storeShopLogo')->name('admin.storeShopLogo')->middleware('role:1,2,3');
Route::delete('/admin/deleteShopLogo/{id}', 'AdminController@deleteShopLogo')->name('admin.deleteShopLogo')->middleware('role:1,2,3');

Route::get('/shopStatus', 'AdminController@showShopStatusView')->name('admin.shopStatus')->middleware('role:1,2,3');
Route::post('/updateShopStatus/{id}', 'AdminController@updateShopStatus')->name('admin.updateShopStatus')->middleware('role:1,2,3');


Route::get('/purchase', 'AdminController@showpurchaseView')->name('purchase')->middleware('role:1,2,3');
Route::post('/purchase', 'AdminController@storePurchase')->name('purchase.store')->middleware('role:1,2,3');
Route::post('/mrp-adjustment', 'AdminController@mrpAdjustment')->name('mrp_adjustment')->middleware('role:1,2,3');
Route::post('/update-mrp', 'AdminController@updateMRP')->name('updateMRP')->middleware('role:1,2,3');

Route::get('/stockSummery', 'AdminController@showStockSummery')->name('stockSummery')->middleware('role:1,2,3');
Route::get('/stockModule', 'AdminController@showStockModule')->name('stockModule')->middleware('role:1,2,3');


Route::get('/accJournal', 'AdminController@showAccJournalView')->name('accJournal')->middleware('role:1,2,3');
Route::get('/accLedger', 'AdminController@showAccLedgerView')->name('accLedger')->middleware('role:1,2,3');


Route::get('/supplierPayment', 'AdminController@showSupplierPaymentView')->name('supplierPayment')->middleware('role:1,2,3');
Route::get('/supplierPayment', 'AdminController@showSupplierPaymentView')->name('supplierPayment')->middleware('role:1,2,3');
Route::post('/supplierPayment/delete/{id}', 'AdminController@deleteSupplierPayment')->name('supplierPayment.delete')->middleware('role:1,2,3');
Route::delete('/supplierPayment/delete/{id}', 'AdminController@deleteSupplierPayment')->name('supplierPayment.delete')->middleware('role:1,2,3');


Route::get('/expense', 'AdminController@showExpenseView')->name('expense')->middleware('role:1,2,3');
Route::post('/expense/save', 'AdminController@saveExpense')->name('saveExpense')->middleware('role:1,2,3');
Route::delete('/deleteExpense/{id}', 'AdminController@deleteExpense')->name('deleteExpense')->middleware('role:1,2,3');


Route::get('/bankInfo', 'AdminController@showbankinfo')->name('bankInfo')->middleware('role:1,2,3');
Route::post('/saveBankInfo', 'AdminController@saveBankInfo')->name('saveBankInfo')->middleware('role:1,2,3');

Route::get('/investment', 'AdminController@showInvestmentView')->name('investment')->middleware('role:1,2,3');

Route::get('/salesReturn', 'AdminController@showSalesReturn')->name('salesReturn')->middleware('role:1,2,3');
Route::post('/salesReturn', 'AdminController@storeSalesReturn')->name('salesReturn.store')->middleware('role:1,2,3');
Route::get('/productSales', 'AdminController@showProductSales')->name('productSales')->middleware('role:1,2,3');

Route::get('/searchInvoice', 'AdminController@showSearchInvoice')->name('searchInvoice')->middleware('role:1,2,3');

Route::get('/adjustCreditSale', 'AdminController@showAdjustCredit')->name('adjustCreditSale')->middleware('role:1,2,3');
Route::post('/adjustCreditSale/updatePay/{id}', [AdminController::class, 'updatePay'])->name('adjustCreditSale.updatePay')->middleware('role:1,2,3');


Route::get('/comissionJournal', 'AdminController@showCommissionJournal')->name('comissionJournal')->middleware('role:1,2,3');
Route::post('/comissionJournal/store', 'AdminController@storeCommissionJournal')->name('storeCommissionJournal')->middleware('role:1,2,3');


Route::get('/salesCustomer', 'AdminController@showSalesCustomer')->name('salesCustomer')->middleware('role:1,2,3');
Route::post('/salesCustomer', 'AdminController@storeSalesCustomer')->name('storeSalesCustomer')->middleware('role:1,2,3');


Route::get('/cashFlowReport', 'AdminController@showCashFlow')->name('cashFlowReport')->middleware('role:1,2,3');

Route::get('/droppedInvoice', 'AdminController@showDroppedInvoice')->name('droppedInvoice')->middleware('role:1,2,3');

Route::get('/productWiseProfit', 'AdminController@showProductWiseProfit')->name('productWiseProfit')->middleware('role:1,2,3');


Route::get('/shopPayment', 'AdminController@showShopPayment')->name('shopPayment')->middleware('role:1,2,3');
Route::post('/shopPayment', 'AdminController@saveShopPayment')->name('saveShopPayment')->middleware('role:1,2,3');


// ----------------------Admin Controller------------------------//

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/','DashboardController@index');

Route::group(['prefix' => 'basic-ui'], function () {
    Route::get('accordions', function () {
        return view('pages.basic-ui.accordions');
    });
    Route::get('buttons', function () {
        return view('pages.basic-ui.buttons');
    });
    Route::get('badges', function () {
        return view('pages.basic-ui.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.basic-ui.breadcrumbs');
    });
    Route::get('dropdowns', function () {
        return view('pages.basic-ui.dropdowns');
    });
    Route::get('modals', function () {
        return view('pages.basic-ui.modals');
    });
    Route::get('progress-bar', function () {
        return view('pages.basic-ui.progress-bar');
    });
    Route::get('pagination', function () {
        return view('pages.basic-ui.pagination');
    });
    Route::get('tabs', function () {
        return view('pages.basic-ui.tabs');
    });
    Route::get('typography', function () {
        return view('pages.basic-ui.typography');
    });
    Route::get('tooltips', function () {
        return view('pages.basic-ui.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('dragula', function () {
        return view('pages.advanced-ui.dragula');
    });
    Route::get('clipboard', function () {
        return view('pages.advanced-ui.clipboard');
    });
    Route::get('context-menu', function () {
        return view('pages.advanced-ui.context-menu');
    });
    Route::get('popups', function () {
        return view('pages.advanced-ui.popups');
    });
    Route::get('sliders', function () {
        return view('pages.advanced-ui.sliders');
    });
    Route::get('carousel', function () {
        return view('pages.advanced-ui.carousel');
    });
    Route::get('loaders', function () {
        return view('pages.advanced-ui.loaders');
    });
    Route::get('tree-view', function () {
        return view('pages.advanced-ui.tree-view');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('dropify', function () {
        return view('pages.forms.dropify');
    });
    Route::get('form-validation', function () {
        return view('pages.forms.form-validation');
    });
    Route::get('step-wizard', function () {
        return view('pages.forms.step-wizard');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});

Route::group(['prefix' => 'editors'], function () {
    Route::get('text-editor', function () {
        return view('pages.editors.text-editor');
    });
    Route::get('code-editor', function () {
        return view('pages.editors.code-editor');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('morris', function () {
        return view('pages.charts.morris');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('google-charts', function () {
        return view('pages.charts.google-charts');
    });
    Route::get('sparklinejs', function () {
        return view('pages.charts.sparklinejs');
    });
    Route::get('c3-charts', function () {
        return view('pages.charts.c3-charts');
    });
    Route::get('chartist', function () {
        return view('pages.charts.chartist');
    });
    Route::get('justgage', function () {
        return view('pages.charts.justgage');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-table', function () {
        return view('pages.tables.basic-table');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
    Route::get('js-grid', function () {
        return view('pages.tables.js-grid');
    });
    Route::get('sortable-table', function () {
        return view('pages.tables.sortable-table');
    });
});

Route::get('notifications', function () {
    return view('pages.notifications.index');
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('material', function () {
        return view('pages.icons.material');
    });
    Route::get('flag-icons', function () {
        return view('pages.icons.flag-icons');
    });
    Route::get('font-awesome', function () {
        return view('pages.icons.font-awesome');
    });
    Route::get('simple-line-icons', function () {
        return view('pages.icons.simple-line-icons');
    });
    Route::get('themify', function () {
        return view('pages.icons.themify');
    });
});

Route::group(['prefix' => 'maps'], function () {
    Route::get('vector-map', function () {
        return view('pages.maps.vector-map');
    });
    Route::get('mapael', function () {
        return view('pages.maps.mapael');
    });
    Route::get('google-maps', function () {
        return view('pages.maps.google-maps');
    });
});

Route::group(['prefix' => 'user-pages'], function () {
    Route::get('login', function () {
        return view('pages.user-pages.login');
    });
    Route::get('login-2', function () {
        return view('pages.user-pages.login-2');
    });
    Route::get('multi-step-login', function () {
        return view('pages.user-pages.multi-step-login');
    });
    Route::get('register', function () {
        return view('pages.user-pages.register');
    });
    Route::get('register-2', function () {
        return view('pages.user-pages.register-2');
    });
    Route::get('lock-screen', function () {
        return view('pages.user-pages.lock-screen');
    });
});

Route::group(['prefix' => 'error-pages'], function () {
    Route::get('error-404', function () {
        return view('pages.error-pages.error-404');
    });
    Route::get('error-500', function () {
        return view('pages.error-pages.error-500');
    });
});

Route::group(['prefix' => 'general-pages'], function () {
    Route::get('blank-page', function () {
        return view('pages.general-pages.blank-page');
    });
    Route::get('landing-page', function () {
        return view('pages.general-pages.landing-page');
    });
    Route::get('profile', function () {
        return view('pages.general-pages.profile');
    });
    Route::get('email-templates', function () {
        return view('pages.general-pages.email-templates');
    });
    Route::get('faq', function () {
        return view('pages.general-pages.faq');
    });
    Route::get('faq-2', function () {
        return view('pages.general-pages.faq-2');
    });
    Route::get('news-grid', function () {
        return view('pages.general-pages.news-grid');
    });
    Route::get('timeline', function () {
        return view('pages.general-pages.timeline');
    });
    Route::get('search-results', function () {
        return view('pages.general-pages.search-results');
    });
    Route::get('portfolio', function () {
        return view('pages.general-pages.portfolio');
    });
    Route::get('user-listing', function () {
        return view('pages.general-pages.user-listing');
    });
});

Route::group(['prefix' => 'ecommerce'], function () {
    Route::get('invoice', function () {
        return view('pages.ecommerce.invoice');
    });
    Route::get('invoice-2', function () {
        return view('pages.ecommerce.invoice-2');
    });
    Route::get('pricing', function () {
        return view('pages.ecommerce.pricing');
    });
    Route::get('product-catalogue', function () {
        return view('pages.ecommerce.product-catalogue');
    });
    Route::get('project-list', function () {
        return view('pages.ecommerce.project-list');
    });
    Route::get('orders', function () {
        return view('pages.ecommerce.orders');
    });
});

// For Clear cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error-pages.error-404');
})->where('page', '.*');
