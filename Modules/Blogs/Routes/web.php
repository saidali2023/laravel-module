<?php

use Modules\Blogs\Http\Controllers\BlogsController;

Route::middleware('auth')->prefix('app/blogs')->group(function() {
    Route::get('/', [BlogsController::class, 'index'])->name('app.blogs.index');
    Route::get('create', [BlogsController::class, 'create'])->name('app.blogs.create');
    Route::post('create', [BlogsController::class, 'store'])->name('app.blogs.store');
    Route::get('edit/{id}', [BlogsController::class, 'edit'])->name('app.blogs.edit');
    Route::patch('edit/{id}', [BlogsController::class, 'update'])->name('app.blogs.update');
    Route::delete('delete/{id}', [BlogsController::class, 'destroy'])->name('app.blogs.delete');
});
