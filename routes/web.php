<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VnshopController;
use Illuminate\Http\Request;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\RanksController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ShipsController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RefundsController;
use App\Http\Controllers\VoucherController;
use App\Services\DistanceCalculatorService;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProgrameController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PremissionsController;
use App\Http\Controllers\FollowToShopController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Support_mainController;
use App\Http\Controllers\ProducttocartController;
use App\Http\Controllers\ProducttoshopController;
use App\Http\Controllers\ProgramtoshopController;
use App\Http\Controllers\VoucherToMainController;
use App\Http\Controllers\VoucherToShopController;
use App\Http\Controllers\Categori_ShopsController;
use App\Http\Controllers\CategorilearnsController;
use App\Http\Controllers\Learning_sellerController;
use App\Http\Controllers\Notification_to_mainController;
use App\Http\Controllers\Notification_to_shopController;
use App\Http\Controllers\CategoriessupportmainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\configController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ClientEmbedController;
use App\Http\Controllers\ModifierController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\webAppController;
use App\Http\Controllers\EventController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [VnshopController::class, 'login'])->name('login');
Route::group(['middleware' => ['checkToken', 'CheckRole']], function () {
    Route::get('/dashboard', [VnshopController::class, 'dashboard'])->name('dashboard');
    Route::get('/blog', [VnshopController::class, 'blog'])->name('blog');
    Route::get('/posts', [VnshopController::class, 'post'])->name('post');
    Route::get('/costomer', [VnshopController::class, 'costomer'])->name('costomer');
    Route::get('/change-user', [VnshopController::class, 'changeUser'])->name('change_user');
    Route::get('/change-user-search', [VnshopController::class, 'changeUserSearch'])->name('changeUserSearch');
    Route::get('/trash-user', [VnshopController::class, 'trashUser'])->name('trash_user');
    Route::get('/pending-approval', [VnshopController::class, 'pendingApproval'])->name('pending_approval');
    Route::get('/manager', [VnshopController::class, 'manager'])->name('manager');
    Route::get('/store', [VnshopController::class, 'store'])->name('store');
    Route::get('/trash-stores', [VnshopController::class, 'trash_stores'])->name('trash_stores');
    Route::get('/violation-stores', [VnshopController::class, 'violation_stores'])->name('violation_stores');
    Route::get('/pending-approval-stores', [VnshopController::class, 'pending_approval_stores'])->name('pending_approval_stores');
    Route::get('/list-category', [VnshopController::class, 'list_category'])->name('list_category');
    Route::get('/trash-category', [VnshopController::class, 'trash_category'])->name('trash_category');
    Route::get('/change-category', [VnshopController::class, 'changeCategory'])->name('change_category');
    Route::get('/change-shop', [VnshopController::class, 'changeShop'])->name('change_shop');
    Route::get('/change-shop-search', [VnshopController::class, 'changeShopSearch'])->name('changeShopSearch');
    Route::get('/list_role', [VnshopController::class, 'list_role'])->name('list_role');
    Route::get('/product_all', [ProductController::class, 'ProductAll'])->name('product_all');
    Route::get('/product-waiting-approval', [ProductController::class, 'productWaitingApproval'])->name('product-waiting-approval');
    Route::post('/products/{id}/approve', action: [ProductController::class, 'approveProduct'])->name('products.approve');
    Route::post('/products/{id}/reject', [ProductController::class, 'rejectProduct'])->name('products.reject');
    Route::get('/products/report/{id}', [ProductController::class, 'showReportForm'])->name('products.report');
    Route::post('/products/report/{id}', [ProductController::class, 'reportProduct'])->name('products.submitReport');
    Route::get('/list_permission', [VnshopController::class, 'list_permission'])->name('list_permission');
    Route::delete('/blogs/{id}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
    Route::put('/blogs/{id}', [VnshopController::class, 'updateBlog'])->name('blogs.update');
    Route::post('/blogs/{id}/restore', [VnshopController::class, 'restoreBlog'])->name('blogs.restore');
    Route::put('/posts/{id}', [VnshopController::class, 'updatepost'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::post('/post/{id}/restore', [VnshopController::class, 'restorepost'])->name('post.restore');
    Route::post('/search', [VnshopController::class, 'search'])->name('admin_search');
    Route::get('/search', [VnshopController::class, 'search'])->name('admin_search_get');
    Route::get('/config_list', [configController::class, 'index'])->name('config');
    Route::put('/config_update/{id}', [configController::class, 'update'])->name('config.update');
    Route::get('/voucherall', [VoucherToMainController::class, 'voucherall'])->name('voucherall');
    Route::put('/update_voucher/{id}', [VnshopController::class, 'updatevoucher'])->name('voucher_main.update');
    Route::delete('/delete_voucher/{id}', [VnshopController::class, 'delete_voucher'])->name('voucher.delete');
    Route::get('/taxall', [VnshopController::class, 'taxall'])->name('taxall');
    Route::put('/update_tax/{id}', [VnshopController::class, 'update_tax'])->name('tax.update');
    Route::post('/storetax', [VnshopController::class, 'storetax'])->name('tax.store');
    Route::delete('/destroytax/{id}', [VnshopController::class, 'destroytax'])->name('tax.delete');
    Route::get('/changeStatusTax/{id}', [VnshopController::class, 'changeStatusTax'])->name('changeStatusTax');
    Route::get('/bannerall', [VnshopController::class, 'bannerall'])->name('bannerall');
    Route::post('/storebanner', [VnshopController::class, 'storebanner'])->name('banner.store');
    Route::put('/bannerupdate{id}', [VnshopController::class, 'updatebanner'])->name('banner.update');
    Route::get('/statist-quantity-sold', [VnshopController::class, 'statistByQuantity'])->name('statist.quantity_sold');
    Route::get('/statist-revenue', [VnshopController::class, 'statistByRevenue'])->name('statist_revenue');
    Route::get('/statist-sales', [VnshopController::class, 'statistBySales'])->name('statist.sales');
    Route::post('categories', [VnshopController::class, 'storeCategory'])->name('create_category');
    Route::put('categories', [VnshopController::class, 'updateCategory'])->name('update_category');
    Route::get('/revenue_general', [VnshopController::class, 'revenue_general'])->name('revenue_general');
    Route::get('/revenue_general', [VnshopController::class, 'revenue_general'])->name('revenue_general');
    Route::get('/products/{id}', [ProductController::class, 'showproduct'])->name('products.show');
    Route::get('/profile', [AuthenController::class, 'admin_profile'])->name('admin_profile');
    Route::get('/list_notification', [VnshopController::class, 'list_notification'])->name('list_notification');
    Route::get('/delete_notification/{id}', [VnshopController::class, 'delete_notification'])->name('delete_notification');
    Route::get('/list_app', [webAppController::class, 'index'])->name('list_app');
    Route::get('/setting_admin', [webAppController::class, 'setting_admin'])->name('setting_admin');
    Route::post('/delete_all', [webAppController::class, 'delete_all'])->name('delete_all');
    Route::post('/delete_data_by_date', [webAppController::class, 'delete_data_by_date'])->name('delete_data_by_date');
    Route::post('/create_app', [webAppController::class, 'create'])->name('create_app');
    Route::get('/delete_app', [webAppController::class, 'delete_app'])->name('delete_app');
    Route::get('/rankall', [VnshopController::class, 'rankall'])->name('rankall');
    Route::post('/rankCreate', [VnshopController::class, 'rankCreate'])->name('rankCreate');
    Route::put('/update_rank/{id}', [VnshopController::class, 'updaterank'])->name('rank.update');
    Route::get('/changeStatusRank/{id}', [VnshopController::class, 'changeStatusRank'])->name('changeStatusRank');
    Route::delete('/destroyrank/{id}', [VnshopController::class, 'destroyrank'])->name('rank.delete');
    Route::get('/changeStatusBanner/{id}', [VnshopController::class, 'changeStatusBanner'])->name('changeStatusBanner');
    Route::get('/payment_method', [VnshopController::class, 'payment_method'])->name('payment_method');
    Route::post('/storepaymant', [VnshopController::class, 'storepaymant'])->name('storepaymant');
    Route::put('/payment_methodupdate/{id}', [VnshopController::class, 'updatepayment'])->name('updatepayment');
    Route::get('/changeStatuspayment/{id}', [VnshopController::class, 'changeStatuspayment'])->name('changeStatuspayment');
    Route::delete('/destroypayment/{id}', [VnshopController::class, 'destroypayment'])->name('destroypayment');
    Route::post('products/update/handle/{id}', [VnshopController::class, 'handleUpdateProduct'])->name('handleUpdateProduct');
    Route::get('/events', [VnshopController::class, 'listEvent'])->name('events');
    Route::post('/events', [VnshopController::class, 'store_events'])->name('store_events')->middleware('CheckAdminPremission:manage_even');
    Route::put('/events/{id}', [VnshopController::class, 'update_events'])->name('update_events')->middleware('CheckAdminPremission:manage_even');
    Route::get('/events-status', [VnshopController::class, 'changeStatusEvent'])->name('change_status_events')->middleware('CheckAdminPremission:manage_even');
    Route::get('/trash-events', [VnshopController::class, 'listEvent_trash'])->name('trash_events')->middleware('CheckAdminPremission:manage_even');
    // Route::resource('roles', RolesController::class)->middleware('CheckRole');
    Route::get('/api/role/destroy/{id}', [RolesController::class, 'destroy'])->name('role_destroy')->middleware('CheckAdminPremission:role');
    Route::put('/api/roles/update}', [RolesController::class, 'update'])->name('role_update')->middleware('CheckAdminPremission:role');
    Route::post('/api/roles', [RolesController::class, 'store'])->name('role_store')->middleware('CheckAdminPremission:role');
    Route::get('/api/change_role', [RolesController::class, 'change_role'])->name('change_role')->middleware('CheckAdminPremission:role');
    Route::put('/user/change_role', [VnshopController::class, 'userChangeRole'])->name('user_change_role')->middleware('CheckAdminPremission:role');
    
    // Route::resource('permission', PremissionsController::class)->middleware('CheckRole');
    Route::post('/api/permission/grant_access', [PremissionsController::class, "grant_access"])->name('grant_access')->middleware('CheckAdminPremission:role');
    Route::get('/api/permission/delete_access', [PremissionsController::class, "delete_access"])->name('delete_access')->middleware('CheckAdminPremission:role');
    Route::get('/loi-nhuan', [VnshopController::class, 'loinhuan'])->name('loinhuan');

});

Route::get('send_mail_event', [VnshopController::class, "send_mail_event"])->name('send_mail_event');
Route::get('check_time_event', [VnshopController::class, "check_time_event"])->name('check_time_event');
Route::get('check_time_event_hand', [VnshopController::class, "check_time_event_hand"])->name('check_time_event_hand');
Route::get('/test_mail', [VnshopController::class, 'test_mail'])->name('test_mail');




Route::get('/template', function () {
    return view('bill.bill_template');
});







// CLIENT EMBEDED
Route::get('/subdomain', [ModifierController::class, 'subdomain'])->name('subdomain');
Route::post('/create_subdomain', [ModifierController::class, 'create_subdomain'])->name('create_subdomain');
Route::get('/delete_subdomain', [ModifierController::class, 'delete_subdomain'])->name('delete_subdomain');

Route::get('/modifiers', [ModifierController::class, 'modifiers'])->name('modifiers');
Route::get('/delete_modifier', [ModifierController::class, 'delete_modifier'])->name('delete_modifier');
Route::post('/create_modifier', [ModifierController::class, 'create_modifier'])->name('create_modifier');
Route::post('/update_modifier', [ModifierController::class, 'update_modifier'])->name('update_modifier');
Route::get('/page_ctkm', [ModifierController::class, 'page_ctkm'])->name('page_ctkm');

Route::get('/wallet', [ClientEmbedController::class, 'wallet'])->name('wallet');
Route::post('/wallet/updateBank', [ClientEmbedController::class, 'updateBank'])->name('updateBank');
Route::post('/wallet/shop_request_get_cash', [ClientEmbedController::class, 'shop_request_get_cash'])->name('shop_request_get_cash');
Route::get('/register/shipping/view', [ClientEmbedController::class, 'register_shipping_view'])->name('register_shipping_view');
Route::post('/register/shipping', [ClientEmbedController::class, 'register_shipping'])->name('register_shipping');

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google_login');

Route::get('/callback', [AuthenController::class, 'handleGoogleCallback']);



Route::get('/checkWebDie', [VnshopController::class, 'checkWebDie'])->name('checkWebDie');