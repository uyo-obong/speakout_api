<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [], function (\Dingo\Api\Routing\Router $api) {
    $api->group(['namespace' => 'Speakout\Modules\Account\Api\v1\Controllers'], function () use ($api) {

        // Account routes
        $api->group(['prefix' => 'account'], function () use ($api) {

            //User open routes
            $api->post('signup', 'AccountController@signup');
            $api->post('login', 'AccountController@login');


            //User authenticated routes
            $api->group(["middleware" => "jwt.auth"], function () use ($api) {

                $api->post("update/profile", "AccountController@updateUser");
                $api->get("logout", "AccountController@logout");

                // List all categories
                $api->group(['prefix' => 'category'], function () use ($api) {
                    $api->get('list', 'CategoryController@listCategories');
                    // List sub categories by agency
                    $api->get('by/agencies', 'CategoryController@getCategoryByAgencies');
                    // List  sub categories by executive
                    $api->get('by/excecutive', 'CategoryController@getCategoryByExcecutive');

                });

                // List all sub categories
                $api->group(['prefix' => 'subcategory'], function () use ($api) {
                    $api->get('list', 'CategoryController@listSubCategory');
                });


            });
        });
    });
});
