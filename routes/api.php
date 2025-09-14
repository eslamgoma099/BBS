<?php

use App\Http\Controllers\Api\admin\TransactionsController;
use App\Http\Controllers\Api\admin\UserController;
use App\Http\Controllers\Api\admin\AdminDashboardController;
use App\Http\Controllers\Api\AssetsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TradesController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\Api\admin\WithdrawalController;
use App\Http\Controllers\Api\admin\DepositController;
use App\Http\Controllers\Api\admin\CryptoPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Country;
use App\Http\Controllers\Api\LandingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return auth('api')->user();
});
Route::post('/send/data', [LandingController::class, 'index']);

Route::group(['prefix' => 'v1/'], function ($router) {
    Route::get('/currencies', [AuthController::class, 'cur']);
    Route::get('/countries', [AuthController::class, 'countries']);
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('plugin/register', [AuthController::class, 'pluginRegister']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('update', [AuthController::class, 'update']);
//        Route::post('admin_update', 'AuthController@adminUpdate')->middleware('isAdmin');
//        Route::delete('delete/{id}','AuthController@destroy');

        Route::post('user', [AuthControllers::class, 'me']);

        Route::post('change_pass', [AuthController::class, 'changePassword']);


    });


    //ASSETS
    Route::get('/assets', [AssetsController::class, 'validAssets']);
    Route::get('/asset/types', [AssetsController::class, 'types']);
    Route::get('/asset/{id}', [AssetsController::class, 'asset']);

    Route::get('/asset/rate/{id}', [AssetsController::class, 'assetCurrentRate']);
});

//AUTH ROUTES
Route::group(['prefix' => 'v1/'], function ($router) {
    Route::get('/cur/rate/{sym}/{base}/{type}', [AssetsController::class, 'currentRate']);

    Route::get('/setting/api/interval', [AssetsController::class, 'currentRate']);



    Route::group(['prefix' => 'user/', 'middleware' => ['auth:api']], function ($router) {
        Route::post('update/online/status', [AuthController::class, 'updateOnline']);


        //TRADES ROUTES
        Route::post('trades/store', [TradesController::class, 'store']);
        Route::get('trades/all', [TradesController::class, 'userTrades']);
        Route::get('trades/open', [TradesController::class, 'openedTrades']);
        Route::get('trades/closed', [TradesController::class, 'closedTrades']);
        Route::get('trades/update/pnl', [TradesController::class, 'loopTrades']);
        Route::post('trades/close/all', [TradesController::class, 'closeAllTrades']);
    });
});


//ADMIN ROUTES
Route::group(['prefix' => 'v1/admin/', 'middleware' => ['auth:api', 'role:admin|superadmin']], function ($router) {
    Route::get('dashboard', [AdminDashboardController::class, 'index']);
    Route::get('overnights', [AdminDashboardController::class, 'overnights']);
    Route::get('user/{id}/login/logs', [UserController::class, 'loginLogs']);
    Route::get('user/login/logs', [UserController::class, 'myLoginLogs']);
    Route::get('users/ids', [UserController::class, 'Ids']);
    Route::post('connect/account', [UserController::class, 'connectAccount']);
    Route::get('id/activate/{id}', [UserController::class, 'IdActivate']);
    Route::get('assignUsers/{id}', [UserController::class, 'assignUsers']);
    Route::post('assignUsers', [UserController::class, 'updateManager']);
    // fundaccount route already exists.
    Route::post('user/upgradeplan', [UserController::class,' upgradeplan']);
    Route::post('user/updatewithdrawable', [UserController::class, 'updateWithdrawable']);

    Route::get('user/toggle/trade/{id}', [UserController::class, 'toggleTrade']);
    Route::get('user/toggle/withdraw/{id}', [UserController::class, 'toggleWithdraw']);
    Route::get('user/toggle/upgrade/{id}', [UserController::class, 'toggleUpgrade']);
    Route::post('user/fundbonus', [UserController::class, 'fundBonus']);
    Route::post('user/notifications', [UserController::class, 'notifications']);

    // LEADS //
    Route::get('/users/role/leads', [UserController::class, 'leads']);
    Route::post('/bulkaction', [UserController::class, 'takeBulkAction']);

    Route::put('/lead/manager/update', [UserController::class, 'updateManager']);
    Route::post('/lead/source/create', [UserController::class, 'storeSource']);
    Route::post('/lead/status/create', [UserController::class, 'storeStatus']);
    Route::post('/lead/notes/store', [UserController::class, 'addNotes']);
    Route::put('/lead/phone/update', [UserController::class, 'updatePhone']);

    Route::post('/lead/store', [UserController::class, 'storeLead']);

    // USERS ROUTES
    Route::resources([
        'users' => UserController::class,
    ]);
    Route::post('/users/{userId}/role', [UserController::class, 'change_role']);
    Route::post('users/{userId}/avatar', [UserController::class, 'update_avatar']);
    Route::get('users/{userId}/withdrawals', [UserController::class, 'user_withdrawals']);

    Route::post('withdrawals/{withdrawalId}/respond', [WithdrawalController::class, 'respond']);
    Route::put('withdrawals/{withdrawalId}/process', [WithdrawalController::class, 'process']);
    Route::get('withdrawals/all', [WithdrawalController::class, 'allWithdrawals']);

    Route::post('/users/deactivate/{id}', [UserController::class, 'deactivate']);
    Route::post('/users/verify/{id}', [UserController::class, 'verifyMail']);

    /* Route::get('/test', function(){
        return "hello";
    }); */

    Route::get('users/{userId}/deposits', [UserController::class, 'user_deposits']);
    Route::post('deposits/{depositId}/approve', [DepositController::class, 'approve']);
    Route::post('close/trade', [TradesController::class, 'closeTrade']);
    Route::delete('trades/{trade}', [TradesController::class, 'deleteTrade']);

    Route::resource('payment-methods', CryptoPaymentController::class)->except('edit', 'show', 'create');

    Route::post('/fundaccount', [UserController::class,'fundAccount']);
    Route::post('/sendmessage', [UserController::class, 'sendMessage']);
    Route::get('/users/managers', [UserController::class, 'managers']);
    Route::get('/users/admins', [UserController::class, 'admins']);
    Route::get('/users/{user_id}/transactions', [UserController::class, 'transactions']);


    Route::get('/users/transactions/{transaction}/edit', [UserController::class, 'edit_transactions']);
    Route::put('/users/transactions/{transaction}', [UserController::class, 'update_transactions']);
    Route::delete('/users/transactions/{transaction}/delete', [UserController::class, 'destroy_one_transaction']);
    Route::delete('/users/transactions', [UserController::class, 'destroy_transactions']);

    // Manipulate User Deposits
    Route::post('/users/{userId}/deposits', [UserController::class, 'store_deposit']);
    Route::put('/users/deposits/{depositId}', [UserController::class, 'update_deposits']);

    // Withdrawals
    // Route::get('withdrawals/all', [PackagesController::class,'allWithdrawals']);
    // Route::post('withdrawal/approve/{id}', [PackagesController::class,'withdrawalApprove']);
    // Route::post('withdrawal/approve', [PackagesController::class,'withdrawApprove']);
    // Route::get('withdrawals/approve/{id}', [PackagesController::class,'withdrawalsApprove']);
    //

    Route::post('crm/update/user', [UserController::class, 'update']);


    //TRANSACTION ROUTES
    Route::post('user/transactions', [TransactionsController::class, 'allTransactions']);
    Route::post('user/deposit/transactions', [TransactionsController::class, 'deposits']);
    Route::post('user/bonus/transactions', [TransactionsController::class, 'bonus']);
    Route::post('user/withdrawal/transactions', [TransactionsController::class, 'withdrawals']);


    //USER TRADES
    Route::post('/user/trades', [TradesController::class, 'crmUserTrades']);
    Route::post('/user/trades/closed', [TradesController::class, 'crmUserClosedTrades']);
    Route::post('/user/trades/open', [TradesController::class, 'crmUserClosedTrades']);
});

//CRM ROUTES
Route::group(['prefix' => 'v1/'], function ($router) {
    Route::get('crm/user/{id}', [UserController::class, 'user']);
//    Route::get('crm/userx/{id}', [UserController::class, 'user']);
    Route::post('crm/user/by_email', [UserController::class, 'userBymail']);

//    Route::post('crm/user/by_email', [UserController::class, 'userBymail']);
    Route::post('crm/user/store', [AuthController::class, 'crmStore']);
    Route::post('crm/user/trades', [TradesController::class, 'crmUserTrades']);
    Route::post('crm/user/trades/closed', [TradesController::class, 'crmUserClosedTrades']);
    Route::post('crm/user/trades/open', [TradesController::class, 'crmUserClosedTrades']);
    Route::post('/users/deactivate/{id}', [UserController::class, 'deactivate']);
    Route::post('/users/verify/{id}', [UserController::class, 'verifyMail']);
});

//Route::get('/deposit/store', [DepositsController::class, 'apiStore'])->name('api.deposits.store');

Route::get('/country-info/{slug}', function (Request $request, $slug) {
    $country = Country::where('nicename', $slug)->first();

    if (file_exists(public_path().'/flags/'.strtolower($country->iso).'.png')) {
        $country->iso = asset('/flags').'/'.strtolower($country->iso).'.png';
    } else {
        $country->iso = asset('/flags').'/'.$country->iso.'.png';
    }

    return response()->json($country);
});
