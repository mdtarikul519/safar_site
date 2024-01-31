<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'],

    function () {
        Route::group(['prefix' => '/user', 'middleware' => ['guest:api']], function () {
            Route::post('/get-token', 'Auth\ApiLoginController@get_token');
            Route::post('/api-login', 'Auth\ApiLoginController@login');
            Route::post('/api-register', 'Auth\ApiLoginController@register');
            Route::get('/auth-check', 'Auth\ApiLoginController@auth_check');
            Route::post('/forget-mail', 'Auth\ApiLoginController@forget_mail');
            Route::post('/check-code', 'Auth\ApiLoginController@check_code');
            Route::post('/logout-from-all-devices', 'Auth\ApiLoginController@logout_from_all_devices');
        });

        // Route::group(['middleware' => ['auth:api']], function () {
        Route::group([], function () {
            Route::group(['prefix' => 'user'], function () {
                Route::post('/api-logout', 'Auth\ApiLoginController@logout');
                Route::post('/user_info', 'Auth\ApiLoginController@user_info');
                Route::post('/check-auth', 'Auth\ApiLoginController@check_auth');
                Route::post('/user_update', 'Auth\ApiLoginController@user_update');
                Route::post('/update_password', 'Auth\ApiLoginController@update_password');
                Route::post('/find-user-info', 'Auth\ApiLoginController@find_user_info');
            });

            Route::group(['prefix' => 'user'], function () {
                Route::post('/update-profile', 'Auth\ProfileController@update_profile');
                Route::get('/all', 'Auth\UserController@all');
                Route::get('/{id}', 'Auth\UserController@show');
                Route::post('/store', 'Auth\UserController@store');
                Route::post('/canvas-store', 'Auth\UserController@canvas_store');
                Route::post('/update', 'Auth\UserController@update');
                Route::post('/soft-delete', 'Auth\UserController@soft_delete');
                Route::post('/destroy', 'Auth\UserController@destroy');
                Route::post('/restore', 'Auth\UserController@restore');
                Route::post('/bulk-import', 'Auth\UserController@bulk_import');
            });

            Route::group(['prefix' => 'user-role'], function () {
                Route::get('/all', 'Auth\UserRoleController@all');
                Route::post('/store', 'Auth\UserRoleController@store');
                Route::post('/canvas-store', 'Auth\UserRoleController@canvas_store');
                Route::post('/update', 'Auth\UserRoleController@update');
                Route::post('/canvas-update', 'Auth\UserRoleController@canvas_update');
                Route::post('/soft-delete', 'Auth\UserRoleController@soft_delete');
                Route::post('/destroy', 'Auth\UserRoleController@destroy');
                Route::post('/restore', 'Auth\UserRoleController@restore');
                Route::post('/bulk-import', 'Auth\UserRoleController@bulk_import');
                Route::get('/{id}', 'Auth\UserRoleController@show');
            });

            Route::group(['prefix' => 'program'], function () {
                Route::get('/all', 'safor\ProgramController@all');
                Route::post('/store', 'safor\ProgramController@store');
                Route::post('/canvas-store', 'safor\ProgramController@canvas_store');
                Route::post('/update', 'safor\ProgramController@update');
                Route::post('/canvas-update', 'safor\ProgramController@canvas_update');
                Route::post('/soft-delete', 'safor\ProgramController@soft_delete');
                Route::post('/destroy', 'safor\ProgramController@destroy');
                Route::post('/restore', 'safor\ProgramController@restore');
                Route::post('/bulk-import', 'safor\ProgramController@bulk_import');
                Route::get('/{id}', 'safor\ProgramController@show');
            });

            Route::group(['prefix' => 'schedule'], function () {
                Route::get('/all', 'safor\ScheduleController@all');

                Route::post('/store', 'safor\ScheduleController@store');

                Route::post('/store-by-admin', 'safor\ScheduleController@store_by_admin');
                Route::post('/store-by-branch', 'safor\ScheduleController@store_by_branch');


                Route::get('/accepted-by-admin/{id}', 'safor\ScheduleController@acceptd_by_admin');
                 
                Route::get('/accepted-by-secretariat/{id}', 'safor\ScheduleController@accepted_by_secretariat');
                Route::get('/rejected-by-secretariat/{id}', 'safor\ScheduleController@rejected_by_secretariat');

                Route::post('/admin-asign-secretariat', 'safor\ScheduleController@admin_asign_secretariat');
          

                Route::post('/canvas-store', 'safor\ScheduleController@canvas_store');
                Route::post('/update', 'safor\ScheduleController@update');
                Route::post('/canvas-update', 'safor\ScheduleController@canvas_update');
                Route::post('/soft-delete', 'safor\ScheduleController@soft_delete');
                Route::post('/destroy', 'safor\ScheduleController@destroy');
                Route::post('/restore', 'safor\ScheduleController@restore');
                Route::post('/bulk-import', 'safor\ScheduleController@bulk_import');
                Route::get('/{id}', 'safor\ScheduleController@show');
            });
           

            Route::group(['prefix' => 'schedule_voucher'], function () {
                Route::get('/all', 'safor\ScheduleVoucherController@all');
                Route::post('/store', 'safor\ScheduleVoucherController@store');
                Route::post('/canvas-store', 'safor\ScheduleVoucherController@canvas_store');
                Route::post('/update', 'safor\ScheduleVoucherController@update');
                Route::post('/canvas-update', 'safor\ScheduleVoucherController@canvas_update');
                Route::post('/soft-delete', 'safor\ScheduleVoucherController@soft_delete');
                Route::post('/destroy', 'safor\ScheduleVoucherController@destroy');
                Route::post('/restore', 'safor\ScheduleVoucherController@restore');
                Route::post('/bulk-import', 'safor\ScheduleVoucherController@bulk_import');
                Route::get('/{id}', 'safor\ScheduleVoucherController@show');
            });

            Route::group(['prefix' => 'Secretari_atective_status'], function () {
                Route::get('/all', 'safor\SecretariAtectiveStatusController@all');
                Route::post('/store', 'safor\SecretariAtectiveStatusController@store');
                Route::post('/canvas-store', 'safor\SecretariAtectiveStatusController@canvas_store');
                Route::post('/update', 'safor\SecretariAtectiveStatusController@update');
                Route::post('/canvas-update', 'safor\SecretariAtectiveStatusController@canvas_update');
                Route::post('/soft-delete', 'safor\SecretariAtectiveStatusController@soft_delete');
                Route::post('/destroy', 'safor\SecretariAtectiveStatusController@destroy');
                Route::post('/restore', 'safor\SecretariAtectiveStatusController@restore');
                Route::post('/bulk-import', 'safor\SecretariAtectiveStatusController@bulk_import');
                Route::get('/{id}', 'safor\SecretariAtectiveStatusController@show');
            });

            Route::group(['prefix' => 'user'], function () {
                Route::get('/all', 'safor\UserController@all');
                Route::post('/store', 'safor\UserController@store');
                Route::post('/canvas-store', 'safor\UserController@canvas_store');
                Route::post('/update', 'safor\UserController@update');
                Route::post('/canvas-update', 'safor\UserController@canvas_update');
                Route::post('/soft-delete', 'safor\UserController@soft_delete');
                Route::post('/destroy', 'safor\UserController@destroy');
                Route::post('/restore', 'safor\UserController@restore');
                Route::post('/bulk-import', 'safor\UserController@bulk_import');
                Route::get('/{id}', 'safor\UserController@show');
            });    
            
        
        });
    }
);
