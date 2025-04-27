<?php

use kabir\LaravelPermissionEditor\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::prefix('permission-editor')->name('permission-editor.')->group(function () {
    Route::resource('roles', RoleController::class);
});
