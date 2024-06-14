<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect('/th');
});

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => 'en|th'], 'middleware' => 'setlocale', 'defaul'], function () {

    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
    Route::get('/discover', [App\Http\Controllers\Frontend\DiscoverController::class, 'discover']);
    Route::get('/discover/category/{name}', [App\Http\Controllers\Frontend\DiscoverController::class, 'discoverCategory']);
    Route::get('/product/{id}/{ref}', [App\Http\Controllers\Frontend\ProductController::class, 'detail'])->name('product.detail');
    Route::post('check-stock', [App\Http\Controllers\Frontend\ProductController::class, 'checkStock'])->name('product.checkstock');
    Route::post('get-addon', [App\Http\Controllers\Frontend\ProductController::class, 'getAddon'])->name('product.getaddon');
    Route::get('/contact' , [App\Http\Controllers\Frontend\ContactController::class , 'contact'])->name('contact');
    Route::post('/contact-store' , [App\Http\Controllers\Frontend\ContactController::class , 'contactStore']);
    Route::get('/finder' , [App\Http\Controllers\Frontend\FinderController::class , 'finder']);
    Route::get('/product-quick' , [App\Http\Controllers\Frontend\ProductQucikController::class , 'productQuick']);
    Route::get('/userflow' , [App\Http\Controllers\Frontend\UserflowController::class , 'userflow']);
    Route::get('/userflow/{id}/{ref}' , [App\Http\Controllers\Frontend\UserflowController::class , 'userflowShow']);
    Route::get('/quickcategorysub/{id}/{ref}', [App\Http\Controllers\Frontend\ProductQucikController::class, 'quickcategorysub']);
    Route::get('/customer/{id}/{ref}', [App\Http\Controllers\Frontend\CustomersController::class, 'customerProject']);
    Route::get('/quotation' , [App\Http\Controllers\Frontend\QuotationCartController::class , 'quotationIndex']);



    Route::group(['middleware' => 'auth_customer'], function () {

        Route::get('/customer/profile' , [App\Http\Controllers\Frontend\CustomersController::class , 'profileCustomer']);
        Route::get('/customer/quotationlist' , [App\Http\Controllers\Frontend\CustomersController::class , 'quotationList']);
        Route::get('/customer/quotation' , [App\Http\Controllers\Frontend\CustomersController::class , 'quotationCustomer']);
        Route::get('/customer/quotation-send' , [App\Http\Controllers\Frontend\CustomersController::class , 'quotationSend']);
        Route::get('/customer/quotation-cancel' , [App\Http\Controllers\Frontend\CustomersController::class , 'quotationCancel']);
        Route::get('/customer/production-all' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionAll']);
        Route::get('/customer/production-confirm' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionConfirm']);
        Route::get('/customer/production-confirm-wait' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionConfirmWait']);
        Route::get('/customer/production-prototype' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionPrototype']);
        Route::get('/customer/production-prototype-create' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionPrototypeCreate']);
        Route::get('/customer/production-prototype-wait' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionPrototypeWait']);
        Route::get('/customer/production-prototype-edit' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionPrototypeEdit']);
        Route::get('/customer/production-real' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionReal']);
        Route::get('/customer/production-real-wait' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionRealWait']);
        // Route::get('/customer/production-real-confirm' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionRealConfirm']);
        // Route::get('/customer/production-real-edit' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionRealEdit']);
        Route::get('/customer/warehouse-all-in' , [App\Http\Controllers\Frontend\CustomersController::class , 'warehouseAll']);
        Route::get('/customer/warehouse-all-out' , [App\Http\Controllers\Frontend\CustomersController::class , 'warehouseAllOut']);
        Route::get('/customer/warehouse-giftwise-in' , [App\Http\Controllers\Frontend\CustomersController::class , 'warehouseGiftwise']);
        Route::get('/customer/warehouse-giftwise-out' , [App\Http\Controllers\Frontend\CustomersController::class , 'warehouseGiftwiseOut']);
        Route::get('/customer/warehouse-deposit' , [App\Http\Controllers\Frontend\CustomersController::class , 'warehouseDeposit']);
        Route::get('/customer/transport' , [App\Http\Controllers\Frontend\CustomersController::class , 'transport']);
        Route::get('/customer/transport-delivered' , [App\Http\Controllers\Frontend\CustomersController::class , 'transportDelivered']);
        Route::get('/customer/production-warehouse' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionWarehouse']);
        Route::get('/customer/logout' , [App\Http\Controllers\Frontend\CustomersController::class , 'logoutCustomerBack']);





        
    });
        
});

Route::post('/search-category',  [App\Http\Controllers\Frontend\DiscoverController::class , 'searchCategory'])->name('search.category');


// Route::get('language/{locale}', [App\Http\Controllers\HomeController::class, 'language'])->name('language');

// Route::resource('userflow' , App\Http\Controllers\Frontend\UserflowController::class);
// Route::resource('customer' , App\Http\Controllers\Frontend\CustomersController::class);
Route::post('finder.filter' , [App\Http\Controllers\Frontend\FinderController::class , 'filterFinder'])->name('finder.filter');
Route::post('finder-preview' , [App\Http\Controllers\Frontend\FinderController::class , 'previewFinder'])->name('finder.preview');
Route::post('finder-download' , [App\Http\Controllers\Frontend\FinderController::class , 'downloadPDF'])->name('finder.download');
Route::post('product-quick-filter' , [App\Http\Controllers\Frontend\ProductQucikController::class , 'filter'])->name('product-quick.filter');
Route::get('/product-quick-filter/{id}' , [App\Http\Controllers\Frontend\ProductQucikController::class , 'productSearch'])->name('product-quick.search');
Route::get('/product-quick-tag/{id}' , [App\Http\Controllers\Frontend\ProductQucikController::class , 'productTag']);



Route::resource('quotation' , App\Http\Controllers\Frontend\QuotationCartController::class);
Route::get('/cart-count', [App\Http\Controllers\Frontend\QuotationCartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart-delete', [App\Http\Controllers\Frontend\QuotationCartController::class, 'cartDelete'])->name('cart.delete');
Route::post('/frm-quo-save', [App\Http\Controllers\Frontend\QuotationCartController::class, 'quoTationSave'])->name('quotation.save');
Route::post('/check-leadtime', [App\Http\Controllers\Frontend\QuotationCartController::class, 'checkLeadtime'])->name('check.leadtime');
Route::post('/test-pdf-download',  [App\Http\Controllers\Frontend\FinderController::class , 'downloadPDF2'])->name('finder.download-pdf');

// Backend
Route::group(['prefix' => 'web-admin'], function () {
    Auth::routes(['register' => false]);
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('product' , App\Http\Controllers\Backend\ProductController::class);
        Route::post('product/status' , [App\Http\Controllers\Backend\ProductController::class , 'status'])->name('product.status');
        Route::resource('home-slide' , App\Http\Controllers\Backend\HomeSlideController::class);
        Route::post('home-slide/status' , [App\Http\Controllers\Backend\HomeSlideController::class , 'status'])->name('home-slide.status');
        Route::post('home-slide/sort' , [App\Http\Controllers\Backend\HomeSlideController::class , 'sort'])->name('home-slide.sort');
        Route::resource('home-staff-pick' , App\Http\Controllers\Backend\HomeStaffPickController::class);
        Route::post('home-staff-pick/status' , [App\Http\Controllers\Backend\HomeStaffPickController::class , 'status'])->name('home-staff-pick.status');
        Route::post('home-staff-pick/sort' , [App\Http\Controllers\Backend\HomeStaffPickController::class , 'sort'])->name('home-staff-pick.sort');
        Route::resource('contact-us' , App\Http\Controllers\Backend\ContactUsController::class);
        Route::resource('users-emp' , App\Http\Controllers\Backend\UserAdminController::class);
        Route::resource('users-cust' , App\Http\Controllers\Backend\UserCustomerController::class);
        Route::resource('welcome' , App\Http\Controllers\Backend\WelcomeController::class);
        Route::resource('newmessage' , App\Http\Controllers\Backend\NewMessageController::class);
        Route::resource('docucustomer' , App\Http\Controllers\Backend\DocuCustomerController::class);
        Route::resource('duequotation' , App\Http\Controllers\Backend\DueQuotationController::class);       
        Route::resource('dueproject' , App\Http\Controllers\Backend\DueProjectController::class);
        Route::post('/dueproject/getSubCustomer' , [App\Http\Controllers\DueProjectController::class , 'getSubCustomer'])->name('dueproject.getSubCustomer');
        Route::resource('productquick' , App\Http\Controllers\Backend\ProductQuickController::class);
        Route::resource('stockcustomer' , App\Http\Controllers\Backend\StockCustomerController::class);
        Route::resource('saleordercustomer' , App\Http\Controllers\Backend\SaleOrderCustomerController::class);
        Route::resource('salequotation' , App\Http\Controllers\Backend\SaleQuotationController::class);
        Route::resource('saleinvoice' , App\Http\Controllers\Backend\SaleInvoiceController::class);
        Route::resource('saleconfirmorder' , App\Http\Controllers\Backend\SaleConfirmorderController::class);   
        Route::resource('salecommand' , App\Http\Controllers\Backend\SaleCommandController::class);   
        Route::resource('purchaseorder' , App\Http\Controllers\Backend\PurPurchaseorderController::class);  
        Route::get('/printQuotation/{id}' , [App\Http\Controllers\SaleQuotationController::class , 'printQuotation']);
        Route::get('/printQuotationEn/{id}' , [App\Http\Controllers\SaleQuotationController::class , 'printQuotationEn']);
        Route::post('/getQuotationDetailPrint' , [App\Http\Controllers\SaleQuotationController::class , 'getQuotationDetailPrint']);   
        Route::get('/printInvoiceQt/{id}' , [App\Http\Controllers\SaleQuotationController::class , 'printInvoiceQt']); 
        Route::post('salecommand-review' , [App\Http\Controllers\Backend\SaleCommandController::class , 'insertReview'])->name('salecommand.review');

    });
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//API



//product detail
Route::post('product.getsize' , [App\Http\Controllers\Frontend\ProductController::class , 'getsize'])->name('product.getsize');
Route::post('product.getaddonsku' , [App\Http\Controllers\Frontend\ProductController::class , 'getaddonsku'])->name('product.getaddonsku');
Route::post('/detail/project-list' , [App\Http\Controllers\Frontend\ProductController::class , 'projectList']);

//Quick Quotation
Route::resource('quickdata' , App\Http\Controllers\Frontend\QuickDataController::class);
Route::post('quickdata-quotation' , [App\Http\Controllers\Frontend\QuickDataController::class , 'quotationAdd'])->name('quickdata.quotation');
Route::post('quickdata-quotation-home' , [App\Http\Controllers\Frontend\QuickDataController::class , 'quotationAddHome'])->name('quickdata.quotationhome');
Route::post('/search-product',  [App\Http\Controllers\Frontend\QuickDataController::class , 'searchProduct'])->name('search.product');


//Home
Route::post('/subscribe', [App\Http\Controllers\Frontend\HomeController::class, 'subscribe'])->name('subscribe');
Route::post('/check-subscrib', [App\Http\Controllers\Frontend\HomeController::class, 'checkSubscribe'])->name('check-subscrib');
Route::post('/get-play-list', [App\Http\Controllers\Frontend\HomeController::class, 'getPlayList']);

//Customer Backend
Route::post('customer/saverating' , [App\Http\Controllers\Frontend\CustomersController::class , 'saveRating']);
Route::post('customer/projectdetail' , [App\Http\Controllers\Frontend\CustomersController::class , 'projectDetail']);
Route::post('customer/get-modal-review' , [App\Http\Controllers\Frontend\CustomersController::class , 'getModalReview']);
Route::post('customer/login' , [App\Http\Controllers\Frontend\CustomersController::class , 'loginCustomer']);
Route::post('customer/modal/quotation-detail' , [App\Http\Controllers\Frontend\CustomersController::class , 'quotationDetail']);
Route::post('customer/modal/production-confirm-detail' , [App\Http\Controllers\Frontend\CustomersController::class , 'productionConfirmDetail']);
Route::post('customer/confrim-order' , [App\Http\Controllers\Frontend\CustomersController::class , 'confirmOrder']);
Route::post('customer/edit-confirm-order' , [App\Http\Controllers\Frontend\CustomersController::class , 'editConfirmOrder']);
Route::post('customer/confrim-protoype' , [App\Http\Controllers\Frontend\CustomersController::class , 'confirmPrototype']);
Route::post('customer/warehouse-all/save-order' , [App\Http\Controllers\Frontend\CustomersController::class , 'wareHousesaveOrder']);
Route::post('customer/warehouse-all/save-order-old' , [App\Http\Controllers\Frontend\CustomersController::class , 'wareHousesaveOrderOld']);
Route::post('customer/foot-ck-stock' , [App\Http\Controllers\Frontend\CustomersController::class , 'footCheckStock']);
Route::post('customer/warehouse-out-order' , [App\Http\Controllers\Frontend\CustomersController::class , 'wareHouseOutOrder']);
Route::post('customer/transpot/product-detail' , [App\Http\Controllers\Frontend\CustomersController::class , 'transpotProductDetail']);
Route::get('/customer/download-quotation/{id}' , [App\Http\Controllers\Frontend\CustomersController::class , 'downloadQuotation']);
Route::get('/customer/download-co/{dt}/{hd}' , [App\Http\Controllers\Frontend\CustomersController::class , 'downloadCO']);
Route::get('/customer/download-invoice/{id}' , [App\Http\Controllers\Frontend\CustomersController::class , 'downloadInvoice']);
Route::get('/customer/download-saleorder/{id}' , [App\Http\Controllers\Frontend\CustomersController::class , 'downloadSaleOrder']);
Route::post('/customer/generate-link' , [App\Http\Controllers\Frontend\CustomersController::class , 'generateOrderLink']);
Route::get('/customer/confirm-link/{token}' , [App\Http\Controllers\Frontend\CustomersController::class , 'confirmOrderLink']);
Route::post('/customer/generate-link-product' , [App\Http\Controllers\Frontend\CustomersController::class , 'generateOrderLinkProduct']);
Route::get('/customer/product-link/{token}' , [App\Http\Controllers\Frontend\CustomersController::class , 'productOrderLink']);







Route::middleware('cors')->group(function () {
    Route::resource('api' , App\Http\Controllers\ApiProductController::class);
    Route::get('/api-main' , [App\Http\Controllers\ApiProductController::class , 'ProductMain']);
    Route::get('/api-sub' , [App\Http\Controllers\ApiProductController::class , 'ProductSub']);
    Route::get('/api-DataMain/{id}' , [App\Http\Controllers\ApiProductController::class , 'getDataMain']);
    Route::get('/api-DataMainAll/{id}' , [App\Http\Controllers\ApiProductController::class , 'getDataMainAll']);
    Route::get('/api-DataSub/{id}' , [App\Http\Controllers\ApiProductController::class , 'getDataSub']);
    Route::get('/api-DataTag/{id}' , [App\Http\Controllers\ApiProductController::class , 'getDataTag']);
    Route::get('/api-DataAddno/{id}' , [App\Http\Controllers\ApiProductController::class , 'getDataAddno']);
    Route::get('/api-tag' , [App\Http\Controllers\ApiProductController::class , 'getDataTagAll']);
    Route::get('/api-category' , [App\Http\Controllers\ApiProductController::class , 'ProductCategory']);
    Route::get('/api-ProductTag/{id}' , [App\Http\Controllers\ApiProductController::class , 'getPdTag']);
    Route::get('/api-ProductCategory/{id}' , [App\Http\Controllers\ApiProductController::class , 'getPdCategory']);
    Route::get('/main-products/{id}' , [App\Http\Controllers\ApiProductController::class , 'mainProducts']);
    Route::get('/main-products-tags', [App\Http\Controllers\ApiProductController::class , 'multiProductsTags']);
});






