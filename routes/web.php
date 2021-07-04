<?php

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



// route for setting options









Route::get('admin/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.loginpage');
Route::post('/admin/login', 'Auth\Admin\LoginController@login')->name('admin.login');
Route::post('/admin/logout', 'Auth\Admin\LogoutController@adminLogout')->name('admin.logout');
Route::get('/admin/register', 'Auth\Admin\RegisterController@showRegisterForm')->name('admin.register.page');

Route::post('/admin/register', 'Auth\Admin\RegisterController@register')->name('admin.register');





//Route::get('/admin/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.reset_password.get');

Route::post('store', 'backEnd\AdminController@adminStore');

Auth::routes();



Route::group(['middleware' => 'auth'], function () {


});



Route::group(['middleware' => 'auth:admin','prefix' => 'admin',], function () {

Route::get('manage', 'backEnd\AdminController@mange')->name('admin.manage');


Route::get('dashboard', 'backEnd\AdminDashboardController@Dashboard')->name('admin.dashboard');
Route::get('/', 'backEnd\AdminDashboardController@Dashboard');



Route::get('menu', 'backEnd\MenuController@menuAdd');
Route::post('menu-store', 'backEnd\MenuController@menuStore');

Route::get('category', 'backEnd\CategoryController@categoryPage')->name('admin.category');
Route::post('category-store', 'backEnd\CategoryController@categoryStore');
Route::get('category-edit/{id}', 'backEnd\CategoryController@categoryPage');
Route::post('category-update', 'backEnd\CategoryController@categoryUpdate');
Route::get('category/delete/{id}', 'backEnd\CategoryController@categoryDelete');

Route::get('brand', 'backEnd\BrandController@brand')->name('admin.brand');
Route::post('brand-store', 'backEnd\BrandController@store')->name('admin.brand.store');
Route::get('brand/edit/{id}', 'backEnd\BrandController@brand');
Route::post('brand-update', 'backEnd\BrandController@update')->name('admin.brand.update');
Route::get('brand/delete/{id}', 'backEnd\BrandController@delete');



Route::get('subcategory', 'backEnd\SubcategoryController@subcategoryPage')->name('admin.subcategory');
Route::post('subcategory-store', 'backEnd\SubcategoryController@subcatStore');
Route::get('subcategory-edit/{id}', 'backEnd\SubcategoryController@subcategoryPage');
Route::post('subcategory-update', 'backEnd\SubcategoryController@subcategoryUpdate');
Route::get('subcategory-delete/{id}', 'backEnd\SubcategoryController@subcategoryDelete');

Route::get('product/add', 'backEnd\ProductController@productAdd')->name('admin.product.add');
Route::post('product/store', 'backEnd\ProductController@productStore')->name('admin.product.store');
Route::get('product/manage', 'backEnd\ProductController@productManage')->name('admin.product.manage');
Route::get('product/status/{id}', 'backEnd\ProductController@productStatusUpdate');
Route::get('product/edit/{id}', 'backEnd\ProductController@productEdit')->name('admin.product.edit');
Route::post('product/update', 'backEnd\ProductController@productUpdate')->name('admin.product.update');
Route::get('product/delete/{id}', 'backEnd\ProductController@productDelete')->name('admin.product.delete');

Route::get('product/image/delete/{id}', 'backEnd\ProductController@productImageDelete')->name('admin.image.product.delete');

Route::get('stock', 'backEnd\StockController@productStock');
Route::post('stock/store', 'backEnd\StockController@productStockStore');
Route::get('stock/edit/{id}', 'backEnd\StockController@productStock');
Route::post('stock/update', 'backEnd\StockController@productStockUpdate');
Route::get('stock/delete/{id}', 'backEnd\StockController@productStockDelete');

Route::get('home-slider', 'backEnd\HomeSliderController@sliderAdd');
Route::post('home-slider/store', 'backEnd\HomeSliderController@sliderStore');
Route::get('home-slider/status/{id}', 'backEnd\HomeSliderController@sliderStatus');
Route::get('home-slider/delete/{id}', 'backEnd\HomeSliderController@homeSliderDelete');

Route::get('payment-method', 'backEnd\AdminPaymentControllr@paymentMethod')->name('admin.payment.method');
Route::post('payment/store', 'backEnd\AdminPaymentControllr@paymentStore');
Route::get('payment-method/{id}', 'backEnd\AdminPaymentControllr@paymentMethod');
Route::post('payment-method/update', 'backEnd\AdminPaymentControllr@paymentMethodUpdate');
Route::get('payment-method/delete/{id}', 'backEnd\AdminPaymentControllr@paymentDelete');


Route::get('order/manage', 'backEnd\OrderController@orderManage')->name('admin.order.manage');
Route::post('/update-order', 'backEnd\OrderController@orderUpdate')->name('admin.order.update');

Route::get('order/delete/{id}', 'backEnd\OrderController@orderDelete')->name('admin.order.delete');



Route::post('order/update', 'backEnd\OrderController@cost_discount')->name('admin.cost_discount.update');

Route::get('order/detail/{id}', 'backEnd\OrderController@show')->name('admin.order.show');

Route::get('order/is_paid/{id}', 'backEnd\OrderController@paid');
Route::get('order/is_complete/{id}', 'backEnd\OrderController@complete');

Route::get('order/pdf/{id}', 'backEnd\OrderController@viewOrderPdf')->name('view.roder.pdf');



Route::get('/users', 'Auth\UserController@manageUsers')->name('admin.users.manage');
Route::get('/user/delete/{id}', 'Auth\UserController@deleteUser')->name('user.delete');




Route::post('title/update', 'backEnd\OrderController@titleUpdate');

Route::get('title', 'backEnd\AdminSettingController@titleAdd');
Route::post('title/update', 'backEnd\AdminSettingController@titleUpdate');


Route::get('informations', 'backEnd\SettingController@infomationsView')->name('admin.information.get');

Route::post('informations/update', 'backEnd\SettingController@infomationsUpdate')->name('site.information.update');






Route::get('logo', 'backEnd\LogoController@logoViews')->name('admin.logo');
//Route::post('logo/store', 'backEnd\LogoController@logoStore')->name('logo.store');
//Route::get('logo/update', 'backEnd\LogoController@logoStore')->name('logo.update');
Route::post('logo/update', 'backEnd\LogoController@logoUpdate')->name('logo.update');

Route::get('title', 'backEnd\AdminSettingController@titleAdd')->name('admin.title');
//Route::post('title/update', 'backEnd\AdminSettingController@titleUpdate');


Route::get('blog', 'backEnd\BlogController@postViews')->name('admin.blog');
Route::post('blog/store', 'backEnd\BlogController@postStore')->name('blog.store');
Route::get('blog/manage', 'backEnd\BlogController@postManage')->name('admin.blog.manage');
Route::get('blog/status/{id}', 'backEnd\BlogController@statusUpdate')->name('status.update');
Route::get('blog/edit/{id}', 'backEnd\BlogController@postEdit')->name('blogPost.edit');
Route::get('blog/delete/{id}', 'backEnd\BlogController@postDelete')->name('blogPost.delete');
Route::post('blog/update', 'backEnd\BlogController@postUpdate')->name('post.update');


/////  Route for home page setting start ////

Route::get('home/setting', 'backEnd\HomeSettingController@setingPageView')->name('admin.home.setting');

Route::post('home/setting', 'backEnd\HomeSettingController@sliderSettingUpdate')->name('admin.slider.setting.update');
Route::get('home/slider/switch', 'backEnd\HomeSettingController@sliderSwitch')->name('admin.slider.switch.setting');


Route::get('home/new_product/switch', 'backEnd\HomeSettingController@newProductSwitch')->name('admin.new_product.switch.setting');
Route::post('home/setting/new_product', 'backEnd\HomeSettingController@newProductSettingUpdate')->name('admin.new_product.setting.update');

Route::get('home/featured_product/switch', 'backEnd\HomeSettingController@featuredProductSwitch')->name('admin.featured_product.switch.setting');
Route::post('home/setting/featured_product', 'backEnd\HomeSettingController@featureProductSettingUpdate')->name('admin.featured_product.setting.update');

Route::get('home/bestSeller_product/switch', 'backEnd\HomeSettingController@bestSeller_productProductSwitch')->name('admin.bestSeller_product.switch.setting');
Route::post('home/setting/bestSeller_product', 'backEnd\HomeSettingController@bestSellerProductSettingUpdate')->name('admin.bestSeller_product.setting.update');


Route::get('home/blog_post/switch', 'backEnd\HomeSettingController@blogPostSwitch')->name('admin.blog_post.switch.setting');
Route::post('home/setting/blog_post', 'backEnd\HomeSettingController@blog_postSettingUpdate')->name('admin.blog_post.setting.update');

Route::get('home/arrivals/switch', 'backEnd\HomeSettingController@arrivalsSwitch')->name('admin.arrivals.switch.setting');
Route::post('home/setting/arrivals', 'backEnd\HomeSettingController@arrivalsSettingUpdate')->name('admin.arrivals.setting.update');




/////  Route for home page setting end ////

});

///////////////////////////////
///////////////////////////////
///////////////////////////////
///////////////////////////////

Route::get('/', 'frontEnd\FrontEndHomeController@showHomeContent')->name('user.home');

Route::get('/category/{id}', 'frontEnd\FrontEndCategoryController@showContentByCategory')->name('category.page');
Route::get('/detail/{id}', 'frontEnd\FrontEndDetailController@productDetail')->name('product.details');

Route::get('/customer-tag/store', 'frontEnd\FrontEndDetailController@customerTagStore');
Route::get('/customer-review/store', 'frontEnd\FrontEndDetailController@customerReviewStore');


Route::get('/cart', 'frontEnd\FrontEndCartController@manageCart')->name('user.cart');
Route::post('/add-to-cart', 'frontEnd\FrontEndCartController@productAddToCart')->name('add.cart');
Route::get('/remove-cart/{id}', 'frontEnd\FrontEndCartController@destroy')->name('cart.remove');
Route::post('/update-cart', 'frontEnd\FrontEndCartController@cartUpdate');

//Route::get('/customer/login', 'FrontEndCheckoutController@customerAdd');
Route::post('/customer/store', 'frontEnd\CustomerController@customerStore');
Route::get('/customer/register', 'frontEnd\CustomerController@customerAdd');


Route::get('/checkout', 'frontEnd\FrontEndCheckoutController@addCheckout')->name('checkout');
Route::post('/checkout/store', 'frontEnd\FrontEndCheckoutController@checkoutStore')->name('checkout.store');




Route::get('/register', 'Auth\RegisterUserController@showRegistrationForm')->name('user.register.form');
Route::post('/user/register', 'Auth\RegisterUserController@register')->name('user.register');


Route::get('/account', 'Auth\UserController@userAccount')->name('user.account');
Route::get('/account/edit', 'Auth\UserController@userAccountEdit')->name('user.account.edit');
Route::post('/account/update', 'Auth\UserController@userAccountUpdate')->name('user.account.update');

Route::get('/blog', 'frontEnd\BlogController@blogPage')->name('blog.page');
Route::get('/blog/details/{id}', 'frontEnd\BlogController@blogDetails')->name('blog.details');



Route::post('/search_product', 'frontEnd\FrontEndCategoryController@searchProduct')->name('search.product');


Route::get('/contact', 'frontEnd\ContactController@contact')->name('contact.page');



////////////// search //////////
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = Product::where('title','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)

    	return 'success';
      //  return view('welcome')->withDetails($user)->withQuery ( $q );
   // else return view ('welcome')->withMessage('No Details found. Try to search again !');
});