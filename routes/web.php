<?php

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\scouitMailController;
use App\Http\Controllers\Admin\ScoutMailController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\PackageController;


use App\Jobs\SendEmailJob;

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

Route::get('/' , [WebsiteController::class, 'index'])->name('index');
Route::get('/registration', [WebsiteController::class , 'register'])->name('registration');
Route::get('search/{city?}/{occupation?}/{salary?}/{check?}' , [WebsiteController::class , 'search'])->name('search');
Route::get('searchJobs/{city}/{occupation}/{salary}/{check}' , [WebsiteController::class , 'searchJobs']);

Route::get('countCityJobs/{city}' , [WebsiteController::class , 'countCityJobs'])->name('countCityJobs');
Route::get('/jobListing/{city_id?}/{industry_id?}/{occupation_id?}/{sub_occupation_id?}/{salary?}' , [WebsiteController::class ,'jobListing'])->name('jobListing');
Route::get('/getOccupations/{industry_id}',[WebsiteController::class, 'getOccupations'])->name('website.occupations');
Route::get('/getSubOccupations/{occupation_id}',[WebsiteController::class, 'getSubOccupations'])->name('website.suboccupations');
Route::get('/getSubOccupationsCount/{suboccupation_id}',[WebsiteController::class, 'getSubOccupationsCount'])->name('website.suboccupationsCount');
Route::get('industryJobs/{id}/{occupation_id?}/{sub_occupation_id?}',[WebsiteController::class, 'searchIndustryJobs']);
Route::get('jobDetailing/{id}',[WebsiteController::class, 'jobDetailing']);
Route::get('jobDetail/{id}',[WebsiteController::class, 'JobDetail']);
Route::get('/jobApply/{id}',[WebsiteController::class, 'jobApplyForm']);
Route::post('/saveJobApply',[WebsiteController::class, 'saveJobApplyForm']);
// contact us
Route::any('/contactus',[WebsiteController::class, 'contactUs'])->name('contact.contactus');
Route::any('/store',[WebsiteController::class, 'contactCreate'])->name('contact.store');
// contactus
Route::any('/feedback',[WebsiteController::class, 'feedBack'])->name('feed.store');
Route::any('/create',[WebsiteController::class, 'createFeedBack'])->name('feed.create');





Auth::routes();
Route::group(['middleware' => 'auth'], function() {
	Route::get('dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
	Route::get('profile' , [App\Http\Controllers\User\UserController::class, 'simple_profile'])->name('user.simple.profile');
	Route::get('profile/edit' , [App\Http\Controllers\User\UserController::class, 'edit_simple_profile'])->name('user.simple.profile.edit');
	Route::put('profile/update/{id}' , [App\Http\Controllers\User\UserController::class, 'update_simple_profile'])->name('user.simple.profile.update');
	Route::get('profile/settings' , [App\Http\Controllers\User\UserController::class, 'simple_profile_settings'])->name('user.profile.setting');
	Route::put('profile/settings/update/{id}' ,[App\Http\Controllers\User\UserController::class, 'update_profile_settings'])->name('user.profile.setting.update');
	Route::get('profile/detail' , [App\Http\Controllers\User\UserController::class, 'detail_profile'])->name('user.detail.profile');
	Route::post('profile/detail/store' , [App\Http\Controllers\User\UserController::class, 'store_detail_profile'])->name('user.detail.profile.store');
	Route::get('resume', [App\Http\Controllers\User\UserController::class, 'resume'])->name('user.resume');
	Route::get('resume-pdf', [App\Http\Controllers\User\UserController::class, 'userCvPdf'])->name('user.resume.pdf');
    Route::post('/bookMark' , [App\Http\Controllers\User\UserController::class, 'bookMark']);
    Route::get('/deleteBookmark/{id}' , [App\Http\Controllers\User\UserController::class, 'deleteBookmark']);
    Route::get('/bookMarkJobs' , [App\Http\Controllers\User\UserController::class, 'bookMarkJobs'])->name('user.bookMarkJobs');
    Route::get('/submitJobAppliedList' , [App\Http\Controllers\User\UserController::class, 'submitJobAppliedList'])->name('user.submitJobAppliedList');

});

Route::group([
	'prefix' => 'company'
], function() {
	Route::get('login' , [App\Http\Controllers\Company\Auth\LoginController::class , 'showLoginForm'])->name('company.login');
	Route::post('login', [App\Http\Controllers\Company\Auth\LoginController::class , 'login'])->name('company.login.submit');
	Route::post('logout', [App\Http\Controllers\Company\Auth\LoginController::class, 'logout'])->name('company.logout');
	Route::post('register' , [App\Http\Controllers\Company\Auth\RegisterController::class , 'register'])->name('company.register');
	Route::group(['middleware' => 'auth:company'], function() {
		Route::get('dashboard', [App\Http\Controllers\Company\CompanyController::class, 'index'])->name('company.dashboard');
		Route::get('profile' , [App\Http\Controllers\Company\CompanyController::class, 'simple_profile'])->name('company.simple.profile');
		Route::get('profile/settings' , [App\Http\Controllers\Company\CompanyController::class, 'simple_profile_settings'])->name('company.profile.setting');
		Route::put('profile/settings/update/{id}' ,[App\Http\Controllers\Company\CompanyController::class, 'update_profile_settings'])->name('company.profile.setting.update');
		Route::get('profile/edit' , [App\Http\Controllers\Company\CompanyController::class, 'edit_simple_profile'])->name('company.simple.profile.edit');
		Route::put('profile/update/{id}' , [App\Http\Controllers\Company\CompanyController::class, 'update'])->name('company.simple.profile.update');
		Route::get('job/create', [App\Http\Controllers\Company\JobController::class, 'create'])->name('company.job.create');
		Route::get('getOccupations/{industry_id}',[App\Http\Controllers\Company\JobController::class, 'getOccupations'])->name('company.occupations');
		Route::get('getSubOccupations/{industry_id}',[App\Http\Controllers\Company\JobController::class, 'getSubOccupations'])->name('company.suboccupations');
		Route::any('job/store', [App\Http\Controllers\Company\JobController::class, 'store'])->name('company.job.store');
		Route::get('job/listings', [App\Http\Controllers\Company\JobController::class, 'index'])->name('company.job.index');
		Route::post('job/delete/{id}', [App\Http\Controllers\Company\JobController::class, 'delete'])->name('company.job.delete');
		Route::get('/job/detail/{id}', [App\Http\Controllers\Company\JobController::class, 'detail'])->name('company.job.detail');
		Route::get('/job/edit/{id}', [App\Http\Controllers\Company\JobController::class, 'edit'])->name('company.job.edit');
		Route::post('/job/update/{id}', [App\Http\Controllers\Company\JobController::class, 'update'])->name('company.job.update');
        Route::get('job-applicant' , [App\Http\Controllers\Company\CompanyController::class, 'jobApplicant'])->name('company.job.applicant');
        Route::get('job-applicant-cv/{id}' , [App\Http\Controllers\Company\CompanyController::class, 'jobApplicantCv'])->name('company.job.applicant.cv');
        Route::get('cv-pdf/{id}' , [App\Http\Controllers\Company\CompanyController::class, 'cvPDF'])->name('company.cv.pdf');
        Route::get('job-filter/{job_id?}/{job_date?}/{job_contract?}/{job_salary?}' , [App\Http\Controllers\Company\CompanyController::class, 'jobFilter']);
        Route::get('job-applicants/{id}' , [App\Http\Controllers\Company\CompanyController::class, 'JobApplicants']);
        // scoutMail route

        Route::get('scout-mail' , [App\Http\Controllers\Company\ScouitMailController::class, 'index'])->name('scoutmail.job');
        // Route::get('scoutmail-filter/{id}' , [App\Http\Controllers\Company\ScouitMailController::class, 'jobFilter']);







    });
});

Route::group([
	'prefix' => 'admin'
], function() {



	Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
 	Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.submit');
 	Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
 	Route::get('authorization', [App\Http\Controllers\Admin\AuthorizationController::class,'authorization'])->name('admin.authorization');
 	Route::post('verify' , [App\Http\Controllers\Admin\AuthorizationController::class, 'verify'])->name('verify.admin');

 	Route::group(['middleware' => ['auth:admin', 'chkcode']], function() {
		Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
		Route::get('user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.user.create');
		Route::post('user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.user.store');
		Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
		Route::get('/getUsers', [App\Http\Controllers\Admin\UserController::class, 'getUsers']);
		Route::get('editUser/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
		Route::any('updateUser/{id}' , [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
		Route::get('delete_user/{id}' , [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
		Route::get('company/create', [App\Http\Controllers\Admin\CompanyController::class, 'create'])->name('admin.company.create');
		Route::post('company/store', [App\Http\Controllers\Admin\CompanyController::class, 'store'])->name('admin.company.store');
		Route::get('companies', [App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('admin.company.index');
		Route::get('/getCompanies', [App\Http\Controllers\Admin\CompanyController::class, 'getCompanies']);
		Route::get('editCompany/{id}', [App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name('admin.company.edit');
		Route::put('updateCompany/{id}' , [App\Http\Controllers\Admin\CompanyController::class, 'update'])->name('admin.company.update');
		Route::get('delete_company/{id}' , [App\Http\Controllers\Admin\CompanyController::class, 'delete'])->name('admin.company.delete');
		Route::get('occupation/create', [App\Http\Controllers\Admin\OccupationController::class, 'create'])->name('admin.occupation.create');
		Route::post('occupation/store', [App\Http\Controllers\Admin\OccupationController::class, 'store'])->name('admin.occupation.store');
		Route::get('occupations', [App\Http\Controllers\Admin\OccupationController::class, 'index'])->name('admin.occupation.index');
		Route::get('/getOccupations', [App\Http\Controllers\Admin\OccupationController::class, 'getOccupations']);
		Route::get('editOccupation/{id}', [App\Http\Controllers\Admin\OccupationController::class, 'edit'])->name('admin.occupation.edit');
		Route::any('updateOccupation/{id}' , [App\Http\Controllers\Admin\OccupationController::class, 'update'])->name('admin.occupation.update');
		Route::get('delete_occupation/{id}' , [App\Http\Controllers\Admin\OccupationController::class, 'delete'])->name('admin.occupation.delete');
		Route::get('sub_occupation/create', [App\Http\Controllers\Admin\OccupationController::class, 'create_subOccupation'])->name('admin.suboccupation.create');
		Route::get('sub_occupations', [App\Http\Controllers\Admin\OccupationController::class, 'subOccupation'])->name('admin.suboccupation.index');
		Route::get('/getSubOccupations', [App\Http\Controllers\Admin\OccupationController::class, 'getSubOccupations']);
		Route::any('subOccupation/store', [App\Http\Controllers\Admin\OccupationController::class, 'store_subOccupation'])->name('admin.suboccupation.store');
		Route::any('suboccupation/{id}', [App\Http\Controllers\Admin\OccupationController::class, 'editsuboccuption'])->name('admin.sub_occupation.edit');
		Route::any('updatesuboccupation/{id}', [App\Http\Controllers\Admin\OccupationController::class, 'updatesuboccuption'])->name('admin.sub_occupation.update');
		Route::get('job/create', [App\Http\Controllers\Admin\JobController::class, 'create'])->name('admin.job.create');
		Route::post('job/store', [App\Http\Controllers\Admin\JobController::class, 'store'])->name('admin.job.store');
		Route::get('jobs', [App\Http\Controllers\Admin\JobController::class, 'index'])->name('admin.job.index');
		Route::get('/getJobs', [App\Http\Controllers\Admin\JobController::class, 'getJobs']);
		Route::get('delete_job/{id}' , [App\Http\Controllers\Admin\JobController::class, 'delete'])->name('admin.job.delete');
		Route::get('/job/edit/{id}',[App\Http\Controllers\Admin\JobController::class, 'edit'])->name('admin.job.edit');
		Route::post('job/update/{id}',[App\Http\Controllers\Admin\JobController::class, 'update'])->name('admin.job.update');
		Route::get('user_email/create', [App\Http\Controllers\Admin\NotificationController::class, 'createUserEmail'])->name('admin.user_email.create');
		Route::any('user_email/send', [App\Http\Controllers\Admin\NotificationController::class, 'sendEmailToUser'])->name('admin.user_email.send');
		Route::get('company_email/create', [App\Http\Controllers\Admin\NotificationController::class, 'createCompanyEmail'])->name('admin.company_email.create');
		Route::post('company_email/send', [App\Http\Controllers\Admin\NotificationController::class, 'sendEmailToCompany'])->name('admin.company_email.send');
		Route::get('user_emails' , [App\Http\Controllers\Admin\NotificationController::class, 'userEmails'])->name('admin.user_email.index');
		Route::get('/getUserEmails', [App\Http\Controllers\Admin\NotificationController::class, 'getUserEmails']);
		Route::get('company_emails' , [App\Http\Controllers\Admin\NotificationController::class, 'companyEmails'])->name('admin.company_email.index');
		Route::get('/getCompanyEmails', [App\Http\Controllers\Admin\NotificationController::class, 'getCompanyEmails']);
		Route::any('all_email/create', [App\Http\Controllers\Admin\NotificationController::class, 'createAllEmail'])->name('admin.all_email.create');
		Route::any('all_email/send', [App\Http\Controllers\Admin\NotificationController::class, 'sendEmailToAll'])->name('admin.all_email.send');
		Route::get('/user/pdf/{id}', [App\Http\Controllers\Admin\UserController::class, 'createPDF']);
		Route::get('getOccupations/{industry_id}',[App\Http\Controllers\Company\JobController::class, 'getOccupations'])->name('admin.occupations');
		Route::get('getSubOccupations/{industry_id}',[App\Http\Controllers\Company\JobController::class, 'getSubOccupations'])->name('admin.suboccupations');
//     provines routes

		Route::get('admin_provinces_create', [ProvinceController::class, 'index'])->name('admin_provinces_create');
		Route::post('admin_provinces_create', [ProvinceController::class, 'create'])->name('admin_provinces_create');
		Route::get('admin_provinces_view', [ProvinceController::class, 'show'])->name('admin_provinces_view');
		Route::get('admin_provinces_edit/{id}', [ProvinceController::class, 'edit'])->name('admin_provinces_edit');
		Route::any('admin_provinces_update/{id}', [ProvinceController::class, 'update'])->name('admin_provinces_update');
		Route::get('admin_provinces_destroy/{id}', [ProvinceController::class, 'destroy'])->name('admin_provinces_destroy');


		// City routes

		Route::get('admin_cities_create', [CityController::class, 'index'])->name('admin_cities_create');
		Route::any('city/store', [CityController::class, 'store'])->name('city.store');
		Route::get('admin_cities_view', [CityController::class, 'show'])->name('admin_cities_view');
		Route::get('admin_cities_edit/{id}', [CityController::class, 'edit'])->name('admin_cities_edit');
		Route::any('admin_cities_update/{id}', [CityController::class, 'update'])->name('admin_cities_update');
		Route::get('admin_cities_destroy/{id}', [CityController::class, 'destroy'])->name('admin_cities_destroy');

		//industry routes

		Route::get('admin_industry_view', [IndustryController::class, 'index'])->name('admin_industry_view');
		Route::get('admin_industry_create', [IndustryController::class, 'create'])->name('admin_industry_create');
		Route::any('admin_industry_store', [IndustryController::class, 'store'])->name('admin_industry_store');
		Route::get('admin_industry_edit/{id}', [IndustryController::class, 'edit'])->name('admin_industry_edit');
		Route::any('admin_industry_update/{id}', [IndustryController::class, 'update'])->name('admin_industry_update');
		Route::get('admin_industry_destroy/{id}', [IndustryController::class, 'delete'])->name('admin_industry_destroy');

        //salary routes

		Route::get('admin_salary_view', [SalaryController::class, 'index'])->name('admin_salary_view');
		Route::get('admin_salary_create', [SalaryController::class, 'create'])->name('admin_salary_create');
		Route::any('admin_salary_store', [SalaryController::class, 'store'])->name('admin_salary_store');
		Route::get('admin_salary_edit/{id}', [SalaryController::class, 'edit'])->name('admin_salary_edit');
		Route::any('admin_salary_update/{id}', [SalaryController::class, 'update'])->name('admin_salary_update');
		Route::get('admin_salary_destroy/{id}', [SalaryController::class, 'destroy'])->name('admin_salary_destroy');

        //feedback

        Route::get('company/feedback', [FeedbackController::class, 'companyFeedback'])->name('company.feedback');
        Route::get('company-delete/{id}', [FeedbackController::class, 'companyDestroy'])->name('company.delete');
        Route::get('user/feedback', [FeedbackController::class, 'userFeedback'])->name('user.feedback');
        Route::get('user-delete/{id}', [FeedbackController::class, 'userDestroy'])->name('user.delete');

        // scouit mail

		Route::get('scouit-mail', [App\Http\Controllers\Admin\ScoutMailController::class, 'index'])->name('scouit-mail.view');
		Route::get('scouit-mail', [App\Http\Controllers\Admin\ScoutMailController::class, 'show'])->name('scouit-mail.view');
		Route::get('scouit_mail/{id}', [App\Http\Controllers\Admin\ScoutMailController::class, 'approve'])->name('scouit_mail.aprove');
		Route::get('scouit_mails/{id}', [App\Http\Controllers\Admin\ScoutMailController::class, 'disaprove'])->name('scouit_mail.disaprove');

        // scoutmail-package

		Route::get('scouitmail-package', [App\Http\Controllers\Admin\ScoutMailController::class, 'view'])->name('scouitmail-package.view');
		Route::post('scouitmail-package', [App\Http\Controllers\Admin\ScoutMailController::class, 'create'])->name('scouitmail-package.create');
		Route::get('scouitmail-package-view', [App\Http\Controllers\Admin\ScoutMailController::class, 'packageview'])->name('scouitmail-package.view');
		Route::get('scouitmail-package-edit/{id}', [App\Http\Controllers\Admin\ScoutMailController::class, 'packageedit'])->name('scouitmail-package.edit');
		Route::any('scouitmail-package-update/{id}', [App\Http\Controllers\Admin\ScoutMailController::class, 'packageupdate'])->name('scouitmail-package.update');
		Route::any('scouitmail-package-destroy/{id}', [App\Http\Controllers\Admin\ScoutMailController::class, 'destroy'])->name('scouitmail-package.delete');

        // packages
		Route::get('package', [App\Http\Controllers\Admin\PackageController::class, 'index'])->name('package.view');
		Route::any('package.create', [App\Http\Controllers\Admin\PackageController::class, 'create'])->name('package.create');
		Route::get('package.show', [App\Http\Controllers\Admin\PackageController::class, 'show'])->name('package.show');
		Route::get('package.edit/{id}', [App\Http\Controllers\Admin\PackageController::class, 'edit'])->name('package.edit');
		Route::any('package.update/{id}', [App\Http\Controllers\Admin\PackageController::class, 'update'])->name('package.update');
		Route::get('package.delete/{id}', [App\Http\Controllers\Admin\PackageController::class, 'destroy'])->name('package.destroy');
        // orders

		Route::get('orders', [App\Http\Controllers\Admin\PackageController::class, 'order'])->name('order.view');
		Route::any('active/{id}', [App\Http\Controllers\Admin\PackageController::class, 'activate'])->name('order.activate');
		Route::any('cancle/{id}', [App\Http\Controllers\Admin\PackageController::class, 'cancle'])->name('order.cancle');






	});
});

// queue route

// Route::get('email-test', function(){
// 	$details['email'] = 'muh.t.995@gmail.com';

// 	dispatch(new SendEmailJob($details));
// 	dd('Email send');

// });
