<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AdminRuleController;
use App\Http\Controllers\UserRuleController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VMapsController;
use App\Http\Controllers\VMaps2Controller;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AdminCalendarController;
use App\Http\Controllers\AdminNotificationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Auth;


// User Routes
Route::get('/header', [LandingPageController::class, 'landingLogo'])->name('header');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::middleware('admin')->group(function () {
//     // Iba pang mga ruta ng admin
// });
Route::middleware('auth:admin')->group(function () {
        Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');

        Route::get('admin/notification', [AdminNotificationController::class, 'index'])->name('admin.notifications.index');
        Route::get('admin/notification/{id}', [AdminNotificationController::class, 'show'])->name('admin.notification.show');
        Route::post('admin/notification/{id}', [AdminNotificationController::class, 'markAsReadAdmin'])->name('admin.notification.markAsReadAdmin');
        Route::get('admin/notifications/unread-count', [AdminNotificationController::class, 'getUnreadCountAdmin'])->name('admin.notifications.unreadCount');
        Route::get('/admin/unread-notification-count', [AdminNotificationController::class, 'getUnreadNotificationCount'])->name('unreadNotificationCount');

        Route::get('admin/setting', [AdminRuleController::class, 'index'])->name('admin.setting');
        Route::get('admin/setting', [PricesController::class, 'index'])->name('admin.setting');
        Route::patch('admin/reservation/{id}', [ReservationController::class, 'updateStatus'])->name('admin.reservation.updateStatus');
        Route::get('admin/reservation', [ReservationController::class, 'adminindex'])->name('admin.reservation.index');
  Route::get('/admin/appointment', [AppointmentController::class, 'adminIndex'])->name('admin.appointment.index');
    Route::post('/admin/appointment/{id}/status', [AppointmentController::class, 'updateStatus'])->name('admin.appointment.updateStatus');

        Route::get('admin/clients', [AdminController::class, 'showClients'])->name('admin.clients');
        Route::prefix('admin')->group(function () {
            Route::resource('plots', PlotController::class);
        });
        Route::put('admin/plots/{id}', [PlotController::class, 'update'])->name('admin.plots.update');
        Route::get('admin/plots/{id}/edit', [PlotController::class, 'edit'])->name('plots.edit');

        Route::get('admin/vmaps/{block_no}/{plot_number}', [PlotController::class, 'getPlotDetails']);

        Route::get('admin/index', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('admin/analytics', [DashboardController::class, 'analytics'])->name('admin.analytics');


        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('facilities', [FacilityController::class, 'index'])->name('facilities.index');
            Route::post('facilities', [FacilityController::class, 'store'])->name('facilities.store');
            Route::get('facilities/{id}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
            Route::put('facilities/{id}', [FacilityController::class, 'update'])->name('facilities.update');
            Route::delete('facilities/{id}', [FacilityController::class, 'destroy'])->name('facilities.destroy');
        });

        Route::get('/admin/billing', [TransactionController::class, 'index'])->name('admin.billing');
        Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
        Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
        Route::get('/transactions/{status}', [TransactionController::class, 'getTransactions']);
        Route::resource('transactions', TransactionController::class);

//         Route::get('admin/vmaps', [VMaps2Controller::class, 'showMap'])->name('admin.vmaps');
//         Route::post('admin/vmaps', [VMaps2Controller::class, 'store'])->name('admin.vmaps.store');

//         Route::get('admin/vmaps', [VMaps2Controller::class, 'showMap'])->name('admin.vmaps');
// Route::get('admin/vmaps/plot/{block_no}/{plot_number}', [VMaps2Controller::class, 'getPlotDetails']);
Route::prefix('admin')->group(function () {
    Route::get('/vmaps', [VMaps2Controller::class, 'showMapAdmin'])->name('admin.vmaps');
    Route::get('/get-plot-details/{block_no}/{plot_number}', [VMaps2Controller::class, 'getPlotDetailsAdmin'])->name('admin.vmaps.plot-details');
    Route::get('/search-plots', [VMaps2Controller::class, 'searchPlotsAdmin'])->name('admin.vmaps.search-plots');
});
// Route::get('/search-plots', [VMapsController::class, 'searchPlotsAdmin']);

Route::get('admin/vmaps/{block_no}/{plot_number}', [PlotController::class, 'getPlotDetails']);

// Route::get('/get-plot-details/{block_no}/{plot_number}', [VMaps2Controller::class, 'getPlotDetails']);
// Route::get('/search-plots', [VMaps2Controller::class, 'searchPlots']);

    // Route::get('/admin/vmaps', function () {return view('admin.vmaps');});


    // Route::get('admin/vmaps', [VMaps2Controller::class, 'showMap'])->name('admin.vmaps');
    // Route::post('admin/vmaps', [VMaps2Controller::class, 'store'])->name('admin.vmaps.store');

    // Route::get('admin/vmaps', [VMaps2Controller::class, 'showMap'])->name('admin.vmaps');
// Route::get('admin/vmaps/plot/{block_no}/{plot_number}', [VMaps2Controller::class, 'getPlotDetails']);
Route::get('/calendar3', [CalendarController::class, 'adminIndex'])->name('admin.calendar');
// Route
Route::get('admin/calendar', [AdminCalendarController::class, 'index'])->name('admin.calendar');
    Route::get('/admin/google', function () {return view('admin.google');});

// Route::get('/admin/setting', [PlaceController::class, 'editLandingPage'])->name('admin.settings');
// // Route to fetch place details for editing
// Route::get('/admin/get-place/{id}', [PlaceController::class, 'getPlace'])->name('admin.get.place');

// // Route to update place details
// Route::post('/admin/update-place', [PricesController::class, 'update'])->name('admin.update.place');
// Route::put('/admin/update/place/{id}', [PricesController::class, 'update'])->name('admin.update.place');


});

Route::prefix('admin')->name('admin.')->group(function () {
    
   
    Route::get('setting', [PricesController::class, 'index'])->name('settings.index');
    
    // Routes for updating different price settings
    Route::post('update-lawn-lot-price', [PricesController::class, 'updateLawnLotPrice'])->name('update.lawn.lot.price');
    Route::post('update-mausoleum-lot-price', [PricesController::class, 'updateMausoleumLotPrice'])->name('update.mausoleum.lot.price');
    Route::post('update-interment-service', [PricesController::class, 'updateIntermentService'])->name('update.interment.service');
    
    // Route for updating places
    Route::put('update-place/{id}', [PricesController::class, 'updatePlace'])->name('update.place');
    
    // Route to get place details
    Route::get('get-place/{id}', [PricesController::class, 'getPlace'])->name('get.place');
    
    // Route to update landing page
    Route::post('setting/landing-page/update', [LandingPageController::class, 'update'])->name('landing.page.update');

    // Rule Headers Routes
    Route::get('rule_headers', [AdminRuleController::class, 'indexRuleHeader'])->name('rule_headers.index');
    Route::post('rule_headers', [AdminRuleController::class, 'storeRuleHeader'])->name('rule_headers.store');
    Route::put('rule_headers/{id}', [AdminRuleController::class, 'updateRuleHeader'])->name('rule_headers.update');
    Route::delete('rule_headers/{id}', [AdminRuleController::class, 'destroyRuleHeader'])->name('rule_headers.destroy');

    // Flowers Decoration Routes
    Route::get('flowers_decoration', [AdminRuleController::class, 'indexFlowersDecoration'])->name('flowers_decoration.index');
    Route::post('flowers_decoration', [AdminRuleController::class, 'storeFlowersDecoration'])->name('flowers_decoration.store');
    Route::put('flowers_decoration/{id}', [AdminRuleController::class, 'updateFlowersDecoration'])->name('flowers_decoration.update');
    Route::delete('flowers_decoration/{id}', [AdminRuleController::class, 'destroyFlowersDecoration'])->name('flowers_decoration.destroy');

    // Reverence Safety Routes
    Route::get('reverence_safety', [AdminRuleController::class, 'indexReverenceSafety'])->name('reverence_safety.index');
    Route::post('reverence_safety', [AdminRuleController::class, 'storeReverenceSafety'])->name('reverence_safety.store');
    Route::put('reverence_safety/{id}', [AdminRuleController::class, 'updateReverenceSafety'])->name('reverence_safety.update');
    Route::delete('reverence_safety/{id}', [AdminRuleController::class, 'destroyReverenceSafety'])->name('reverence_safety.destroy');

    Route::get('rules/flowers_decoration', [AdminRuleController::class, 'indexFlowersDecoration'])->name('flowers_decoration.index');

});


// User routes
Route::middleware('auth')->group(function () {
    Route::get('/user/pricing', [PricesController::class, 'display'])->name('user.pricing');
// Route::resource('/', PlaceController::class);
Route::get('user/index', [PlaceController::class, 'index'])->name('user.index');
Route::get('user', [PlaceController::class, 'index'])->name('user');

Route::resource('user/rules', UserRuleController::class)->only(['index']);
    Route::post('/user/reservation', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('user/reservation', [ReservationController::class, 'index'])->name('reservations.index');
    Route::patch('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');
Route::get('/user/appointment', function () { return view('user.appointment'); });
Route::get('/user/pricing', function () { return view('user.pricing'); });


Route::get('/user/calendar', function () { return view('user.calendar'); });
Route::get('/user/analytics', [DashboardController::class, 'analytics2'])->name('user.analytics');

Route::get('/user/profile', function () { return view('user.profile'); });
Route::get('/user/billing', function () { return view('user.billing'); });
Route::get('/user/gmaps', function () { return view('user.gmaps'); });

Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
Route::post('/profile/delete', [ProfileController::class, 'deleteAccount'])->name('profile.delete');

// Show all notifications for the current user
Route::get('user/notification', [NotificationController::class, 'index']);
Route::get('user/notification/{id}', [NotificationController::class, 'show']);

Route::post('/calendar/store', [CalendarController::class, 'storeAppointment'])->name('calendar.store');
Route::get('/user/vmaps1', [VMapsController::class, 'showMap1'])->name('user.vmaps1');

// Route::post('user/vmaps1', [VMapsController::class, 'store'])->name('admin.vmaps.store');

Route::get('user/vmaps1/plot/{block_no}/{plot_number}', [VMapsController::class, 'getPlotDetails']);


// Route::get('user/vmaps2', [VMapsController::class, 'showMap'])->name('admin.vmaps2');
// Route::post('user/vmaps2', [VMapsController::class, 'store'])->name('admin.vmaps2.store');

// Route::get('user/vmaps2', [VMapsController::class, 'showMap'])->name('admin.vmaps2');
// Route::get('user/vmaps2/plot/{block_no}/{plot_number}', [VMapsController::class, 'getPlotDetails']);

Route::get('user/vmaps2/{block_no}/{plot_number}', [PlotController::class, 'getPlotDetails']);
Route::get('/get-plot-details/{block_no}/{plot_number}', [VMapsController::class, 'getPlotDetails']);
Route::get('/search-plots', [VMapsController::class, 'searchPlots']);





Route::get('user/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
Route::post('user/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::post('user/appointment/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
// Mark notification as read
Route::post('user/notification/{id}', [NotificationController::class, 'markAsRead']);
Route::get('/user/notifications/unread-count', [NotificationController::class, 'getUnreadCount'])->name('notifications.unreadCount');

Route::get('/user/billing', [TransactionController::class, 'billing'])->name('user.billing');

Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::get('user/calendar2', [CalendarController::class, 'index'])->name('calendar2.index');
Route::prefix('calendar2')->group(function () {
    // Route to handle appointment storage
    Route::post('/store-appointment', [CalendarController::class, 'storeAppointment'])->name('calendar.storeAppointment');

    // Route to handle reservation storage
    Route::post('/store-reservation', [CalendarController::class, 'storeReservation'])->name('calendar.storeReservation');
});
});
Route::post('/appointments/store', [CalendarController::class, 'storeAppointment'])->name('appointments.store');
Route::post('/reservations/store', [CalendarController::class, 'storeReservation'])->name('reservations.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Auth::routes(['reset' => true]);
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('login', [AuthController::class, 'login']);
Route::get('/', function () {
    return view('welcome');
});
