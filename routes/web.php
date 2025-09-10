<?php

use App\Models\Notice;
use App\Models\StudentRegistration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\FresherRegistrationController;
use App\Http\Controllers\StudentRegistrationController;

Route::get('/download-registration-form', [FormController::class, 'download'])->name('download.registration.form');
Route::get('/', [UiController::class, 'home'])->name('ui.home');
Route::get('contact', [UiController::class, 'contact'])->name('ui.contact');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/ui/notice/board', [NoticeController::class, 'uiAll'])->name('ui.noticeAll');

Route::get('fresher-registration', [FresherRegistrationController::class, 'fresherRegister'])->name('fresher.register');
Route::post('fresher-registration/store', [FresherRegistrationController::class, 'fresherStore'])->name('fresher.store');

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('login', [UiController::class, 'login'])->name('ui.login');
});

Route::middleware('custom.auth')->group(function () {
    Route::get('ui/view/detail/{id}', [UiController::class, 'viewDetail'])->name('ui.view.reg.detail');
    Route::get('student/history', [UiController::class, 'history'])->name('history');
    Route::get('sturegistration', [UiController::class, 'stuReg'])->name('stu.reg');
    Route::post('studentReg/store', [StudentRegistrationController::class, 'sturegStore'])->name('stu.reg.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('ui/image/{name}', [UiController::class, 'showImage'])->name('ui.image.show');
    Route::get('ui/reg/detele/{id}', [UiController::class, 'regDelete'])->name('ui.reg.delete');
    Route::get('ui/reg/edit/{id}', [UiController::class, 'regEdit'])->name('ui.reg.edit');
    Route::put('ui/reg/update/{id}', [StudentRegistrationController::class, 'regUpdate'])->name('ui.reg.update');

    Route::post('studentReg/{student_registration}/submit-payment', [StudentRegistrationController::class, 'submitPayment'])->name('admin.stu.reg.submit.payment');
});

Route::middleware('admin', 'auth')->group(function () {

    Route::get('/admin/registrations/word-download', [StudentRegistrationController::class, 'aceeptwordDownload'])->name('admin.registrations.accept.word.download');
    Route::get('admin/stu-reg-list/export', [StudentRegistrationController::class, 'exportToWord'])->name('admin.stu.reg.export');
    Route::get('accept/list', [AdminController::class, 'acceptList'])->name('admin.stu.reg.accept.list');
    Route::get('accept/list/search', [AdminController::class, 'acceptSearch'])->name('admin.stu.reg.accept.list.search');
    Route::get('/stu/stop', [AdminController::class, 'stopdownloadWordFile'])->name('stop.stu.wordfile');
    Route::get('/stu/stoplist/download', [AdminController::class, 'stopStuList'])->name('stop.stu');
    Route::get('/students/stop/export', [AdminController::class, 'export'])->name('stopStudent.export');

    Route::get('students/list', [AdminController::class, 'studentsList'])->name('students.list');
    Route::get('/students/export', [AdminController::class, 'studentsExport'])->name('students.export');


    Route::get('Students/transfer/list', [AdminController::class, 'transferStuList'])->name('transfer.stu');
    Route::get('/students/transfer/export', [AdminController::class, 'transferExport'])->name('transfer.stu.export');

    Route::resource('years', YearController::class);

    Route::get('student/transfer/{user}', [AdminController::class, 'transferStudent'])->name('student.transfer');
    Route::get('stop/mail/{user}', [AdminController::class, 'stopMail'])->name('stop.mail');
    Route::get('nostop/mail/{id}', [AdminController::class, 'nostopMail'])->name('no.stop.mail');
    Route::get('/reg/give/edit/{id}', [StudentRegistrationController::class, 'giveEdit'])->name('admin.stu.give.edit');
    Route::get('/reg/accept/{student_registration}', [StudentRegistrationController::class, 'regAccept'])->name('admin.stu.accept');
    Route::get('payments/{payment}/complete', [StudentRegistrationController::class, 'completePayment'])->name('admin.stu.payment.complete');
    Route::get('regs/{student_registration}/skip-payment', [StudentRegistrationController::class, 'skipPayment'])->name('admin.stu.payment.skip');

    Route::get('fresher-registration/list', [FresherRegistrationController::class, 'fresherRegList'])->name('fresher.reg.list');
    Route::get('/fresher/accept/{fresher}', [FresherRegistrationController::class, 'fresherAccept'])->name('fresher.accept');
    Route::post('/fresher/accept/{fresher}', [FresherRegistrationController::class, 'fresherAcceptStore'])->name('fresher.accept.store');
    Route::delete('/fresher/delete/{fresher}', [FresherRegistrationController::class, 'fresherDelete'])->name('fresher.delete');

    Route::get('/home', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('add/user/mail', [AdminController::class, 'addAdmin'])->name('add.admin');
    Route::get('user/mail/list', [AdminController::class, 'adminlist'])->name('admin.list');
    Route::get('user/mail/edit/{id}', [AdminController::class, 'adminEdit'])->name('admin.info.edit');
    Route::put('user/mail/update/{id}', [AdminController::class, 'adminUpdate'])->name('admin.info.update');
    Route::get('user/mail/delete/{id}', [AdminController::class, 'adminDelete'])->name('admin.delete');

    Route::get('/acedmic/year/all', [AcademicYearController::class, 'acedmicList'])->name('admin.acedimcList');
    Route::get('/acedmic/add', [AcademicYearController::class, 'acedmicAdd'])->name('admin.acedimc.add');
    Route::post('/acedmic/store', [AcademicYearController::class, 'acedmicStore'])->name('admin.acedimic.store');
    Route::get('/acedmic/edit/{id}', [AcademicYearController::class, 'acedmicEdit'])->name('admin.acedimic.edit');
    Route::put('/acedmic/update/{id}', [AcademicYearController::class, 'acedmicUpdate'])->name('admin.acedimic.update');
    Route::get('/acedmic/delete/{id}', [AcademicYearController::class, 'acedmicDelete'])->name('admin.acedimic.delete');

    Route::get('studentReg/classes', [StudentRegistrationController::class, 'acceptClasses'])->name('admin.stu.reg.accept.classes');
    Route::get('/studentReg/list', [StudentRegistrationController::class, 'stuRegList'])->name('admin.stu.reg.list');
    Route::get('/studentReg/list/byyear/{yearid}', [StudentRegistrationController::class, 'stuRegListByYearId'])->name('admin.stu.reg.list.byYear');
    Route::post('first/reg/store', [StudentRegistrationController::class, 'firstYrStore'])->name('first.yr.store');
    Route::get('/studentReg/form/firstyr', [StudentRegistrationController::class, 'form'])->name('admin.stu.reg.form');
    Route::get('/studentReg/detail/{id}', [StudentRegistrationController::class, 'stuRegDetail'])->name('admin.stu.reg.detail');
    Route::get('/studentReg/edit/{id}', [StudentRegistrationController::class, 'stuRegEdit'])->name('admin.stu.reg.edit');
    Route::put('/studentReg/update/{id}', [StudentRegistrationController::class, 'stuRegUpdate'])->name('admin.stu.reg.update');
    Route::delete('/studentReg/delete/{student_registration}', [StudentRegistrationController::class, 'stuRegDelete'])->name('admin.stu.reg.delete');
    Route::post('studentReg/request-payment/{student_registration}', [StudentRegistrationController::class, 'requestPayment'])->name('admin.stu.reg.request.payment');



    Route::get('/api/studentReg/{id}/payment-info', [StudentRegistrationController::class, 'paymentInfo']);
    Route::get('/image/{name}', [StudentRegistrationController::class, 'showImage'])->name('image.show');

    Route::get('admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminController::class, 'adminEditProfile'])->name('admin.profile.edit');
    Route::put('admin/profile/update', [AdminController::class, 'adminUpdateProfile'])->name('admin.profile.update');

    Route::get('/notice/list', [NoticeController::class, 'list'])->name('notice.list');
    Route::get('/notice/add', [NoticeController::class, 'add'])->name('notice.add');
    Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::put('/notice/update/{id}', [NoticeController::class, 'update'])->name('notice.update');
    Route::get('/notice/delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');
});

include_once(base_path('routes/grading.php'));
