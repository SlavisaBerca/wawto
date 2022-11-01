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
Auth::routes();
Route::middleware('is_platform')->group(function(){
	Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login-facebook');
	Route::get('/login/facebook/callback','Auth\LoginController@handleFacebookCallback');
	Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('login-google');
	Route::get('/login/google/callback','Auth\LoginController@handleGoogleCallback');
    Route::get('/', 'Platform\Frontend\HomeController@index');
    Route::get('viewCity','Platform\Frontend\HomeController@viewCityName');
    Route::get('/contact', 'Platform\Frontend\HomeController@contact')->name('contact');
	Route::post('/send-message', 'Platform\Frontend\ContactController@sendMessage')->name('send-message');
    Route::post('ticket','Platform\Frontend\ContactController@ticket')->name('ticket');
    Route::get('suppliers','Platform\Frontend\SuppliersController@show')->name('suppliers');
    Route::get('domain-suppliers/{domain_url}','Platform\Frontend\SuppliersController@domainSuppliers')->name('domain-suppliers');
    Route::get('search-suppliers','Platform\Frontend\SuppliersController@searchSuppliers')->name('search-suppliers');
      Route::get('search','Platform\Frontend\HomeController@search')->name('search');
    Route::get('national-requests','Platform\Frontend\RequestsController@nationalRequests')->name('national-requests');
	Route::get('verify/{email}/{verification_token}','Platform\Frontend\MyAccountController@verify')->name('verify');
Route::middleware('auth')->group(function(){
	Route::get('newsletter','Platform\Frontend\MyAccountController@show')->name('newsletter');
    Route::get('my-account','Platform\Frontend\MyAccountController@show')->name('my-account');
	Route::post('reset-password','Platform\Frontend\MyAccountController@passwordReset')->name('reset-password');
    Route::get('/home', 'Platform\Frontend\HomeController@index')->name('home');
    Route::get('/refresh-notification-count','Platform\Frontend\AjaxRequestsController@countNotifications');
    Route::get('/json-notifications','Platform\Frontend\AjaxRequestsController@jsonNotifications');
    Route::get('/delete-notification/{notification_id}','Platform\Frontend\AjaxRequestsController@deleteNotification');
    Route::get('/hard-delete-notification/{notification_id}','Platform\Frontend\AjaxRequestsController@hardDeleteNotification');
    Route::get('profile','Platform\Frontend\MyAccountController@profile')->name('profile');
	Route::get('notifications','Platform\Frontend\MyAccountController@profile')->name('notifications');
	Route::post('edit-personal/{id}','Platform\Frontend\MyAccountController@editPersonal')->name('edit-personal');
    Route::post('edit-company/{id}','Platform\Frontend\MyAccountController@editCompany')->name('edit-company');
	 Route::get('sent-commands','Platform\Frontend\CommandsController@myCommands')->name('sent-commands');
	Route::get('my-employees','Platform\Frontend\MyAccountController@myEmployees')->name('my-employees');
    Route::get('sent-requests','Platform\Frontend\RequestsController@sentRequests')->name('sent-requests');
    Route::get('confirm-command/{command_id}','Platform\Frontend\CommandsController@confirm')->name('confirm-command');
	Route::get('confirm-collet/{command_id}','Platform\Frontend\CommandsController@confirmCollet')->name('confirm-collet');
    Route::get('my-returs','Platform\Frontend\RetursController@showReceived')->name('my-returs');
	Route::post('send-retur/{command_id}','Platform\Frontend\RetursController@sendRetur')->name('send-retur');
	Route::get('confirm-retur/{id}','Platform\Frontend\RetursController@confirmRetur')->name('confirm-retur');
		Route::get('command-details/{command_id}','Platform\Frontend\CommandsController@commandDetails')->name('command-details');
Route::middleware('user_completed')->group(function(){
    //REquests 
    Route::post('post-mainform','Platform\Frontend\RequestsPostController@postMain')->name('post-mainform');
	Route::get('insert-check/{label}/{number}','Platform\Frontend\RequestsPostController@postCheck');
    Route::post('post-quick','Platform\Frontend\RequestsPostController@postQuick')->name('post-quick');
	Route::get('/add-rating-one/{id}','Platform\Frontend\RatingsController@addOne');
	Route::get('/add-rating-two/{id}','Platform\Frontend\RatingsController@addTwo');
	Route::get('/add-rating-three/{id}','Platform\Frontend\RatingsController@addThree');
	Route::get('/add-rating-four/{id}','Platform\Frontend\RatingsController@addFour');
	Route::get('/add-rating-five/{id}','Platform\Frontend\RatingsController@addFive');
    //Route my-returs 

    //Supplier Actions 
    Route::get('my-commands','Platform\Frontend\MyAccountController@myCommands')->name('my-commands');
    Route::get('my-offers','Platform\Frontend\OffersController@myOffers')->name('my-offers');
  
	
    Route::get('sent-offers','Platform\Frontend\OffersController@sentOffers')->name('sent-offers');
    Route::get('sent-returs','Platform\Frontend\RetursController@showMy')->name('sent-returs');

    //Part params
    Route::post('add-partparam/{id}','Platform\Frontend\MyAccountController@partParam')->name('add-partparam');
    Route::get('delete-partparam/{param_id}','Platform\Frontend\MyAccountController@deletePartparam')->name('delete-partparam');
    //Domain params
    Route::post('add-domainparam/{id}','Platform\Frontend\MyAccountController@domainParam')->name('add-domainparam');
    Route::get('delete-domainparam/{param_id}','Platform\Frontend\MyAccountController@deleteDomainparam')->name('delete-domainparam');
    //Locationparam
    Route::post('add-locationparam/{id}','Platform\Frontend\MyAccountController@locationParam')->name('add-locationparam');
    Route::get('delete-locationparam/{param_id}','Platform\Frontend\MyAccountController@deleteLocationparam')->name('delete-locationparam');
    //Brand param
    Route::post('add-brandparam/{id}','Platform\Frontend\MyAccountController@brandParam')->name('add-brandparam');
    Route::get('delete-brandparam/{param_id}','Platform\Frontend\MyAccountController@deleteBrandparam')->name('delete-brandparam');
    //Continue with account
    
    //Supplier Actions ends
    //Details showing
    Route::get('request-details/{request_url}','Platform\Frontend\RequestsController@requestDetails');
    Route::get('offer-details/{number}','Platform\Frontend\OffersController@offerDetails')->name('offer-details');
    //Details showing ends
    Route::get('send-request/{domain_url}','Platform\Frontend\RequestsController@showMain')->name('send-request');
    Route::get('quick-request/{domain_url}','Platform\Frontend\RequestsController@showQuickForm')->name('quick-request');

    Route::get('local-requests','Platform\Frontend\RequestsController@localRequests')->name('local-requests');

    //Offers routes
    Route::post('send-offer/{request_id}','Platform\Frontend\OffersController@sendStaticOffer')->name('send-offer');
    Route::get('reject-offer/{id}','Platform\Frontend\OffersController@reject')->name('reject-offer');
    Route::get('block-supplier/{id}','Platform\Frontend\OffersController@rejectBlocker')->name('block-supplier');
    //Dinamyc offer 
    Route::post('dinamyc-offer/{request_id}','Platform\Frontend\OffersController@sendDinamyc')->name('dinamyc-offer');
    //Offers routes end
    Route::post('send-command/{id}','Platform\Frontend\CommandsController@sendCommand')->name('send-command');
   

        //Checkout 
        Route::get('checkout/{command_id}','Platform\Frontend\CommandsController@checkOut')->name('checkout');
        Route::get('post-checkout/{command_id}','Platform\Frontend\CommandsController@postCheckout')->name('post-checkout');
		Route::get('user-payments','Platform\Frontend\CommandsController@getPayments')->name('user-payments');
		Route::get('user-incomes','Platform\Frontend\CommandsController@getIncomes')->name('user-incomes');
        //Checkout end
    //Checkout end
});
Route::middleware('is_admin')->group(function(){
    //Admin Routes no settings involved
    Route::get('dashboard','Platform\Backend\DashboardController@dashboard')->name('dashboard');
	Route::get('approve/{id}','Platform\Backend\DashboardController@approve')->name('approve');
    Route::get('icons-review','Platform\Backend\DashboardController@icons')->name('icons-review');
	Route::get('preview/{id}','Platform\Backend\DashboardController@approval')->name('preview');
	Route::get('admin-suppliers','Platform\Backend\DashboardController@suppliers')->name('admin-suppliers');
	Route::get('admin-clients','Platform\Backend\DashboardController@clients')->name('admin-clients');
	Route::get('admin-blocked','Platform\Backend\DashboardController@blocked')->name('admin-blocked');
	Route::get('unapproved','Platform\Backend\DashboardController@unapproved')->name('unapproved');
    //Admin routes no settings involved ends
	Route::get('sort-subcategories/{id}','Platform\Backend\SubcategoriesController@srtCat')->name('sort-subcategories');
    //Admin routes Categories 
    Route::get('categories','Platform\Backend\CategoriesController@show')->name('categories');
    Route::post('sort-categories','Platform\Backend\CategoriesController@sort');
    Route::post('add-category','Platform\Backend\CategoriesController@add')->name('add-category');
    Route::post('edit-category/{id}','Platform\Backend\CategoriesController@edit')->name('edit-category');
    Route::get('delete-category/{id}','Platform\Backend\CategoriesController@destroy')->name('delete-category');
    //Admin routes Categories end

    //Admin subcategories 
    Route::get('subcategories','Platform\Backend\SubcategoriesController@show')->name('subcategories');
    Route::post('add-subcategory','Platform\Backend\SubcategoriesController@add')->name('add-subcategory');
    Route::post('edit-subcategory/{id}','Platform\Backend\SubcategoriesController@edit')->name('edit-subcategory');
    Route::post('sort-subcategories','Platform\Backend\SubcategoriesController@sort');
    Route::get('delete-subcategory/{id}','Platform\Backend\SubcategoriesController@destroy')->name('delete-subcategory');
    //Admin subcategories end
    //Admin Domains 
    Route::get('domains','Platform\Backend\DomainsController@show')->name('domains');
    Route::post('add-domain','Platform\Backend\DomainsController@add')->name('add-domain');
    Route::post('edit-domain/{id}','Platform\Backend\DomainsController@edit')->name('edit-domain');
	Route::get('domain-settings/{id}','Platform\Backend\DomainsController@settings')->name('domain-settings');
    Route::post('sort-domains','Platform\Backend\DomainsController@sort');
    Route::get('delete-domain/{id}','Platform\Backend\DomainsController@destroy')->name('delete-domain');
    //Admin domains ends

    //Admin visual components 
    //Mini boxes 
    Route::get('mini-boxes','Platform\Backend\BoxesController@mini')->name('mini-boxes');
    Route::post('add-minibox','Platform\Backend\BoxesController@addMini')->name('add-minibox');
    Route::post('edit-minibox/{box_id}','Platform\Backend\BoxesController@editMini')->name('edit-minibox');
    //Miniboxes
    Route::get('delete-box/{box_id}','Platform\Backend\BoxesController@destroy')->name('delete-box');
    //Maxi boxes
    Route::get('maxi-boxes','Platform\Backend\BoxesController@maxi')->name('maxi-boxes');
    Route::post('add-maxibox','Platform\Backend\BoxesController@addMaxi')->name('add-maxibox');
    Route::post('edit-maxibox/{box_id}','Platform\Backend\BoxesController@editMaxi')->name('edit-maxibox');

    //Mini boxes ends
    //Slider settings 
    Route::get('sliders','Platform\Backend\SliderController@show')->name('sliders');
    Route::post('add-slide','Platform\Backend\SliderController@add')->name('add-slide');
    Route::post('edit-slide/{slide_id}','Platform\Backend\SliderController@edit')->name('edit-slide');
    Route::get('delete-slide/{slide_id}','Platform\Backend\SliderController@destroy')->name('delete-slide');
    //Slider settings end
    //Banners setting 
    Route::get('banners','Platform\Backend\BannersController@show')->name('banners');
    Route::get('delete-banner/{banner_id}','Platform\Backend\BannersController@destroy')->name('delete-banner');
    Route::post('add-banner','Platform\Backend\BannersController@add')->name('add-banner');

    //Banners setting ends
    //Admin visual components end

    //Admin form constructor 
    Route::get('forms','Platform\Backend\FormsViewController@show')->name('forms');
    Route::get('form/{id}','Platform\Backend\FormsViewController@index')->name('form');
    //OfferForms
    Route::get('offer-forms','Platform\Backend\OfferFormsController@show')->name('offer-forms');
    Route::get('offer-form/{id}','Platform\Backend\OfferFormsController@index')->name('offer-form');

    Route::get('delete-offer-component/{component_id}','Platform\Backend\OfferFormsController@destroyComponent')->name('delete-offer-component');
    Route::get('destroy-offer-components','Platform\Backend\OfferFormsController@destroyComponents')->name('destroy-offer-components');
    Route::post('add-offer-component','Platform\Backend\OfferFormsController@addComponent')->name('add-offer-component');
    Route::post('offer-sorting','Platform\Backend\OfferFormsController@offerComponentSort');
    //offer forms end
    Route::post('sorting','Platform\Backend\FormsViewController@componentSort');
    Route::get('destroy-components','Platform\Backend\FormsViewController@destroyComponents')->name('destroy-components');
    Route::get('delete-component/{component_id}','Platform\Backend\FormsViewController@destroyComponent')->name('delete-component');
    Route::post('add-component','Platform\Backend\FormsViewController@addComponent')->name('add-component');
    Route::post('set-form','Platform\Backend\FormsViewController@setForm')->name('set-form');

    //Admin form constructor ends


    //Admin routes meniu 
    Route::get('menus','Platform\Backend\MenusController@show')->name('menus');
    Route::get('footer-menus','Platform\Backend\MenusController@show')->name('footer-menus');
    Route::post('edit-menu/{id}','Platform\Backend\MenusController@edit')->name('edit-menu');
    Route::post('add-menu','Platform\Backend\MenusController@add')->name('add-menu');
    Route::get('delete-menus','Platform\Backend\MenusController@deleteAllMenus')->name('delete-menus');
    //Admin routes meniu ends

    //Admin pages construction
    Route::get('pages','Platform\Backend\PageConstructorController@showPages')->name('pages');
    Route::get('page-constructor/{id}','Platform\Backend\PageConstructorController@show')->name('page-constructor');
    Route::post('add-section','Platform\Backend\SectionsController@addSection')->name('add-section');
    Route::get('sections-setup/{id}','Platform\Backend\SectionsController@show')->name('sections-setup');
    Route::post('sort-s','Platform\Backend\SectionsController@sectionsSort');
    Route::get('delete-section/{section_id}','Platform\Backend\SectionsController@destroy')->name('delete-section');
    //End Pages connstruction

    //Courier routes 
    Route::get('couriers','Platform\Backend\CouriersController@show')->name('couriers');
    Route::post('edit-courier/{id}','Platform\Backend\CouriersController@update')->name('edit-courier');
    Route::get('delete-courier/{id}','Platform\Backend\CouriersController@destroy')->name('delete-courier');
    Route::post('add-courier','Platform\Backend\CouriersController@store')->name('add-courier');
    //Couriers route ends

    //Admin routes for brands 
    Route::get('brands','Platform\Backend\BrandController@show')->name('brands');
    Route::get('delete-brands','Platform\Backend\BrandController@deleteAll')->name('delete-brands');
    Route::post('add-brand','Platform\Backend\BrandController@store')->name('add-brand');
    Route::post('edit-brand/{id}','Platform\Backend\BrandController@update')->name('edit-brand');
    Route::get('delete-brand/{id}','Platform\Backend\BrandController@delete')->name('delete-brand');
    //Admin brand routes end
	//Regions and cities 
	//Admin Routes Localization 
	Route::get('regions','Platform\Backend\RegionsController@show')->name('regions');
	Route::get('delete-region/{region_id}','Platform\Backend\RegionsController@destroy')->name('delete-region');
	Route::post('edit-region/{region_id}','Platform\Backend\RegionsController@update')->name('edit-region');
	Route::post('add-region','Platform\Backend\RegionsController@add')->name('add-region');
//Cityes
	Route::get('cities','Platform\Backend\CityesController@show')->name('cities');
	Route::get('delete-city/{city_id}','Platform\Backend\CityesController@destroy')->name('delete-city');
	Route::post('edit-city/{city_id}','Platform\Backend\CityesController@update')->name('edit-city');
	Route::post('add-city','Platform\Backend\CityesController@add')->name('add-city');
	//Regions and cities end
	
	Route::get('create-page/{id}','Platform\Backend\MenusController@createPage')->name('create-page');
	Route::get('city_backup','Platform\Backend\OldCityEdit@view')->name('city-backup');
	Route::post('change-city/{city_id}','Platform\Backend\OldCityEdit@edit')->name('change-city');
	Route::get('generalsettings','Platform\Backend\GeneralsettingController@showSettings')->name('generalsettings');
	Route::post('set-platform/{id}','Platform\Backend\GeneralsettingController@setPlatform')->name('set-platform');
	
	//Monitoring routes 
	Route::get('requests','Platform\Backend\GeneralsettingController@showRequests')->name('requests');
	Route::get('commands','Platform\Backend\GeneralsettingController@showCommands')->name('commands');
	Route::get('checkouts','Platform\Backend\GeneralsettingController@showCheckouts')->name('checkouts');
	//Monitoring ends
});
});
Route::get('/{menu_url}','Platform\Frontend\HomeController@dinamycPage');
});
Route::middleware('is_shop')->group(function(){

});

