<?php
use App\Http\Controllers\User\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\AnnouncementController;

//User profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('profile/change-password/update', [ProfileController::class, 'updatePassword'])
    ->name('profile.update-password');
Route::put('profile/avatar/update', [ProfileController::class, 'avatarUpdate'])->name('profile.avatar.update');
Route::get('profile/verification', [ProfileController::class, 'verificationMailRequest'])
    ->name('profile.verification.mail.request');

//User Specific Notice
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
// Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('notifications/{notification}/read', [NotificationController::class, 'markAsRead'])
    ->name('notifications.mark-as-read');
Route::get('notifications/{notification}/unread', [NotificationController::class, 'markAsUnread'])
    ->name('notifications.mark-as-unread');

//Ticket Management
Route::put('tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
Route::post('tickets/{ticket}/comment', [TicketController::class, 'comment'])->name('tickets.comment.store');
Route::get('ticket/{ticket}/download-attachment/{fileName}', [TicketController::class, 'download'])
    ->name('tickets.attachment.download');
Route::resource('tickets', TicketController::class)->only(['index', 'store', 'show', 'create']);

//Announcement List
Route::resource('announcements', AnnouncementController::class)->only(['index','show']);
