<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PlanPricingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\addons\MediaController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\GlobalExtrasController;
use App\Http\Controllers\admin\StoreCategoryController;
use App\Http\Controllers\admin\VendorController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OtherPagesController;
use App\Http\Controllers\admin\SystemAddonsController;
use App\Http\Controllers\admin\FeaturesController;
use App\Http\Controllers\admin\TableBookController;
use App\Http\Controllers\admin\TimeController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\addons\included\WhatsappmessageController;
use App\Http\Controllers\admin\RecaptchaController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\FavoriteController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\admin\ThemeController;
use App\Http\Controllers\admin\WhoWeAreController;
use App\Http\Controllers\admin\WorksController;
use App\Http\Controllers\web\UserController as WebUserController;
use App\Http\Controllers\landing\HomeController as LandingHomeController;


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



//  ------------------------------- ----------- -----------------------------------------   //
//  -------------------------------  FOR ADMIN  -----------------------------------------   //
//  ------------------------------- ----------- -----------------------------------------   //	
Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'login']);
    Route::post('checklogin-{logintype}', [AdminController::class, 'check_admin_login']);
    Route::get('register', [VendorController::class, 'register']);
    Route::post('register_vendor', [VendorController::class, 'register_vendor']);
    Route::get('forgot_password', [VendorController::class, 'forgot_password']);
    Route::post('send_password', [VendorController::class, 'send_password']);
    Route::post('/getarea', [VendorController::class, 'getarea']);


    Route::get(
        '/verification',
        function () {
            return view('admin.auth.verify');
        }
    );
    Route::post('systemverification', [AdminController::class, 'systemverification'])->name('admin.systemverification');

    Route::group(
        ['middleware' => 'AuthMiddleware'],
        function () {
            Route::get('apps', [SystemAddonsController::class, 'index'])->name('systemaddons');
            Route::get('createsystem-addons', [SystemAddonsController::class, 'createsystemaddons']);
            Route::post('systemaddons/store', [SystemAddonsController::class, 'store']);
            Route::get('systemaddons/status-{id}/{status}', [SystemAddonsController::class, 'change_status']);
            // -------- COMMON --------
            Route::get('admin_back', [VendorController::class, 'admin_back']);
            Route::get('logout', [AdminController::class, 'logout']);
            Route::get('dashboard', [AdminController::class, 'index']);

            // SETTINGS
            Route::post('settings/updaterecaptcha', [RecaptchaController::class, 'updaterecaptcha']);

            Route::get('settings', [SettingsController::class, 'settings_index']);
            Route::post('settings/update', [SettingsController::class, 'settings_update']);
            Route::post('settings/updateseo', [SettingsController::class, 'settings_updateseo']);
            Route::post('settings/updatetheme', [SettingsController::class, 'settings_updatetheme']);
            Route::post('settings/updateanalytics', [SettingsController::class, 'settings_updateanalytics']);
            Route::post('settings/updatecustomedomain', [SettingsController::class, 'settings_updatecustomedomain']);
            Route::post('settings/update-profile-{id}', [VendorController::class, 'update']);
            Route::post('settings/change-password', [VendorController::class, 'change_password']);


            // TRANSACTION
            Route::get('transaction', [TransactionController::class, 'index']);
            Route::get('transaction/plandetails-{id}', [PlanPricingController::class, 'plan_details']);
            Route::get('transaction/generatepdf-{id}', [PlanPricingController::class, 'generatepdf']);
            // PLANS
            Route::get('plan', [PlanPricingController::class, 'view_plan']);
            Route::get('/themeimages', [PlanPricingController::class, 'themeimages']);
            // PAYMENT
            Route::group(
                ['prefix' => 'payment'],
                function () {
                    Route::get('/', [PaymentController::class, 'index']);
                    Route::post('update', [PaymentController::class, 'update']);
                    Route::post('/reorder_payment', [PaymentController::class, 'reorder_payment']);
                }
            );
            // inquiries
            Route::get('/inquiries', [OtherPagesController::class, 'inquiries']);
            Route::get('/inquiries/delete-{id}', [OtherPagesController::class, 'inquiries_delete']);

            // Other Pages
            Route::get('/subscribers', [OtherPagesController::class, 'subscribers']);
            Route::get('/subscribers/delete-{id}', [OtherPagesController::class, 'subscribers_delete']);

            Route::get('privacy-policy', [OtherPagesController::class, 'privacypolicy']);
            Route::get('refund-policy', [OtherPagesController::class, 'refundpolicy']);
            Route::post('refund-policy/update', [OtherPagesController::class, 'refundpolicy_update']);
            Route::post('privacy-policy/update', [OtherPagesController::class, 'privacypolicy_update']);
            Route::get('terms-conditions', [OtherPagesController::class, 'termscondition']);
            Route::post('terms-conditions/update', [OtherPagesController::class, 'termscondition_update']);
            Route::get('aboutus', [OtherPagesController::class, 'aboutus']);
            Route::post('aboutus/update', [OtherPagesController::class, 'aboutus_update']);


            // tax
            Route::group(
                ['prefix' => 'tax'],
                function () {
                    Route::get('/', [TaxController::class, 'index']);
                    Route::get('add', [TaxController::class, 'add']);
                    Route::post('save', [TaxController::class, 'save']);
                    Route::get('edit-{id}', [TaxController::class, 'edit']);
                    Route::post('update-{id}', [TaxController::class, 'update']);
                    Route::get('change_status-{id}/{status}', [TaxController::class, 'change_status']);
                    Route::get('delete-{id}', [TaxController::class, 'delete']);
                    Route::post('reorder_tax', [TaxController::class, 'reorder_tax']);
                }
            );

            //   FAQs
            Route::group(
                ['prefix' => 'faqs'],
                function () {
                    Route::get('/', [OtherPagesController::class, 'faq_index']);
                    Route::get('/add', [OtherPagesController::class, 'faq_add']);
                    Route::post('/save', [OtherPagesController::class, 'faq_save']);
                    Route::get('/edit-{id}', [OtherPagesController::class, 'faq_edit']);
                    Route::post('/update-{id}', [OtherPagesController::class, 'faq_update']);
                    Route::get('/delete-{id}', [OtherPagesController::class, 'faq_delete']);
                    Route::post('/reorder_faq', [OtherPagesController::class, 'reorder_faq']);
                }
            );
            Route::post('social_links/update', [SettingsController::class, 'social_links_update']);
            Route::post('settings/otherdata/update', [SettingsController::class, 'otherdataupdate']);
            Route::get('settings/delete-sociallinks-{id}', [SettingsController::class, 'delete_sociallinks']);
            Route::post('settings/safe-secure-store', [SettingsController::class, 'safe_secure_store']);
            Route::post('/orders/customerinfo/', [OrderController::class, 'customerinfo']);
            Route::post('/orders/vendor_note/', [OrderController::class, 'vendor_note']);

            Route::middleware('adminmiddleware')->group(
                function () {
                    Route::get('transaction-{id}-{status}', [TransactionController::class, 'status']);
                    // PLAN
                    Route::group(
                        ['prefix' => 'plan'],
                        function () {
                            Route::get('add', [PlanPricingController::class, 'add_plan']);
                            Route::post('save_plan', [PlanPricingController::class, 'save_plan']);
                            Route::get('edit-{id}', [PlanPricingController::class, 'edit_plan']);
                            Route::post('update_plan-{id}', [PlanPricingController::class, 'update_plan']);
                            Route::get('status_change-{id}/{status}', [PlanPricingController::class, 'status_change']);
                            Route::get('delete-{id}', [PlanPricingController::class, 'delete']);
                            Route::post('reorder_plan', [PlanPricingController::class, 'reorder_plan']);
                        }
                    );
                    // VENDORS
                    Route::group(
                        ['prefix' => 'users'],
                        function () {
                            Route::get('/', [VendorController::class, 'index']);
                            Route::get('add', [VendorController::class, 'add']);
                            Route::get('edit-{slug}', [VendorController::class, 'edit']);
                            Route::post('update-{slug}', [VendorController::class, 'update']);
                            Route::get('status-{slug}/{status}', [VendorController::class, 'status']);
                            Route::get('login-{slug}', [VendorController::class, 'vendor_login']);
                            Route::post('/store/page/is_allow', [VendorController::class, 'is_allow']);
                            Route::get('delete-{slug}', [VendorController::class, 'deletevendor']);
                        }
                    );

                    //features
                    Route::group(
                        ['prefix' => 'features'],
                        function () {
                            Route::get('/', [FeaturesController::class, 'index']);
                            Route::get('/add', [FeaturesController::class, 'add']);
                            Route::post('/save', [FeaturesController::class, 'save']);
                            Route::get('/edit-{id}', [FeaturesController::class, 'edit']);
                            Route::post('/update-{id}', [FeaturesController::class, 'update']);
                            Route::get('/delete-{id}', [FeaturesController::class, 'delete']);
                            Route::post('/reorder_features', [FeaturesController::class, 'reorder_features']);
                        }
                    );

                    // citys
                    Route::group(
                        ['prefix' => 'cities'],
                        function () {
                            Route::get('/', [OtherPagesController::class, 'cities']);
                            Route::get('/add', [OtherPagesController::class, 'add_city']);
                            Route::post('/save', [OtherPagesController::class, 'save_city']);
                            Route::get('/edit-{id}', [OtherPagesController::class, 'edit_city']);
                            Route::post('/update-{id}', [OtherPagesController::class, 'update_city']);
                            Route::get('/delete-{id}', [OtherPagesController::class, 'delete_city']);
                            Route::get('/change_status-{id}/{status}', [OtherPagesController::class, 'statuschange_city']);
                            Route::post('/reorder_city', [OtherPagesController::class, 'reorder_city']);
                        }
                    );

                    // areas
                    Route::group(
                        ['prefix' => 'areas'],
                        function () {
                            Route::get('/', [OtherPagesController::class, 'areas']);
                            Route::get('/add', [OtherPagesController::class, 'add_area']);
                            Route::post('/save', [OtherPagesController::class, 'save_area']);
                            Route::get('/edit-{id}', [OtherPagesController::class, 'edit_area']);
                            Route::post('/update-{id}', [OtherPagesController::class, 'update_area']);
                            Route::get('/delete-{id}', [OtherPagesController::class, 'delete_area']);
                            Route::get('/change_status-{id}/{status}', [OtherPagesController::class, 'statuschange_area']);
                            Route::post('/reorder_area', [OtherPagesController::class, 'reorder_area']);
                        }
                    );
                    // promotional banner
                    Route::group(
                        ['prefix' => 'promotionalbanners'],
                        function () {
                            Route::get('/', [BannerController::class, 'promotional_banner']);
                            Route::get('add', [BannerController::class, 'promotional_banneradd']);
                            Route::get('edit-{id}', [BannerController::class, 'promotional_banneredit']);
                            Route::post('save', [BannerController::class, 'promotional_bannersave_banner']);
                            Route::post('update-{id}', [BannerController::class, 'promotional_bannerupdate']);
                            Route::get('delete-{id}', [BannerController::class, 'promotional_bannerdelete']);
                            Route::post('reorder_promotionalbanner', [BannerController::class, 'reorder_promotionalbanner']);
                        }
                    );
                    // STORE CATEGORIES
                    Route::group(
                        ['prefix' => 'store_categories'],
                        function () {
                            Route::get('/', [StoreCategoryController::class, 'index']);
                            Route::get('add', [StoreCategoryController::class, 'add_category']);
                            Route::post('save', [StoreCategoryController::class, 'save_category']);
                            Route::get('edit-{id}', [StoreCategoryController::class, 'edit_category']);
                            Route::post('update-{id}', [StoreCategoryController::class, 'update_category']);
                            Route::get('change_status-{id}/{status}', [StoreCategoryController::class, 'change_status']);
                            Route::get('delete-{id}', [StoreCategoryController::class, 'delete_category']);
                            Route::post('/reorder_category', [StoreCategoryController::class, 'reorder_category']);
                        }
                    );

                    // theme
                    Route::get('/themes', [ThemeController::class, 'index']);
                    Route::get('themes/add', [ThemeController::class, 'add']);
                    Route::post('/themes/save', [ThemeController::class, 'save']);
                    Route::get('/themes/edit-{id}', [ThemeController::class, 'edit']);
                    Route::post('/themes/update-{id}', [ThemeController::class, 'update']);
                    Route::get('/themes/delete-{id}', [ThemeController::class, 'delete']);
                    Route::post('/themes/reorder_theme', [ThemeController::class, 'reorder_theme']);

                    // how works
                    Route::get('/how_works', [WorksController::class, 'index']);
                    Route::post('/how_works/savecontent', [WorksController::class, 'savecontent']);
                    Route::get('/how_works/add', [WorksController::class, 'add']);
                    Route::get('/how_works/edit-{id}', [WorksController::class, 'edit']);
                    Route::post('/how_works/update-{id}', [WorksController::class, 'update']);
                    Route::post('/how_works/save', [WorksController::class, 'save']);
                    Route::get('/how_works/delete-{id}', [WorksController::class, 'delete']);
                    Route::post('how_works/reorder_status', [WorksController::class, 'reorder_status']);

                    Route::post('/landingsettings', [SettingsController::class, 'landingsettings']);
                }
            );
            Route::middleware('VendorMiddleware')->group(
                function () {
                    // OTHERS
                    Route::get('settings/delete-banner', [SettingsController::class, 'delete_viewall_page_image']);
                    Route::get('settings/delete-feature-{id}', [SettingsController::class, 'delete_feature']);
                    Route::get('share', [OtherPagesController::class, 'share']);
                    Route::get('getorder', [NotificationController::class, 'getorder']);
                    Route::post('app_section/update', [SettingsController::class, 'app_section']);
                    // TIME
                    Route::group(
                        ['prefix' => 'time'],
                        function () {
                            Route::get('/', [TimeController::class, 'index']);
                            Route::post('store', [TimeController::class, 'store']);
                        }
                    );
                    // ORDERS
                    Route::get('/report', [OrderController::class, 'index']);

                    // Whatesapp settings
                    Route::post('settings/whatsapp_update', [WhatsappmessageController::class, 'whatsapp_update']);

                    Route::group(
                        ['prefix' => 'orders'],
                        function () {
                            Route::get('/', [OrderController::class, 'index']);
                            Route::get('/update-{id}-{status}-{type}', [OrderController::class, 'update']);
                            Route::get('/invoice/{order_number}', [OrderController::class, 'invoice']);
                            Route::get('/print/{order_number}', [OrderController::class, 'print']);
                            Route::post('/payment_status-{status}', [OrderController::class, 'payment_status']);
                            Route::get('/generatepdf/{order_number}', [OrderController::class, 'generatepdf']);
                        }
                    );
                    // CATEGORIES
                    Route::group(
                        ['prefix' => 'categories'],
                        function () {
                            Route::get('/', [CategoryController::class, 'index']);
                            Route::get('add', [CategoryController::class, 'add_category']);
                            Route::post('save', [CategoryController::class, 'save_category']);
                            Route::get('edit-{slug}', [CategoryController::class, 'edit_category']);
                            Route::post('update-{slug}', [CategoryController::class, 'update_category']);
                            Route::get('change_status-{slug}/{status}', [CategoryController::class, 'change_status']);
                            Route::get('delete-{slug}', [CategoryController::class, 'delete_category']);
                            Route::post('reorder_category', [CategoryController::class, 'reorder_category']);
                        }
                    );
                    // PRODUCTS
                    Route::group(
                        ['prefix' => 'products'],
                        function () {
                            Route::get('/', [ProductController::class, 'index']);
                            Route::get('add', [ProductController::class, 'add']);
                            Route::post('save', [ProductController::class, 'save']);
                            Route::get('edit-{slug}', [ProductController::class, 'edit']);
                            Route::post('update-{slug}', [ProductController::class, 'update_product']);
                            Route::post('updateimage', [ProductController::class, 'update_image']);
                            Route::post('storeimages', [ProductController::class, 'store_image']);
                            Route::post('destroyimage', [ProductController::class, 'destroyimage']);
                            Route::get('status-{slug}/{status}', [ProductController::class, 'status']);
                            Route::get('delete/variation-{id}-{product_id}', [ProductController::class, 'delete_variation']);
                            Route::get('delete/extras-{id}', [ProductController::class, 'delete_extras']);
                            Route::get('delete-{slug}', [ProductController::class, 'delete_product']);
                            Route::post('/product-variants-possibilities/{product_id}', [ProductController::class, 'getProductVariantsPossibilities']);
                            Route::get('/get-product-variants-possibilities', [ProductController::class, 'getProductVariantsPossibilities']);
                            Route::get('/variants/edit/{product_id}', [ProductController::class, 'productVariantsEdit']);
                            Route::post('reorder_product', [ProductController::class, 'reorder_product']);
                            Route::post('/reorder_image-{item_id}', [ProductController::class, 'reorder_image']);
                        }
                    );

                    // extras
                    Route::get('/getextras', [GlobalExtrasController::class, 'getextras']);
                    Route::get('/editgetextras-{id}', [GlobalExtrasController::class, 'editgetextras']);
                    Route::group(
                        ['prefix' => 'extras'],
                        function () {
                            Route::get('/', [GlobalExtrasController::class, 'index']);
                            Route::get('/add', [GlobalExtrasController::class, 'add']);
                            Route::post('/save', [GlobalExtrasController::class, 'save']);
                            Route::get('/edit-{id}', [GlobalExtrasController::class, 'edit']);
                            Route::post('/update-{id}', [GlobalExtrasController::class, 'update']);
                            Route::get('/change_status-{id}/{status}', [GlobalExtrasController::class, 'change_status']);
                            Route::get('delete-{id}', [GlobalExtrasController::class, 'delete']);
                            Route::post('/reorder_extras', [GlobalExtrasController::class, 'reorder_extras']);
                        }
                    );
                    // Media
                    Route::group(
                        ['prefix' => 'media'],
                        function () {
                            Route::get('/', [MediaController::class, 'index']);
                            Route::post('/add_image', [MediaController::class, 'add_image']);
                            Route::get('delete-{id}', [MediaController::class, 'delete_media']);
                            Route::get('download-{id}', [MediaController::class, 'download']);
                        }
                    );
                    // PLAN
                    Route::group(
                        ['prefix' => 'plan'],
                        function () {
                            Route::get('selectplan-{id}', [PlanPricingController::class, 'select_plan']);
                            Route::post('buyplan', [PlanPricingController::class, 'buyplan']);
                            Route::any('buyplan/paymentsuccess/success', [PlanPricingController::class, 'success']);
                        }
                    );
                    // BANNERS
                    Route::group(
                        ['prefix' => 'banner'],
                        function () {
                            Route::get('/', [BannerController::class, 'index'])->name('banner');
                            Route::get('/add', [BannerController::class, 'add']);
                            Route::post('/store', [BannerController::class, 'store']);
                            Route::get('/edit-{id}', [BannerController::class, 'show']);
                            Route::post('/update-{id}', [BannerController::class, 'update']);
                            Route::get('/delete-{id}', [BannerController::class, 'delete']);
                            Route::post('/reorder_banner', [BannerController::class, 'reorder_banner']);
                        }
                    );

                    Route::group(
                        ['prefix' => 'whoweare'],
                        function () {
                            Route::get('/', [WhoWeAreController::class, 'index']);
                            Route::get('/add', [WhoWeAreController::class, 'add']);
                            Route::get('/edit-{id}', [WhoWeAreController::class, 'edit']);
                            Route::post('/savecontent', [WhoWeAreController::class, 'savecontent']);
                            Route::post('/save', [WhoWeAreController::class, 'save']);
                            Route::post('/update-{id}', [WhoWeAreController::class, 'update']);
                            Route::get('/delete-{id}', [WhoWeAreController::class, 'delete']);
                            Route::post('/reorder_whoweare', [WhoWeAreController::class, 'reorder_whoweare']);
                        }
                    );
                    Route::get('/booking', [TableBookController::class, 'index']);
                }
            );
        }
    );
});


Route::get('login/google', [VendorController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [VendorController::class, 'handleGoogleCallback']);
Route::get('login/facebook', [VendorController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [VendorController::class, 'handleFacebookCallback']);


//  ------------------------------- ----------- -----------------------------------------   //
//  -------------------------------  FOR WEB/FRONT  -------------------------------------   //
//  ------------------------------- ----------- -----------------------------------------   //

Route::group(['namespace' => '', 'middleware' => 'landingMiddleware'], function () {
    Route::get('/', [LandingHomeController::class, 'index']);
    Route::post('/emailsubscribe', [LandingHomeController::class, 'emailsubscribe']);
    Route::post('/inquiry', [LandingHomeController::class, 'inquiry']);

    Route::get('/about_us', [LandingHomeController::class, 'about_us']);
    Route::get('/privacy_policy', [LandingHomeController::class, 'privacy_policy']);
    Route::get('/terms_condition', [LandingHomeController::class, 'terms_condition']);
    Route::get('/refund_policy', [LandingHomeController::class, 'refund_policy']);
    Route::get('/faqs', [LandingHomeController::class, 'faqs']);

    Route::get('/contact', [LandingHomeController::class, 'contact']);
    Route::get('/stores', [LandingHomeController::class, 'allstores']);
    Route::get('/blog_list', [LandingHomeController::class, 'blogs']);
    Route::get('/blog_details-{id}', [LandingHomeController::class, 'blogs_details']);
    Route::post('/getarea', [VendorController::class, 'getarea']);
});


$domain = env('WEBSITE_HOST');
$parsedUrl = parse_url(url()->current());
$host = $parsedUrl['host'];
if (array_key_exists('host', $parsedUrl)) {
    // if it is a path based URL
    if ($host == env('WEBSITE_HOST')) {
        $domain = $domain;
        $prefix = '{vendor}';
    }
    // if it is a subdomain / custom domain
    else {
        $prefix = '';
    }
}

Route::post('/product-details', [HomeController::class, 'details'])->name('front.details');
Route::get('/product-reviews', [HomeController::class, 'reviews'])->name('front.reviews');
Route::post('/orders/checkplan', [HomeController::class, 'checkplan'])->name('front.checkplan');
Route::post('add-to-cart', [HomeController::class, 'addtocart'])->name('front.addtocart');
Route::post('/cart/qtyupdate', [HomeController::class, 'qtyupdate'])->name('front.qtyupdate');
Route::post('/cart/deletecartitem', [HomeController::class, 'deletecartitem'])->name('front.deletecartitem');
Route::post('/orders/paymentmethod', [HomeController::class, 'paymentmethod'])->name('front.whatsapporder');

Route::post('/changeqty', [HomeController::class, 'changeqty']);
Route::get('get-products-variant-quantity', [HomeController::class, 'getProductsVariantQuantity']);
Route::group(['namespace' => "front", 'prefix' => $prefix, 'middleware' => 'FrontMiddleware'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('front.home');
    Route::get('/categories', [HomeController::class, 'categories'])->name('front.categories');
    Route::get('/product/{id}', [HomeController::class, 'show'])->name('front.product.show');
    Route::get('/cart', [HomeController::class, 'cart'])->name('front.cart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('front.checkout');
    Route::get('/search', [HomeController::class, 'search'])->name('front.search');


    Route::get('/cancel-order/{ordernumber}', [HomeController::class, 'cancelorder'])->name('front.cancelorder');
    // third party suucess route
    Route::any('/payment', [HomeController::class, 'ordercreate']);

    Route::get('/terms', [HomeController::class, 'terms'])->name('front.terms');
    Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('front.privacy');
    Route::get('/book', [HomeController::class, 'book'])->name('front.book');
    Route::get('/track-order/{ordernumber}', [HomeController::class, 'trackorder'])->name('front.trackorder');
    Route::get('/success', [HomeController::class, 'orderSuccess'])->name('front.success');
    Route::get('/success/{order_number}', [HomeController::class, 'orderSuccess'])->name('front.ordersuccess');
    Route::get('/privacypolicy', [HomeController::class, 'privacyshow'])->name('front.privacyshow');
    Route::get('/refundprivacypolicy', [HomeController::class, 'refundprivacypolicy'])->name('front.refundprivacy');
    Route::get('/terms_condition', [HomeController::class, 'terms_condition'])->name('front.termscondition');
    Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('front.aboutus');
    Route::get('/faqshow', [HomeController::class, 'faqshow'])->name('front.faqshow');
    Route::get('/whoweare', [HomeController::class, 'whoweareshow'])->name('front.whoweare');
    Route::get('/details-{slug}', [HomeController::class, 'productdetails'])->name('front.productdetails');
    Route::post('/timeslot', [HomeController::class, 'timeslot'])->name('front.timeslot');
    Route::post('/subscribe', [HomeController::class, 'user_subscribe'])->name('front.subscribe');


    Route::get('/login', [WebUserController::class, 'user_login']);
    Route::post('/checklogin-{logintype}', [WebUserController::class, 'check_login']);
    Route::get('/register', [WebUserController::class, 'user_register']);
    Route::get('/forgotpassword', [WebUserController::class, 'userforgotpassword']);

    Route::post('/send_password', [WebUserController::class, 'send_password']);

    Route::post('/register_customer', [WebUserController::class, 'register_customer']);
    Route::get('/logout', [WebUserController::class, 'logout']);

    Route::get('/profile', [WebUserController::class, 'profile']);
    Route::post('/updateprofile', [WebUserController::class, 'updateprofile']);

    Route::get('/change-password', [WebUserController::class, 'changepassword']);
    Route::post('/change_password', [WebUserController::class, 'change_password']);

    Route::get('/orders', [WebUserController::class, 'orders']);
    Route::get('/loyality', [WebUserController::class, 'loyality']);

    //CONTACTS
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::post('/submit', [HomeController::class, 'save_contact']);


    //CONTACTS
    Route::get('/tablebook', [HomeController::class, 'table_book']);
    Route::post('/book', [HomeController::class, 'save_booking']);

    Route::get('/terms_condition', [HomeController::class, 'terms_condition']);
    Route::get('/privacypolicy', [HomeController::class, 'privacyshow']);

    // favorite
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('user-favouritelist');
    Route::post('/managefavorite', [FavoriteController::class, 'managefavorite']);

    Route::get('/delete-password', [WebUserController::class, 'deletepassword']);
    Route::get('/deleteaccount', [WebUserController::class, 'deleteaccount']);
    Route::get('/wallet', [WebUserController::class, 'wallet']);
    Route::get('/addmoney', [WebUserController::class, 'addmoneywallet']);
    Route::post('/wallet/recharge', [WebUserController::class, 'addwallet']);
    Route::any('/addwalletsuccess', [WebUserController::class, 'addsuccess']);
    Route::any('/addfail', [WebUserController::class, 'addfail']);
    Route::get('/topdeals', [HomeController::class, 'alltopdeals']);
});
