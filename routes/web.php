<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    //Routs for admin
    Route::middleware(['admin.checker'])->group(function () {
        Route::get('/admin-dashboard', 'Admin\DashboardController@index');
        Route::get('/category', 'Admin\DataInsertController@indexCategory', function () {
            return view('admin.category');
        });
        Route::get('/city', 'Admin\DataInsertController@indexCity', function () {
            return view('admin.city');
        });
        Route::get('/job-profiles', 'Admin\JobProfileController@index');
        Route::get('/job-profiles-new', 'Admin\JobProfileController@job_profile_new');
        Route::get('/job-profiles-accepted', 'Admin\JobProfileController@job_profile_accepted');
        Route::get('/job-profiles-rejected', 'Admin\JobProfileController@job_profile_rejected');
        Route::get('/job-profiles-disqualified', 'Admin\JobProfileController@job_profile_disqualified');
        Route::get('job-profile-details/{id}', 'Admin\JobProfileController@view_profile_details');
        Route::post('/job-profile-action', 'Admin\JobProfileController@action');
        Route::post('/save-category', 'Admin\DataInsertController@savecategory');
        Route::post('/save-city', 'Admin\DataInsertController@savecity');
        Route::get('/bookings/{request}', 'Admin\BookingController@index');
        Route::get('/bookings-detail/{id}', 'Admin\BookingController@bookingDetails')->name('booking_details');
        Route::post('/booking-action', 'Admin\BookingController@bookingAction');
        Route::post('/bookings-detail-assign', 'Admin\BookingController@assign');
        Route::get('/packages', 'Admin\DataInsertController@indexPackage');
        Route::post('/add-package', 'Admin\DataInsertController@addPackage');
        Route::get('/package-item', 'Admin\DataInsertController@indexPackageItems');
        Route::post('/add-package-item', 'Admin\DataInsertController@addPackageItem');
        Route::get('/delete-package-item/{package_item_id}', 'Admin\DataInsertController@DeletePackageItem');
        Route::get('/edit-package-item/{package_item_id}', 'Admin\DataInsertController@EditPackageItem');
        Route::post('/update-package-item', 'Admin\DataInsertController@UpdatePackageItem');
        Route::get('/edit-package/{package_id}', 'Admin\DataInsertController@EditPackage');
        Route::post('/update-package', 'Admin\DataInsertController@UpdatePackage');
        Route::get('/add-package-to-booking', 'Admin\BookingController@viewPackages');
        Route::get('/edit-package-booking-price', 'Admin\BookingController@edit_package_booking_price');
        Route::get('/view-package-item', 'Admin\BookingController@packageItem');
        Route::get('/add-pkg-to-booking', 'Admin\BookingController@addToBooking');
        Route::post('/add-custom-package', 'Admin\BookingController@addCustomPackage');
        Route::get('/feedbacks', 'Admin\FeedbackController@index');
        Route::get('/feedback-details/{id}', 'Admin\FeedbackController@feedback_details');
        Route::get('/notify', 'Admin\NotifyPhone@index');        
        Route::get('/create-invoice', 'Admin\ExportPdf@index');        
        Route::get('/export-invoice', 'Admin\ExportPdf@create_pdf');        
        Route::get('/invoice', 'Admin\ExportPdf@invoice');        
        Route::get('/autoGenerateInvoice/{id}', 'Admin\ExportPdf@generateInvoice');        
        //Route::get('/submit-jobprofile-form', 'User\DashboardController@job_profile_create');
    });

    //Routs for User

    Route::middleware(['user.checker'])->group(function () {
        //Middleware to chekc if user's phone number is verified or not;
        Route::middleware(['phone.verified.checker'])->group(function () {
           
            Route::get('/free-hair-cut', 'User\FreeHairCut@index');             
            Route::post('/book-free-hair-cut', 'User\FreeHairCut@book'); 
            
        });
        Route::get('/become-a-partner', 'User\JobProfileController@is_created');             
        Route::post('/create_job_profile', 'User\JobProfileController@create_job_profile');
        //Middleware for check if user is a service partner
        Route::middleware(['partner.checker'])->group(function () {
            Route::get('/upload-work-sample', 'User\JobProfileController@upload_work_sample');
            Route::post('/upload-imagee', 'User\JobProfileController@upload_work_sample_image');
            Route::get('/view-profile', 'User\JobProfileController@viewProfile');
            Route::get('/jobs', 'User\JobsController@viewJobs');
            Route::get('/job-details/{id}', 'User\JobsController@JobDetails');       
            Route::post('/job-action', 'User\JobsController@JobAction');
            Route::get('/view_freelance_profile_form/{profile_id}', 'User\JobProfileController@freelance_profile_form_index');
            Route::get('/view_freelance_profile/{profile_id}', 'User\JobProfileController@view_freelance_profile');
            Route::post('/create_freelance_profile', 'User\JobProfileController@create_freelance_profile');

        });
        Route::get('/dashboard', 'User\DashboardController@checkProfileCreated', function() {
            return view('userDashboard.dashboard');
        });
        Route::get('/my-account', 'User\AccountController@index');
        Route::get('/verifyPhone', 'User\PhoneVerifyController@index');
        Route::post('/send-otp', 'User\PhoneVerifyController@sendOTP');
        Route::post('/submit-otp', 'User\PhoneVerifyController@verifyOtp');
        Route::post('/save-aboutus', 'User\AboutusController@save');
        Route::get('/book/{category}', 'User\BookingController@index');                            //show book pahe without selecting packages
        Route::get('/booknow/{category}', 'User\BookingController@bookPageAfterPackage');          //show book page after selecting package
        Route::post('/book', 'User\BookingController@book');                                       //add booking data to database
        Route::post('/bookWithPackage', 'User\BookingController@bookWithPackage');                 //add booking data to database with package
        Route::post('/book-service', 'User\BookingController@book_service');                 //add booking data to database with package
        Route::get('/checkout', 'User\BookingController@getPackages')->name('checkout');
        Route::get('/vehicle-checkout', 'User\BookingController@vehicle_booking_checkout');
        Route::get('/service-checkout', 'User\BookingController@service_checkout');        //book package without pre determined price
        Route::get('/freelance-service-details/{id}', 'User\FreelanceController@service_details');
        Route::post('/book-vehicle', 'User\BookingController@book_vehicle');
        Route::post('/book-freelancer', 'User\FreelanceController@book');
        Route::post('/cancel-booking', 'User\BookingController@CancelBooking');        
        Route::get('/apply-coupon', 'User\CouponController@applyCoupon');
        Route::get('/bookings', 'User\BookingController@bookings');
        Route::get('/booking-details/{id}', 'User\BookingController@bookingDetails'); 
        Route::get('/write-review/{id}', 'User\BookingController@WriteReview');  
        Route::post('/submit-review', 'User\BookingController@SubmitReview');           
        Route::get('/feedback', 'User\FeedbackController@index');
        Route::post('/submit-feedback', 'User\FeedbackController@submit_feedback');
        Route::get('/refer-and-earn', 'User\ReferAndEarnController@index');
        Route::get('/generate-referal-code', 'User\ReferAndEarnController@generateRefCode');

    });


});
Route::get('/select-packages/{category}', 'User\BookingController@selectpackages');
Route::get('/select-package-items/{package_name}/{package_item_id}', 'User\BookingController@selectpackagesitems');
Route::get('/book-service/{category}', 'User\BookingController@select_service');            //book services where prices are not pre determined
Route::get('/freelance-services/{category}', 'User\FreelanceController@index');
Route::get('/cart', 'User\BookingController@evaluateCart');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/daily-quota', function() {
    return view('userDashboard.daily-quota');
});
Route::get('/privacy-policy', function() {
    return view('privacy-policy');
});
Route::get('/terms-and-conditions', function() {
    return view('terms-and-conditions');
});
Route::get('/welcome-mail', function() {
    return view('emails.welcome');
});
Route::get('/send', 'MailController@send');
Route::get('/adminlog', function () {
    return view('auth.registernew');
});
Route::get('/launch-soon', function () {
    return view('launch-soon');
});
Route::get('/coming-soon/{category}', 'User\GetPhNumber@comingSoon');
Route::post('/notify/{category}', 'User\GetPhNumber@getphone');
Route::get('/aboutus', function () {
    return view('about');
});



