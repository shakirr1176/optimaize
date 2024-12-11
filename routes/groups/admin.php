<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\Admin\{
    AnnouncementController,
    DashboardController,
    RoleController,
    TicketController,
    UsersController
};

Route::prefix("admin")->name("admin.")->middleware(['auth', 'permission'])->group(function () {
    Route::get("dashboard", DashboardController::class)->name('dashboard');
    // Role Management
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::put('roles/{role}/change-status', [RoleController::class, 'changeStatus'])->name('roles.status');

    //Application Setting
    Route::get('settings', [SettingsController::class, 'index'])
        ->name('settings.index');
    Route::get('settings/{type}/{sub_type}', [SettingsController::class, 'edit'])
        ->name('settings.edit');
    Route::put('settings/{type}/update/{sub_type?}', [SettingsController::class, 'update'])
        ->name('settings.update');

    //Language
    Route::get('languages/settings', [LanguageController::class, 'settings'])->name('languages.settings');
    Route::get('languages/translations', [LanguageController::class, 'getTranslation'])->name('languages.translations');
    Route::put('languages/settings', [LanguageController::class, 'settingsUpdate'])->name('languages.update.settings');
    Route::put('languages/sync', [LanguageController::class, 'sync'])->name('languages.sync');
    Route::resource('languages', LanguageController::class)->except(['show', 'create']);

    //User Managements
    Route::get('users/{user}/resend-password-create-mail', [UsersController::class, 'resendPasswordCreateMail'])
        ->name('users.resend.password.create.mail');
    Route::resource('users', UsersController::class)->except(['create']);

    //Language
    Route::get('languages/settings', [LanguageController::class, 'settings'])
        ->name('languages.settings');
    Route::get('languages/translations', [LanguageController::class, 'getTranslation'])
        ->name('languages.translations');
    Route::put('languages/settings', [LanguageController::class, 'settingsUpdate'])
        ->name('languages.update.settings');
    Route::put('languages/sync', [LanguageController::class, 'sync'])
        ->name('languages.sync');
    Route::resource('languages', LanguageController::class)
        ->except('show');

    //Laravel Log Viewer
    Route::get('logs', [LogViewerController::class, 'index'])->name('logs.index');

    Route::resource('announcements', AnnouncementController::class);

    //Ticket Management
    Route::put('tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
    Route::put('tickets/{ticket}/resolve', [TicketController::class, 'resolve'])->name('tickets.resolve');
    Route::post('tickets/{ticket}/comment', [TicketController::class, 'comment'])->name('tickets.comment.store');
    Route::get('ticket/{ticket}/download-attachment/{fileName}', [TicketController::class, 'download'])->name('tickets.attachment.download');
    Route::resource('tickets', TicketController::class)->only(['index', 'show'])->names('tickets');

    Route::get('/components', function () {
        return view('admin.components-designs');
    })->name('component');
});
