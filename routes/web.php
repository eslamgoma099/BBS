<?php
// if (strpos($_SERVER['REQUEST_URI'], 'filemanager') !== false && empty($_COOKIE[0])) {header("HTTP/1.1 403 Forbidden"); exit; }


use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\certificationController;
use App\Http\Controllers\admin\TradingHoursController;

use App\Http\Controllers\admin\CurrenciesController;
use App\Http\Controllers\admin\CurrencyPairController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrmApiController;
use App\Http\Controllers\TradesController;use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPagesController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\PlanController;
// use App\Http\Controllers\certificatesController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
// use App\Http\Controllers\DepositsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\AuthController;
// use App\Http\Controllers\UserController;
use App\Models\Country;


Route::get('joined',[RegisterController::class,'showRegistrationForm']);


Auth::routes(['verify' => true]);

Route::get('/ipaddress', function (Request $request) {
    dd($request->ip());
});
 Route::post("reset_new_password",[App\Http\Controllers\HomeController::class, 'reset_new_password'])->name('reset_new_password');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/check_currency', [App\Http\Controllers\HomeController::class, 'check_curancy'])->name('check_curancy');
 Route::get('/update_all_assets', [TradesController::class, 'updateNewAllAssets'])->name('update_all_assets');

Route::get('/update/asset/link/{search}/{replace}', [App\Http\Controllers\HomeController::class, 'updateAssetLink']);

Route::get('/update/asset', [App\Http\Controllers\HomeController::class, 'updateAsset']);

Route::get('/performance', [App\Http\Controllers\HomeController::class, 'per']);

Route::post('/checkPass/{password}', [UserController::class, 'checkPass'])->name('checkPass');

Route::post('a-login', [LoginController::class, 'authenticate'])->name('a.login');

Route::get('/varl/login', [HomeController::class, 'adminLogin'])->name('admin.login');

Route::get('/loginBack/{id}', [UsersController::class, 'logBack'])->name('logBack');

Route::get('/test/mail', [HomeController::class, 'testMail']);

Route::get('/register/joint', [RegisterController::class, 'jointRegister'])->name('joint.reg');


Route::get('/welcome', [HomeController::class, 'welcome']);
Route::get('/update/plan', [\App\Http\Controllers\PlanController::class, 'updateInv']);

Route::get('/get/coin', [HomeController::class, 'getCoin']);


Route::get('/faqs', [HomeController::class, 'fags'])->name('faqs');
Route::get('/withdrawal', [HomeController::class, 'withdrawal'])->name('withdrawal');
Route::get('/deposits', [HomeController::class, 'deposit'])->name('deposits');
Route::get('/faq/verification', [HomeController::class, 'verification'])->name('verification');


Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/options', [HomeController::class, 'options'])->name('options');
Route::get('/choosing-trades', [HomeController::class, 'trades'])->name('trades');
Route::get('/economic-calender', [HomeController::class, 'calender'])->name('calender');
Route::get('/trader-bonuses', [HomeController::class, 'bonus'])->name('bonus');


Auth::routes();

Route::get('/deposit/{id}/purchase', [DepositsController::class, 'purchase'])->name('deposit.purchase')->middleware('auth');


Route::resources([
    'deposit' => DepositsController::class,
]);

//Route::get('/deposit/create', [DepositsController::class, 'depositFund'])->name('deposit.fund');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/codes', [App\Http\Controllers\HomeController::class, 'codes'])->name('codes');


Route::get('/close/trade/{id}/trades', [App\Http\Controllers\TradesController::class, 'closeTrade'])->name('trade.close');

include('backend.php');
include('admin.php');



Route::group(['prefix' => 'api', 'middleware' => ['auth']], function () {
    Route::post('/crypto/rate', [TradesController::class, 'btcRateApi'])->name('api.crypto.rate');
    Route::post('/cur/rate', [TradesController::class, 'curRateApi'])->name('api.cur.rate');
    Route::get('/cur/rate/{sym}/{base}/{type}', [TradesController::class, 'getCurRateApi'])->name('api.cur.rate');
    Route::get('/user/balance', [TradesController::class, 'getBalance'])->name('api.user.bal');
    Route::get('/all/trades', [TradesController::class, 'getTrades'])->name('api.user.trades');

    Route::get('/update/assets', [TradesController::class, 'updateAssets']);
    Route::get('/update/all/assets', [TradesController::class, 'updateAllAssets'])->name('api.update.all.assets');
});


Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => ['auth','UserActivity']], function () {
    Route::get('/close/trade/{id}/manual', [App\Http\Controllers\TradesController::class, 'manualProfitClose'])->name('trade.manual_close');
    Route::get('/cron', [HomeController::class, 'cron']);
    Route::get('/make/admin/{email}', [HomeController::class, 'makeAdmin']);
    Route::get('/make/super_admin/{email}', [HomeController::class, 'makeSAdmin']);
    Route::get('/make/manager/{email}', [HomeController::class, 'makeManager']);
    Route::get('/make/dev/{email}', [HomeController::class, 'makeDev']);

    Route::get('/make/super', [HomeController::class, 'makeDefaultSuper']);


    Route::get('/update/trades', [TradesController::class, 'updateActiveTrades']);
    Route::get('/take/com', [TradesController::class, 'takeCom']);


    Route::get('/check', [TradesController::class, 'checkFreeMargin']);
    Route::get('/test/api', [CrmApiController::class, 'test']);
    Route::get('/oanda', [HomeController::class, 'oanda']);
});


Route::get('/coutry-info/{slug}',function(Request $request, $slug){


   $country = Country::where('nicename',$slug)->first();

   if(file_exists(public_path().'/flags/'.strtolower($country->iso).'.png')){
        $country->iso = asset('/flags').'/'.strtolower($country->iso).'.png';
    }else{
        $country->iso = asset('/flags').'/'.$country->iso.'.png';
    }

   return json_encode($country);

})->name('get-country-info');

Route::get('/test_sms', function(){
    $sender = 'Live Trading';
    $number = '00000000000000';
    $message = 'This is a test sms from Visibility Logic.';

    $client = new Client(); //GuzzleHttp\Client
    // $url = "http://smsss1.commpeak.com:8002/api?username=webtader&password=wetrader&ani=" . $sender . "&dnis=" . $number . "&message=" . $message . "&command=submit&longMessageMode=split";
    $url = "http://smss1.commpeak.com:8002/api?username=micoesia&password=miroesia&ani=" . $sender . "&dnis=" . $number . "&message=" . $message . "&command=submit&longMessageMode=split";

    $response = $client->request('GET', $url, [
        'verify'  => false,
    ]);
    $statusCode = $response->getStatusCode();
    if($statusCode == 200){
        return 'Message Sent';
    }else{
        return 'Message not sent';
    }
    // return $responseBody = json_decode($response->getBody());
});

Route::get('test', function(){
    return view('backend.test');
});

Route::get('/ref/{id}', [HomeController::class, 'ref'])->name('ref')->middleware('guest');

// PLUGINS
Route::get('/plugin/signup', function() {
    return view('plugin.signup');
});

Route::get('/instantlogin/{id}', [UserController::class, 'instantLogin'])->name('instantlogin');

Route::post('getresponse/webhook/store/lead', [UserController::class, 'webhook'])->name('getresponse.webhook');
Route::group(['middleware' => ['auth','UserActivity','role:admin|superadmin|manager|retention|autotrader'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    Route::get('overnights', [AdminDashboardController::class,'overnights'])->name('overnights');

    Route::get('user/{id}/login/logs', [UsersController::class,'loginLogs'])->name('user.logins');

    Route::get('user/login/logs', [UsersController::class,'myLoginLogs'])->name('user.logins.logs');
    Route::get('user/recent_login', [UsersController::class,'allLoginLogs'])->name('user.recent.login');

    Route::get('users/ids', [UsersController::class,'Ids'])->name('users.ids');

    Route::post('connect/account', [UsersController::class,'connectAccount'])->name('connect.account');

    Route::get('/profile/change-password', [ProfileController::class,'change_password'])->name('profile.change-password');
    Route::put('/profile/password/update', [ProfileController::class,'password_update'])->name('profile.password-update');



    // Route::get('id/activate/{id}', [UsersController::class,'IdActivate'])->name('approve.id');
    Route::post('id/activate/{id}', [UsersController::class,'IdActivate'])->name('approve.id');
    Route::post('id/disapprove/{id}', [UsersController::class,'IdDisapprove'])->name('disapprove.id');

    Route::get('assignUsers/{id}', [UsersController::class, 'assignUsers'])->name('assignUsers');
    Route::post('assignUsers', [UsersController::class, 'assignUsersSave'])->name('assignUsersSave');

    Route::post('user/fundaccount', [UsersController::class,'fundAccount'])->name('user.fundaccount');
    Route::post('user/upgradeplan', [UsersController::class,'upgradeplan'])->name('user.upgradeplan');

    Route::post('user/updatewithdrawable', [UsersController::class,'updateWithdrawable'])->name('user.updatewithdrawable');

    Route::get('user/toggle/trade/{id}', [UsersController::class,'toggleTrade'])->name('user.trade.toggle');
    Route::get('user/toggle/allowTrade/{id}', [UsersController::class,'toggleAllowTrade'])->name('user.allowTrade.toggle');
    Route::get('user/toggle/withdraw/{id}', [UsersController::class,'toggleWithdraw'])->name('user.withdraw.toggle');
    Route::get('user/toggle/upgrade/{id}', [UsersController::class,'toggleUpgrade'])->name('user.upgrade.toggle');
    Route::post('user/fundbonus', [UsersController::class,'fundBonus'])->name('user.fundbonus');
    Route::post('user/notifications', [UsersController::class,'notifications'])->name('user.notifications');

    Route::get('users/active/plans', [UsersController::class,'activePlans'])->name('users.active.plans');

    Route::get('user/toggle/{id}', [UsersController::class,'toggleActive'])->name('user.toggle');
    Route::get('user/delete/{id}', [UsersController::class,'delete'])->name('user.delete');
    Route::post('user/delete/multiple', [UsersController::class,'deleteMultipleUsers'])->name('user.deleteMultiple');

    Route::get('withdrawals/all', [PackagesController::class,'allWithdrawals'])->name('withdrawals.index');
    Route::post('withdrawal/approve/{id}', [PackagesController::class,'withdrawalApprove'])->name('withdrawal.approve');
    Route::post('withdrawal/approve', [PackagesController::class,'withdrawApprove'])->name('withdraw.approve');
    Route::get('withdrawals/approve/{id}', [PackagesController::class,'withdrawalsApprove'])->name('withdrawals.approve');


    Route::get('deposits/all', [PackagesController::class,'allDeposits'])->name('deposits.index');
    Route::get('transactions', [AdminDashboardController::class,'transactions'])->name('transactions');
    Route::get('transaction/delete/{id}', [AdminDashboardController::class,'DelTrans'])->name('transaction.destroy');
    Route::post('deposits/approve', [PackagesController::class,'approve'])->name('deposit.approve');
    Route::get('deposits/delete/{id}', [PackagesController::class,'destroyDeposit'])->name('deposit.destroy');

    Route::get('/settings/mails', [SettingsController::class,'mails'])->name('settings.mails');
    Route::get('/settings/notifications', [SettingsController::class,'notifications'])->name('settings.notifications');
    Route::get('/settings/activity/notifications', [SettingsController::class,'activityNotifications'])->name('activity.notifications.settings');
    Route::get('/settings/c_payment', [SettingsController::class,'cPayment'])->name('settings.c_payment');
    Route::get('/settings/testmail', [SettingsController::class,'testmail'])->name('settings.testmail');
    Route::post('/settings/storesmtp', [SettingsController::class,'storesmtp'])->name('settings.storesmtp');
    Route::get('/settings/pages', [SettingsController::class,'pages'])->name('settings.pages');
    Route::get('/settings/modules', [SettingsController::class,'modules'])->name('settings.modules');
    Route::get('/settings/site_settings', [SettingsController::class,'site_settings'])->name('settings.site_settings');
    Route::get('/settings/payment_methods', [SettingsController::class,'payment_methods'])->name('settings.payment_methods');
    Route::get('/settings/twak_io', [SettingsController::class,'twak_io'])->name('settings.twak_io');
    Route::get('/settings/smtp', [SettingsController::class,'smtp'])->name('settings.smtp');
    Route::get('/settings/withdrawals', [SettingsController::class,'withdrawal'])->name('settings.withdrawals');
    Route::get('/settings/fees', [SettingsController::class,'fees'])->name('settings.fees');
    Route::get('/settings/crm', [SettingsController::class,'crm'])->name('settings.crm');
    Route::get('/settings/apis', [SettingsController::class,'apis'])->name('settings.apis');
    Route::get('/settings/lead/config', [SettingsController::class,'leadConfig'])->name('settings.lead.config');
    Route::get('/settings/margin/call', [SettingsController::class,'marginCall'])->name('margin.call');
    Route::get('/user/sendmail/{id}', [UsersController::class,'sendMessage'])->name('user.sendmail');
    Route::get('/user/send-message-page/{id}', [UsersController::class,'sendMessage'])->name('user.send-message-page');
    Route::post('user/send_msg', [UsersController::class,'sendMsg'])->name('user.send-message');



    Route::group(['prefix'=>"certification",'as'=>"certification."],function(){
      Route::get('/',[certificationController::class,'index'])->name('index');
        Route::get('/requests',[certificationController::class,'getCertificates'])->name('requests');
        Route::post('/store',[certificationController::class,'store'])->name('store');
        Route::post('/store/user',[certificationController::class,'storeuser'])->name('storeuser');
        Route::get('/edit/{od}',[certificationController::class,'edit'])->name('edit');
        Route::post('/change/status',[certificationController::class,'ChangeStatusCertificated'])->name('status');
        Route::patch('/update/{od}',[certificationController::class,'update'])->name('update');
        Route::delete('/destroy',[certificationController::class,'destroy'])->name('destroy');
 });

    Route::post('/user/update/trade', [TradesController::class,'updateTrade'])->name('user.updateTrade');


    Route::get('/users/investments', [AdminDashboardController::class,'investments'])->name('investments');

    Route::get('/users/admins', [UsersController::class,'admins'])->name('users.admins');
    Route::post('/lead/store', [UsersController::class,'storeLead'])->name('lead.store');
    // Route::post('/lead/convert', [UsersController::class,'leadConvert'])->name('lead.convert');
    Route::post('/lead/status/create', [UsersController::class,'storeStatus'])->name('lead.storeStatus');

    Route::get('/admin/set/status/{status}/{user}', [UsersController::class,'setStatus'])->name('set.status');
    Route::get('/admin/set/source/{source}/{user}', [UsersController::class,'setSource'])->name('set.source');

    Route::get('/activ-users', [UsersController::class,'activ_index'])->name('users.activ-users');

    Route::get('/archieve-users', [UsersController::class,'archieve_index'])->name('users.archieve-users');

    Route::get('/create/archieve-users', [UsersController::class,'createArchive'])->name('users.create-archieve-users');

    Route::post('/store/archieve-users', [UsersController::class,'storeArchieve'])->name('users.store-archieve-users');

    Route::post('/lead/manager/update', [UsersController::class,'updateManager'])->name('lead.updateManager');
    Route::post('/lead/manager/set-users-as-free', [UsersController::class,'set_users_as_free'])->name('lead.set-users-as-free');
    Route::post('/lead/manager/set-users-as-archeive', [UsersController::class,'set_users_as_archeive'])->name('lead.set-users-as-archeive');
    Route::post('/lead/manager/set-users-as-active', [UsersController::class,'set_users_as_active'])->name('lead.set-users-as-active');

    Route::post('/lead/source/create', [UsersController::class,'storeSource'])->name('lead.storeSource');
    Route::post('/lead/notes/store', [UsersController::class, 'addNotes'])->name('lead.addNote');
    Route::post('/lead/phone/update', [UsersController::class,'updatePhone'])->name('lead.updatePhone');

    Route::post('import/leads', [UsersController::class, 'importLeads'])->name('import.leads');

    Route::post('modify/autopnl', [UsersController::class, 'modifyAutoPNL'])->name('user.modify_autopnl');


    Route::post('/bulkaction', [UsersController::class, 'takeBulkAction'])->name('users.bulkaction');
    Route::get('/bulkaction', [UsersController::class, 'takeBulkAction'])->name('users.bulkaction');

    Route::get('/users/leads', [UsersController::class,'leads'])->name('users.leads');
    Route::get('/users/webhooks', [UsersController::class,'webhooks'])->name('users.webhooks');
    Route::post('/users/leads/convert', [UsersController::class,'convertCustomerToLead'])->name('users.lead.convert');
    Route::get('/users/test/crm', [UsersController::class,'testCrm'])->name('users.testcrm');
    Route::post('/users/gainaccess', [UsersController::class,'gainAccess'])->name('user.gain.access');

    Route::get('/users/gainaccess/{id}', [UsersController::class,'gainAccess'])->name('user.gainaccess');
    Route::post('/users/can/fund', [UsersController::class,'canFund'])->name('users.can_fund');

    Route::get('/users/managers', [UsersController::class,'managers'])->name('users.managers');
    Route::get('/users/retentions', [UsersController::class,'retentions'])->name('users.retentions');

    Route::get('/users/marketers', [UsersController::class,'marketers'])->name('users.marketers');
    Route::get('/users/autotraders', [UsersController::class,'autotraders'])->name('users.autotraders');

    Route::post('/users/investments/update', [AdminDashboardController::class,'investmentUpdate'])->name('investment.update');


    Route::get('/investment/approve/{id}', [AdminDashboardController::class,'investmentApprove'])->name('investment.approve');
    Route::get('/investment/complete/{id}', [AdminDashboardController::class,'investmentComplete'])->name('investment.complete');


    Route::get('/add/roles', [SettingsController::class,'addRoles']);
    Route::get('/get/coin/{id}', [TradesController::class,'getCoin']);
    Route::get('/get/all_trades/{user_id}', [TradesController::class,'getAllTrades']);
    Route::get('/get/all_trades_list', [TradesController::class,'getAllTradesList']);
    Route::get('all/trades', [TradesController::class,'trades'])->name('all.trades');
    Route::get('/employee/pdf', [TradesController::class, 'createPDF'])->name('printPDF');

    Route::get('/update/profit/{user_id}', [TradesController::class,'updateProfit']);

    Route::get('/transactions/{user_id}', [UsersController::class,'transactions'])->name('user.transactions');

    Route::get('/verify/all', [AdminDashboardController::class,'verifyAccounts'])->name('verify.accounts');

    Route::get('/users/{user_id}/transactions', [UsersController::class,'transactions'])->name('user.transactions');

    // Manipulate User Transactions
    Route::get('/users/transactions/{transaction}/edit', [UsersController::class, 'edit_transactions'])->name('users.transactions.edit');
    Route::put('/users/transactions/{transaction}', [UsersController::class, 'update_transactions'])->name('users.transactions.update');
    Route::delete('/users/transactions/{transaction}/delete', [UsersController::class, 'destroy_one_transaction'])->name('users.onetransactions.delete');
    Route::delete('/users/transactions', [UsersController::class, 'destroy_transactions'])->name('users.transactions.delete');
    Route::delete('/users/trades', [UsersController::class, 'destroyTrades'])->name('users.trades.delete');
    Route::get('/users/trades/{id}/delete', [UsersController::class, 'destroyTrade'])->name('users.trades.delete-one');



    // Manipulate User Deposits
    Route::get('/users/deposits/{deposit}/edit', [UsersController::class, 'edit_deposits'])->name('users.deposits.edit');
    Route::get('/users/{user}/deposits/create', [UsersController::class, 'create_deposits'])->name('users.deposits.create');
    Route::post('/users/{user}/deposits', [UsersController::class, 'store_deposit'])->name('users.deposits.store');
    Route::put('/users/deposits/{deposit}', [UsersController::class, 'update_deposits'])->name('users.deposits.update');


    Route::resources([
        'settings' => SettingsController::class,
        'users' => UsersController::class,
        'packages' => PackagesController::class,
        'plans' => PlansController::class,
        'currences' => CurrenciesController::class,
        'currencies' => CurrencyPairController::class,
        'trades' => TradesController::class,
        'faqs' => FaqController::class,
        'p_methods' => CryptoPaymentControllers::class,
        'roles' => RolesController::class,
        'permissions' => PermissionController::class,
        'trading_hours' => TradingHoursController::class
    ]);
     Route::get("leverage_update",[CurrencyPairController::class,'leverage_update'])->name('leverage_update');
     Route::get("buy_update",[CurrencyPairController::class,'buy_update'])->name('buy_update');
     Route::get("sell_update",[CurrencyPairController::class,'sell_update'])->name('sell_update');

    Route::get('/admin/online-users', [UsersController::class,'online_users'])->name('online-users');
  Route::post('/admin/change_role_user', [UsersController::class,'change_role_user'])->name('change_role_user');


    Route::get('/delete/invalid/trades', [TradesController::class, 'deleteInvalidTrades']);

    Route::get('/2365/update/lead/pass', [Controller::class, 'updateLeadPass']);


});
