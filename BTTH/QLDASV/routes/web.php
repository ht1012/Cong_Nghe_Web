<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Đường dẫn hiển thị danh sách 

Route::get('/', [IssueController::class, 'index'])->name('issues.index');

// (hiển thị form thêm mới)
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');

//  (thực hiện thêm mới)
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

// (tuỳ chọn)
Route::get('/issues/{id}', [IssueController::class, 'show'])->name('issues.show');

//(hiển thị form chỉnh sửa)
Route::get('/issues/{id}/edit', [IssueController::class, 'edit'])->name('issues.edit');

//  (thực hiện cập nhật)
Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
