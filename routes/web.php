<?php

use App\Http\Controllers\ReadMore;
use App\Http\Controllers\register;
use App\Http\Controllers\AddToCart;
use App\Http\Controllers\OrderShow;
use App\Http\Controllers\vendorData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountDetails;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\your_order_controller;
use App\Http\Controllers\TwoFactorAuthentication;
use App\Http\Controllers\backend\SoccerController;
use App\Http\Controllers\backend\CustomeUniformController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/index', function () {
//     return view('index');
// });



Route::get('/create-symlink', function () {
    symlink(storage_path('app/public'), public_path('storage'));
    echo 'Symlink created successfully.';
});


Route::prefix('v2')->group(function () {
    Route::prefix('backend')->group(function () {

        // SoccerController Routes
        Route::prefix('static')->group(function () {
            Route::controller(SoccerController::class)->name('static.')->group(function () {
                Route::get('index', 'index')->name('index');   // /v2/backend/soccer/index
                Route::post('store', 'store')->name('store');  // /v2/backend/soccer/store
            });
        });

        // CustomeUniformController Routes
        Route::prefix('custome')->group(function () {
            Route::controller(CustomeUniformController::class)->name('custome.')->group(function () {
                Route::get('index', 'index')->name('index');   // /v2/backend/custome/index
                Route::post('store', 'store')->name('store');  // /v2/backend/custome/store
            });
        });

    });
});



Route::get('/ContactUs', [HomeController::class, 'ContactUs'])->name('ContactUs');

Route::get('/', [HomeController::class, 'index'])->name('index');
// Route::get('/index', [HomeController::class, 'index'])->name('home');
// Route::get('/', [DirectoryController::class, 'directoryadd'])->name('index');

Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::get('/admin_dashboard', [LoginController::class, 'admin_dashboard'])->name('admin_dashboard');


Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::get('/forgetPassword', [HomeController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password');


// logout form dashboard

Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('index');
})->name('logout');

Route::get('/directoryadd', [HomeController::class, 'directoryadd'])->name('directoryadd');
// Route::post('/register', [register::class, 'store']);
Route::post('/register', [register::class, 'store']);

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Route::get('/edit-account', [HomeController::class, 'edit_account'])->name('edit-account');
Route::get('/edit-account', [App\Http\Controllers\AccountDetails::class, 'edit_account'])->name('edit-account');

// Route::post('/update-account', [AccountDetails::class, 'updateAccount'])->name('update-account');

// Route to show account details page
Route::get('/account-details', [AccountDetails::class, 'showAccountDetails'])->name('account-details');





// Route to handle the update of account details
Route::post('/update-account', [App\Http\Controllers\AccountDetails::class, 'updateAccount'])->name('update-account');


Route::get('/directory', [DirectoryController::class, 'directory'])->name('directory');


Route::post('/directory_store', [DirectoryController::class, 'directory_store'])->name('directory_store');



Route::get('/directory_show_all', [DirectoryController::class, 'showAll'])->name('directory_show_all');

Route::post('/directory_search', [DirectoryController::class, 'directory_search'])->name('directory_search');


//  Route::post('/directory_search', [DirectoryController::class, 'search_bytext'])->name('directory_search');

Route::get('/search_bytext', [DirectoryController::class, 'search_bytext'])->name('search_bytext');

Route::get('/admin_listing', [DirectoryController::class, 'Directotylisting'])->name('admin_listing');




Route::get('/your_order', [your_order_controller::class, 'your_order'])->name('your_order');


//  vendor
Route::get('/vendor_data', [vendorData::class, 'showAll_data'])->name('vendor_data');

Route::delete('/vendor_data/{id}', [vendorData::class, 'delete'])->name('vendor_data.delete');

Route::delete('admin_listing/{id}', [DirectoryController::class, 'delete'])->name('admin_listing.delete');







Route::get('/readmore/{id}', [ReadMore::class, 'readmore'])->name('readmore');
// Customizable uniform page  routing
Route::get('/basketball', [HomeController::class, 'basketball'])->name('basketball');

Route::get('/cricket', [HomeController::class, 'cricket'])->name('cricket');

Route::get('/soccer', [HomeController::class, 'soccer'])->name('soccer');
Route::get('/services', [HomeController::class, 'services'])->name('services');


Route::get('/help', [HomeController::class, 'help'])->name('help');
Route::get('/faqs', [HomeController::class, 'FAQS'])->name('faqs');


// Route::('/help', [HomeController::class, 'help'])->name('help');



Route::post('/add-to-cart}', [AddToCart::class, 'addToCart'])->name('add_to_cart');
// Route::get('/addToCart_get}', [AddToCart::class, 'addToCart_get'])->name('add_to_cart');
Route::get('/checkout}', [AddToCart::class, 'checkout'])->name('checkout');

// for payment
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/create-payment-intent', [PaymentController::class, 'createPaymentIntent'])->name('create-payment-intent');
// Store custome product data 
Route::post('/store-custom-product', [PaymentController::class, 'storeCustomProduct'])->name('store-custom-product');


// shop product payment route
Route::get('shop_checkout', [PaymentController::class, 'ShopCheckout'])->name('shop_checkout');
Route::post('ShopProductPayment', [PaymentController::class, 'ShopProductPayment'])->name('ShopProductPayment');
Route::post('StoreShopProductData', [PaymentController::class, 'StoreShopProductData'])->name('StoreShopProductData');


// download directory xlsx format
Route::get('/downloadxlsx', [DirectoryController::class, 'downloadxlsx'])->name('downloadxlsx');
// upload  directory xlsx format
Route::post('/directory/upload', [DirectoryController::class, 'upload'])->name('directory.upload');


Route::get('/custome_order', [OrderShow::class, 'CustomOrdershow'])->name('custome_order');
// Download btton route

Route::get('/download-pdf', [OrderShow::class, 'downloadPDF'])->name('download.pdf');
Route::get('/download-pdf/', [OrderShow::class, 'downloadPDF'])->name('download.pdf');






Route::get('/shop', [ProductController::class, 'displayProduct'])->name('shop');



Route::get('create_product', [ProductController::class, 'create'])->name('create_product');
Route::post('create_product', [ProductController::class, 'store'])->name('create_product');

// Route::get('singleProduct{id}', [HomeController::class, 'singleProduct'])->name('singleProduct');
Route::get('singleProduct{id}', [ProductController::class, 'singleProduct'])->name('singleProduct');

Route::post('/add-to-cart', [ProductController::class, 'AddToCart'])->name('add-to-cart');


// UpDate Directory 

// Route::get('/update_directory', [HomeController::class, 'update_directory'])->name('update_directory');
Route::get('/update_directory', [DirectoryController::class, 'showUserDirectoryData'])->name('update_directory');
Route::post('/update-directory', [DirectoryController::class, 'updateUserDirectoryData'])->name('update-user-directory');
// Comment store route
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


// customize product page
Route::post('/save-custom-design', [ProductController::class, 'saveCustomDesign'])->name('save.custom.design');






Route::get('/TwoFactorAuthenticationDisplay', [TwoFactorAuthentication::class, 'TwoFactorAuthenticationDisplay'])->name('TwoFactorAuthenticationDisplay');


Route::get('/directoryadd', [DirectoryController::class, 'directoryadd'])->name('directoryadd');


Route::get('/directory/search', [DirectoryController::class, 'directoryadd'])->name('directory.search');



// Test

Route::post('/save-image', [AddToCart::class, 'saveImage']);


Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');
