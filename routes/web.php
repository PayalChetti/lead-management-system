<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadStatusController;
use App\Http\Controllers\LeadSourceController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ReportController;

Route::prefix('reports')->group(function () {

    Route::get('/', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/lead-summary', [ReportController::class, 'leadSummary'])
        ->name('reports.lead-summary');

    Route::get('/status', [ReportController::class, 'statusReport'])
        ->name('reports.status');

    Route::get('/source', [ReportController::class, 'sourceReport'])
        ->name('reports.source');

    Route::get('/followup', [ReportController::class, 'followupReport'])
        ->name('reports.followup');

    Route::get('/revenue', [ReportController::class, 'revenueReport'])
        ->name('reports.revenue');
});

Route::get(
    '/leads/export/excel',
    [LeadController::class, 'exportExcel']
)
    ->name('leads.export.excel');

Route::get(
    '/leads/export/pdf',
    [LeadController::class, 'exportPdf']
)
    ->name('leads.export.pdf');

Route::get(
    '/reports/revenue',
    [ReportController::class, 'revenueReport']
)
    ->name('reports.revenue');

Route::get('/reports/followup', [ReportController::class, 'followupReport'])
    ->name('reports.followup');

Route::get('/reports/source', [ReportController::class, 'sourceReport'])
    ->name('reports.source');

Route::get('/reports/status', [ReportController::class, 'statusReport'])
    ->name('reports.status');

Route::resource('leads', LeadController::class);

Route::resource('lead-source', LeadSourceController::class);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('follow-ups', FollowUpController::class);

Route::resource('lead-status', LeadStatusController::class);
require __DIR__ . '/auth.php';
