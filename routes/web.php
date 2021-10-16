<?php

use App\Http\Controllers\AdminControlls\AdminBreakDownController;
use App\Http\Controllers\AdminControlls\AdminLeadsByCaller_Controller;
use App\Http\Controllers\AdminControlls\AdminOwnLeadToLeader_Controller;
use App\Http\Controllers\AdminControlls\AdminSettingController;
use App\Http\Controllers\AdminControlls\CustomerExistingEmiSheduleController;
use App\Http\Controllers\AdminControlls\CustomerQuickEnquiery_AssignController;
use App\Http\Controllers\AdminControlls\DirectReferalAdminController;
use App\Http\Controllers\AdminControlls\EnquieryManagement_Tl_Leads;
use App\Http\Controllers\AdminControlls\EnquieryOfCusDetailView;
use App\Http\Controllers\AdminControlls\EnquieryOfCustomerView;
use App\Http\Controllers\AdminControlls\ExistingEmiSheduleAddAdminController;
use App\Http\Controllers\AdminControlls\ExistingEmiSheduleADminController;
use App\Http\Controllers\AdminControlls\feildForConCase_Controller;
use App\Http\Controllers\AdminControlls\offerAcceptedUploadFile;
use App\Http\Controllers\AdminControlls\OfferAcceptOrDenyController;
use App\Http\Controllers\AdminControlls\PerosnalAddInfoAdminController;
use App\Http\Controllers\AdminControlls\PerosnalInfoAdminController;
use App\Http\Controllers\AdminControlls\WalletControllerForAdmin;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\CallerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\customers\CustomerDataStoreController;
use App\Http\Controllers\customers\CustomerDirectReferal;
use App\Http\Controllers\customers\CustomerEnquieryFormController;
use App\Http\Controllers\customers\CustomerPagesController;
use App\Http\Controllers\LeaderControlls\EnquieryManagement_my_Leads;
use App\Http\Controllers\LeaderControlls\EnquieryManagementBreakDown;
use App\Http\Controllers\LeaderControlls\EnquieryManagementDirectLeads_AfterAssign;
use App\Http\Controllers\LeaderControlls\EnquieryManagementDirectLeads_InitialAssign;
use App\Http\Controllers\LeaderControlls\feildForConCaseLeader_LeaderController;
use App\Http\Controllers\LeaderControlls\offerAcceptedFileUploadLeader_LeaderController;
use App\Http\Controllers\LeaderControlls\OfferAcceptedOrDeney_LeaderController;
use App\Http\Controllers\Leads\AssignedOwnLeadsToLeader;
use App\Http\Controllers\Leads\AssignOwnLeadsToAdmin_controller;
use App\Http\Controllers\Leads\AssignTcLeadToAdmin;
use App\Http\Controllers\Leads\AssignToLeaderController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\products\SubProductController;
use App\Http\Controllers\Reports\AdminReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Website\UserController;
use App\Service\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::resource('/admin/login',AdminController::class)->middleware('is_admin');
Route::post('/logout',[AdminController::class,'logout'])->name('logout');
Route::get('caller/login',[CallerController::class,'callerlogin'])->name('caller.login');
Route::post('caller/login/check',[CallerController::class,'checklogin'])->name('caller.checklogin');

//routes that handle all tge admin function
Route::middleware(['is_admin'])->group(function () {
    Route::post('/admin/login',[AdminController::class,'adminlogin'])->name('admin.login');
    Route::get('/admindashboard',[AdminController::class,'showadminpanel'])->name('admindashboard');
    Route::get('/admindashboard/CustomerToday',[AdminController::class,'NewLeadsbycaller'])->name('admin.LeadsbyCaller');
    Route::get('/admindashboard/newLeads',[AdminController::class,'NewLeadsbyown'])->name('admin.NewLeadsbyown');
    Route::resource('/admindasboard/EnquieryAssign',CustomerQuickEnquiery_AssignController::class);
    Route::get('/admindashboard/newLeads/customerReferal',[AdminController::class,'NewLeadsbyCustomerReferal'])->name('admin.NewLeadsbyCustomerReferal');
    Route::get('master/admindashboard/customermaster/all',[CustomerController::class,'MasterCustomerList'])->name('customer.master');
    Route::post('/admindashboard/customermaster/disable',[CustomerController::class,'CustomerDiable'])->name('customer.disable');
    //route section for admin settings controller
    Route::get('CrmManagenment/admin/Redemetion/setting',[AdminSettingController::class,'RedeemSettingIndex'])->name('redeemsetting.master');
    Route::post('CrmManagenment/admin/Redemetion/setting',[AdminSettingController::class,'enableRedeem']);
    Route::get('CrmManagenment/admin/setting/resetPassword',[AdminSettingController::class,'PasswordresetIndex'])->name('admin.PasswordresetIndex');
    Route::post('CrmManagenment/admin/setting/resetPassword',[AdminSettingController::class,'PasswordChange']);
    // end route section for admin settings controller
    Route::resource('/wallets/wallteByAdmin',WalletControllerForAdmin::class);
    Route::resource('/viewEnquieryOfSingleCustomer/OverAllCusEnquiery',EnquieryOfCustomerView::class);
    Route::resource('/customerdetailedEnquiery/view/CustomerEnquierydetailview',EnquieryOfCusDetailView::class);
    // routes for products
    Route::resource('productManagement/products',ProductController::class);
    Route::resource('productManagement/subproducts',SubProductController::class);
    //routes to handle the leades of a  telecaller by admin
    Route::resource('callerleads/Enquieryview/detailview',AdminLeadsByCaller_Controller::class);
    Route::resource('ownleads/assigntoleader',AdminOwnLeadToLeader_Controller::class);
    Route::resource('leads/leadsbyOnline/OwnLeadAssigntoadmin',AssignOwnLeadsToAdmin_controller::class);
    Route::resource('admindashboard/leads/byTelCal/assignToAdmin',AssignTcLeadToAdmin::class);
     //route resource for viewing the direct referal
    Route::resource('admindashboard/leads/Directrefferal',DirectReferalAdminController::class);
    Route::post('admindashboard/leads/Directrefferal/adduser/byadmin',[DirectReferalAdminController::class,'createAccountFormAdmin'])->name('createAccountFormAdmin');
    Route::get('admindashboard/leads/Directrefferal/adduser/byadmin/NewEnquiery/{id}',[DirectReferalAdminController::class,'EnquierycreateAccountFormAdmin'])->name('EnquierycreateAccountFormAdmin');
    Route::resource('leads/adminside/breakDown',AdminBreakDownController::class);
    Route::get('leads/adminside/breakDown/{cusid}/{enqid}',[AdminBreakDownController::class,'pdfcreate'])->name('pdfcreate');
    Route::resource('leads/acceptOrDeny/offerAcOeDe',OfferAcceptOrDenyController::class);
    Route::resource('leads/accepted/offerAcceptedFileUpload',offerAcceptedUploadFile::class);
    Route::resource('leads/DocumentCollected/feildForConCase',feildForConCase_Controller::class);

    //resouece controller for admin enquiery Management
    Route::resource('EnquieryManagement/TodayCallerLeads',EnquieryManagement_Tl_Leads::class);//this views the customer spoked by a tele caller
    Route::resource('EnquieryManagement/DirectLeadsInitialAssign',EnquieryManagementDirectLeads_InitialAssign::class);//this views initial assigned status
    Route::resource('EnquieryManagement/DirectLeadsAfterAssignMoreinfo',EnquieryManagementDirectLeads_AfterAssign::class);//this views After more info assign
    Route::resource('EnquieryManagement/AssignedToLeaderBreakDown',EnquieryManagementBreakDown::class);//this views After more info assign
    Route::resource('EnquieryManagement/User/ExistingLoans',CustomerExistingEmiSheduleController::class);//this views After more info assign
    Route::resource('EnquieryManagement/User/PersonalInfoAdd',PerosnalAddInfoAdminController::class);//this route is for add personal info of user in admin side
    Route::resource('EnquieryManagement/User/PersonalInfoAdmin',PerosnalInfoAdminController::class);//this route is for view and update personal info of user in admin side
    Route::resource('EnquieryManagement/User/ExistingEmiInfoAdmin',ExistingEmiSheduleADminController::class);//this route is for view  ExistingEmiShedule of user in admin side
    Route::resource('EnquieryManagement/User/ExistingEmiInfoAddAdmin',ExistingEmiSheduleAddAdminController::class);//this route is for Add and update ExistingEmiShedule of user in admin side


    //route resouece for adding telecaller
    Route::resource('Usermanagement/caller', CallerController::class);
    //route seperation for genrating reports for admin
    Route::get('reportsManagement/admin/all/customerReports',[AdminReportController::class,'AllCustomerView'])->name('allCustomer.index');
    Route::post('reportsManagement/admin/all/customer/exports',[AdminReportController::class,'AllCustomerView_export'])->name('allcustomer.export');
    Route::get('reportsManagement/admin/all/customer/referal/Reports',[AdminReportController::class,'ReferalOfCustomer'])->name('referalofCustomer.index');
    Route::post('reportsManagement/admin/all/customer/referal/search',[AdminReportController::class,'ReferalOfCustomer_search'])->name('referalofCustomer.search');
    Route::get('reportsManagement/admin/all/customer/referalIndirect/{cus_referal_id}',[AdminReportController::class,'IndirectReferalOfCustomer'])->name('IndirectReferalOfCustomer.index');
    Route::post('reportsManagement/admin/all/customer/IndirectReferalOfCustomer_export',[AdminReportController::class,'IndirectReferalOfCustomer_export'])->name('IndirectReferalOfCustomer.export');
    Route::get('reportsManagement/admin/all/customer/referaldirect/{id}',[AdminReportController::class,'directReferalOfCustomer'])->name('directReferalOfCustomer.index');
    Route::post('reportsManagement/admin/all/customer/directReferalOfCustomer_export',[AdminReportController::class,'directReferalOfCustomer_export'])->name('directReferalOfCustomer.export');
    Route::get('reportsManagement/admin/allEnquieryofCustomer',[AdminReportController::class,'allEnquieryofCustomer'])->name('allEnquieryofCustomer.index');
    Route::get('reportsManagement/admin/EnquierysofCustomer/{from_date}/to/{to_date}/{Report_type}',[AdminReportController::class,'allEnquieryofCustomer_view'])->name('allEnquieryofCustomer.view');
    Route::post('reportsManagement/admin/all/customer/ConvertedEnquieryReports',[AdminReportController::class,'ConvertedEnquieryReports_export'])->name('ConvertedEnquieryReports.export');
    Route::post('reportsManagement/admin/all/customer/NonConvertedEnquieryReports',[AdminReportController::class,'NonConvertedEnquieryReports_export'])->name('NonConvertedEnquieryReports.export');
});
//route that controllers fro callers
Route::prefix('telecaller')->middleware(['Authcaller'])->group(function () {
    Route::get('dashboard',[CallerController::class,'callerdashboard'])->name('caller.dashboard');
    Route::get('caller/myprofile/{id}',[CallerController::class,'callerprofile'])->name('caller.profile');
    Route::get('caller/customerEntry',[CallerController::class,'entry'])->name('caller.entry');
    Route::post('caller/customerEntry',[CallerController::class,'StoreNewCustomer'])->name('caller.StoreNewCustomer');
     //Route Resource For leads assigned by admin to leader
    Route::get('leads/callerside/breakDown/{cusid}/{enqid}',[AssignToLeaderController::class,'pdfcreate'])->name('pdfcreate.caller');
    //routes that handle the My Leads of Caller


});
Route::prefix('own')->middleware(['Authcaller'])->group(function () {
    Route::resource('Leader/assignedNewLeads',AssignedOwnLeadsToLeader::class);
    Route::resource('Leader/assignedleads',AssignToLeaderController::class);//this controller is to handle request after moreinfo filled assigned by Admin controller
    //cmomment for upper route its handles all breakdown view adding forms for every obligation
    Route::resource('leads/acceptOrDeny/offerAcOeDeLeader',OfferAcceptedOrDeney_LeaderController::class);
    Route::resource('leads/accepted/offerAcceptedFileUploadLeader',offerAcceptedFileUploadLeader_LeaderController::class);
    Route::resource('leads/DocumentCollected/feildForConCaseLeader',feildForConCaseLeader_LeaderController::class);
});
Route::prefix('caller')->middleware(['Authcaller'])->group(function () {

    Route::resource('EnquieryManagement/MyLeadsStatus',EnquieryManagement_my_Leads::class);//this views the own Leader

});
//route to fetch the subproducts not checked by middleware because of muliple login
Route::post('caller/customer/productfetch',[CallerController::class,'handleSubProductRequest'])->name('caller.getsubproductsbyproduct');


//routes for frontend of website
Route::get('/',[UserController::class,'index'])->name('home');//home page of a frontend
Route::get('loginFormView',[UserController::class,'login'])->name('userLogin');
Route::post('loginFormSubmit',[UserController::class,'checkuser'])->name('userLoginPost');
Route::post('/user/checkotp',[CustomerController::class,'checkOtp'] )->name('user.checkOtp');
Route::post('/login/checkotp',[UserController::class,'checkuserotp'])->name('checkuserotp');
Route::post('/login/logout',[UserController::class,'logout'])->name('userlogout');
Route::get('/user/signup/{id?}/referal/{directref?}',[CustomerController::class,'userSingup'] );


Route::prefix('user')->group(function()
{

    Route::get('login',[UserController::class,'login'])->name('userlogin');
    Route::get('privacyPolicy',[CustomerPagesController::class,'privacy_policy'])->name('user.privacypolicy');
    Route::get('connect',[CustomerPagesController::class,'connect'])->name('user.connect');
    Route::get('AboutUs',[CustomerPagesController::class,'About'])->name('user.About');
    Route::get('FAQ',[CustomerPagesController::class,'FAQ'])->name('user.FAQ');
    Route::get('Documents',[CustomerPagesController::class,'Documents'])->name('user.Docs');
    //routes for products page
    Route::get('PersonalLoan',[CustomerPagesController::class,'PersonalLoan'])->name('user.PersonalLoan');
    Route::get('HomeLoan',[CustomerPagesController::class,'HomeLoan'])->name('user.HomeLoan');
    Route::get('Mortages',[CustomerPagesController::class,'Mortages'])->name('user.Mortages');
    Route::get('BusinessLoan',[CustomerPagesController::class,'BusinessLoan'])->name('user.BusinessLoan');
    Route::get('EducationLoan',[CustomerPagesController::class,'EducationLoan'])->name('user.EducationLoan');
    //end of routes for products page
    //route to auto populate
    Route::get('autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');

});

//routes for user after sign up
Route::prefix('user')->middleware(['user'])->group(function () {



    Route::get('profile',[CustomerPagesController::class,'profile'])->name('user.profile');
    Route::get('OneView',[CustomerPagesController::class,'OneView'])->name('user.OneView');
    Route::get('myWallet',[CustomerPagesController::class,'myWallet'])->name('user.myWallet');
    Route::get('meter',[CustomerPagesController::class,'Meter'])->name('user.meter');
    Route::get('personalInfoForm',[CustomerPagesController::class,'personalInfoFill'])->name('user.personalInfoFill');
    Route::get('personalLoan/emicalculater',[CustomerPagesController::class,'personalLoanEmiCalc'])->name('user.personalLoanEmiCalc');
    Route::get('homeLoan/emicalculater',[CustomerPagesController::class,'homeLoanEmiCalc'])->name('user.homeLoanEmiCalc');
    Route::get('partpayment/emicalculater',[CustomerPagesController::class,'partPayCalc'])->name('user.partPayCalc');
    Route::get('calculater/EligibilityCalculater',[CustomerPagesController::class,'personalEligibilityCalc'])->name('user.personalEligibilityCalc');
    Route::get('calculater/Homeloan/EligibilityCalculater',[CustomerPagesController::class,'homeEligibilityCalc'])->name('user.homeEligibilityCalc');
    Route::post('personalInfoForm',[CustomerDataStoreController::class,'personalInfoFillStore'])->name('user.personalInfoFillStore');
    Route::post('existingEmiShedule',[CustomerDataStoreController::class,'existingEmiSheduleStore'])->name('user.existingEmiShedule');
    Route::post('existingEmiSheduleRestoreStore',[CustomerDataStoreController::class,'existingEmiSheduleRestoreStore'])->name('user.existingEmiSheduleRestoreStore');
    Route::post('UploadUserImage',[CustomerDataStoreController::class,'UploadUserImage'])->name('user.UploadUserImage');
    Route::post('RedeemRequest',[CustomerDataStoreController::class,'RedeemRequest'])->name('user.RedeemRequest');
    Route::resource('quickEnquieryForm',CustomerEnquieryFormController::class);
    Route::resource('directReferal',CustomerDirectReferal::class);

});
//end routes for user after sign up



Route::post('/login/checkuser',[UserController::class,'checkuser'])->name('checkuser');

Route::resource('/user/signup', CustomerController::class);//sign up route index methode to sign up

Route::resource('/user/userLoginform', CustomerSignUpController::class);






//routes for test
Route::get('/service',function()
{

    return view('testviews.service');

});
//routes for post
Route::post('/servicepost', function (Request $request,TestService $service) {


    $service->handle($request);

})->name('test.post');



//routes for test
Route::get('/test',function()
{



    $print=AdminBreakDownController::makePdf(1,1);
    return $print->download('test.pdf');

});
