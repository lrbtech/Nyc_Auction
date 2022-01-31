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


//Clear route cache:
 Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

// Clear application cache:
 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 // Clear view cache:
 Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return 'View cache cleared';
 });
 

// Route::get('test', function () {
//     event(new App\Events\StatusLiked('Someone'));
//     return "Event has been sent!";
// });

Route::get('/404', function(){
	return abort(404);
 });

Route::get('/update_now', 'LiveauctionController@update_v');
Route::get('/', 'PageController@index');
Route::get('/auction', 'PageController@auction');
Route::get('/contact', 'PageController@contact');
Route::get('/about-us', 'PageController@aboutUs');
Route::get('/all-vehicles', 'PageController@allVehicles');
Route::get('/single-vehicles/{id}', 'PageController@singleVehicles');
Route::get('/vehicle-quick-view/{id}', 'PageController@vehicleQuickView');
Route::get('/future-vehicles', 'PageController@futureVehicles');
Route::get('/buy-now-cars', 'PageController@buyNowCars');
Route::get('/auctions', 'PageController@auctions');
Route::get('/view-auctions/{id}', 'PageController@viewAuctions');
Route::get('/live-auctions/{id}', 'PageController@liveAuctions');

Route::get('/get-live-auctions/{id}', 'LiveauctionController@getLiveAuctions');
Route::POST('/save-bid-value', 'LiveauctionController@saveBidValue');

Route::get('/update-vehicle-status', 'LiveauctionController@updateVehicleStatus');
Route::get('/auction-complete', 'LiveauctionController@thanksPage');

Route::get('/get-pre-auctions/{id}', 'PreauctionController@getPreAuctions');
Route::POST('/save-pre-bid-value', 'PreauctionController@savePreBidValue');

Route::get('/live-vehicle-quick-view/{id}', 'PageController@liveVehicleQuickView');
Route::get('/how-it-works', 'PageController@howItWorks');
Route::get('/services', 'PageController@services');
Route::get('/member-registration', 'PageController@memberRegistration');
Route::get('/thanks-page', function(){
	return view('page.thanks_page');
 });
Route::POST('/save-member-registration', 'PageController@saveMemberRegistration');
Route::POST('/home-search', 'PageController@homeSearch');
Route::POST('/vehicle-search', 'PageController@vehicleSearch');

Route::get('/get-brand-car', 'PageController@getBrandCar');

Route::get('/member-fees', 'PageController@memberFees');
Route::get('/terms-and-conditions', 'PageController@termsAndConditions');
Route::get('/compare', 'PageController@compare');

Route::get('/member-create-password/{id}', 'PageController@memberCreatePassword');
Route::POST('/member-update-password', 'PageController@memberUpdatePassword');

Route::POST('/contact-mail', 'PageController@contactMail');


//bonus
Route::POST('/bonus-time', 'LiveauctionController@bonusTime');

Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
	  // Password reset routes
    Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


	Route::get('/dashboard', 'servicesController@dashboard')->name('admin.dashboard');

	//slider
	Route::POST('/save-slider', 'servicesController@saveSlider');
	Route::POST('/update-slider', 'servicesController@updateSlider');
	Route::get('/slider/{id}', 'servicesController@editSlider');
	Route::get('/slider', 'servicesController@Slider');
	Route::get('/slider-delete/{id}', 'servicesController@deleteSlider');

	Route::POST('/update-site-info', 'servicesController@updateSiteInfo');
	Route::get('/site-info', 'servicesController@siteInfo');

	Route::POST('/update-email-temp', 'servicesController@updateEmailTemp');
	Route::get('/email-temp', 'servicesController@EmailTemp');

	Route::POST('/how-it-works', 'servicesController@updatehowItWorks');
	Route::get('/how-it-works', 'servicesController@howItWorks');

	Route::POST('/services', 'servicesController@updateServices');
	Route::get('/services', 'servicesController@services');

	Route::POST('/member-fees', 'servicesController@updateMemberFees');
	Route::get('/member-fees', 'servicesController@memberFees');

	Route::POST('/terms-and-conditions', 'servicesController@updateTermsAndConditions');
	Route::get('/terms-and-conditions', 'servicesController@termsAndConditions');

	//blog
	Route::POST('/save-blog', 'servicesController@saveBlog');
	Route::POST('/update-blog', 'servicesController@updateBlog');
	Route::get('/blog/{id}', 'servicesController@editBlog');
	Route::get('/blog', 'servicesController@Blog');
	Route::get('/blog-delete/{id}', 'servicesController@deleteBlog');

	//brand
	Route::POST('/save-brand', 'VehicleController@saveBrand');
	Route::POST('/update-brand', 'VehicleController@updateBrand');
	Route::get('/edit-brand/{id}', 'VehicleController@editBrand');
	Route::get('/brand', 'VehicleController@Brand');
	Route::get('/brand-delete/{id}', 'VehicleController@deleteBrand');

	//car
	Route::POST('/save-car', 'VehicleController@saveCar');
	Route::POST('/update-car', 'VehicleController@updateCar');
	Route::get('/edit-car/{id}', 'VehicleController@editCar');
	Route::get('/car/{id}', 'VehicleController@Car');
	Route::get('/car-delete/{id}', 'VehicleController@deleteCar');


	//vechiles
	Route::POST('/save-vehicle', 'VehicleController@saveVehicle');
	Route::POST('/update-vehicle', 'VehicleController@updateVehicle');
	Route::get('/edit-vehicle/{id}', 'VehicleController@editVehicle');
	Route::get('/add-vehicle', 'VehicleController@addVehicle');
	Route::get('/view-vehicles', 'VehicleController@viewVehicles');
	Route::get('/vehicle-delete/{id}', 'VehicleController@deleteVehicle');
	Route::get('/vehicle-image-delete/{id}', 'VehicleController@deleteVehicleImage');

	Route::get('/get-brand-car/{id}', 'VehicleController@getBrandCar');

	Route::POST('/import-excel', 'VehicleController@import');
	Route::get('/export-excel', 'VehicleController@export');

	//slider
	Route::POST('/save-vehicle-type', 'VehicleController@saveVehicleType');
	Route::POST('/update-vehicle-type', 'VehicleController@updateVehicleType');
	Route::get('/vehicle-type/{id}', 'VehicleController@editVehicleType');
	Route::get('/vehicle-type', 'VehicleController@VehicleType');
	Route::get('/vehicle-type-delete/{id}', 'VehicleController@deleteVehicleType');


	//member
	Route::POST('/save-member', 'MemberController@saveMember');
	Route::POST('/update-member', 'MemberController@updateMember');
	Route::get('/member/{id}', 'MemberController@editMember');
	Route::get('/member', 'MemberController@Member');
	Route::get('/member-delete/{id}', 'MemberController@deleteMember');

	Route::post('updateUser', 'servicesController@updateUser');
	Route::get('edit-user/{id}', 'servicesController@editUser');

	//user
	Route::POST('/save-user', 'AdminController@saveUser');
	Route::POST('/update-user', 'AdminController@updateUser');
	Route::get('/user/{id}', 'AdminController@editUser');
	Route::get('/user', 'AdminController@User');
	Route::get('/user-delete/{id}', 'AdminController@deleteUser');

	//roles
	Route::POST('/save-role', 'AdminController@saveRole');
	Route::POST('/update-role', 'AdminController@updateRole');
	Route::get('/role/{id}', 'AdminController@editRole');
	Route::get('/role', 'AdminController@Role');
	Route::get('/role-delete/{id}', 'AdminController@deleteRole');

	//notification
	Route::POST('/save-notification', 'NotificationController@saveNotification');
	Route::POST('/update-notification', 'NotificationController@updateNotification');
	Route::get('/notification/{id}', 'NotificationController@editNotification');
	Route::get('/push-notification', 'NotificationController@Notification');
	Route::get('/notification-delete/{id}', 'NotificationController@deleteNotification');

	//auction
	Route::POST('/save-auction', 'AuctionController@saveAuction');
	
	
	Route::POST('/update-auction', 'AuctionController@updateAuction');
	Route::get('/edit-auction/{id}', 'AuctionController@editAuction');
	Route::get('/view-auction', 'AuctionController@viewAuction');
	Route::get('/add-auction', 'AuctionController@addAuction');
	Route::get('/auction-delete/{id}', 'AuctionController@deleteAuction');
	Route::get('/get-auction-vehicle/{id}', 'AuctionController@getAuctionVehicle');
	Route::get('/auction-monitoring/{id}', 'AuctionController@auctionMonitoring');
	Route::get('/auction-winners', 'AuctionController@auctionCompleted');

	Route::get('/update-payment-status/{id}/{id1}', 'AuctionController@updatePaymentStatus');

	Route::get('/get-live-monitoring/{id}', 'AuctionController@getLiveMonitoring');

	Route::POST('/update-vehicle-status', 'LiveauctionController@updateMonitoringVehicleStatus');
	Route::POST('/start-bid', 'LiveauctionController@startBid');
	Route::POST('/next-bid', 'LiveauctionController@nextBid');

	//damage
	Route::POST('/save-damage', 'DamageController@saveDamage');
	Route::POST('/update-damage', 'DamageController@updateDamage');
	Route::get('/damage/{id}', 'DamageController@editDamage');
	Route::get('/damage', 'DamageController@Damage');
	Route::get('/damage-delete/{id}', 'DamageController@deleteDamage');

	Route::get('/deposit-request', 'MemberController@depositRequest');
	Route::get('/update-deposit-request/{id}/{id1}', 'MemberController@updateDepositRequest');

	Route::get('/withdrawal-request', 'MemberController@withdrawalRequest');
	Route::get('/update-withdrawal-request/{id}/{id1}', 'MemberController@updateWithdrawalRequest');
});


Route::group(['prefix' => 'member'],function(){

	Route::get('/dashboard', 'Member\HomeController@dashboard')->name('member.dashboard');
	
	Route::get('/find-vehicles', 'Member\VehicleController@findVehicles');
	Route::get('/single-vehicle/{id}', 'Member\VehicleController@singleVehicles');

	Route::get('/pre-bidding', 'Member\BiddingController@preBidding');
	Route::get('/live-bidding', 'Member\BiddingController@liveBidding');
	Route::get('/winning-cars', 'Member\BiddingController@winningCars');

	Route::get('/get-appointment/{id}', 'Member\BiddingController@getAppointment');
	Route::POST('/update-appointment', 'Member\BiddingController@updateAppointment');

	Route::post('update-settings', 'Member\SettingsController@updateSettings');
	Route::get('settings', 'Member\SettingsController@settings');

	Route::post('save-deposit', 'Member\SettingsController@saveDeposit');
	Route::get('deposit', 'Member\SettingsController@Deposit');
	Route::get('deposit-delete/{id}', 'Member\SettingsController@DepositDelete');

	Route::post('save-withdrawal', 'Member\SettingsController@saveWithdrawal');
	Route::get('withdrawal', 'Member\SettingsController@Withdrawal');
	Route::get('withdrawal-delete/{id}', 'Member\SettingsController@WithdrawalDelete');


	Route::get('document', 'Member\SettingsController@viewDocument');
	Route::POST('update-document', 'Member\SettingsController@updateDocument');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

