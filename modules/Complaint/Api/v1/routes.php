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
    $api->group(['namespace' => 'Speakout\Modules\Complaint\Api\v1\Controllers'], function () use ($api) {

        // Complaint routes
        $api->group(['prefix' => 'complaint'], function () use ($api) {

            // authenticated routes
            $api->group(["middleware" => "jwt.auth"], function () use ($api) {

                $api->get("by/user", "ComplaintController@getComplaintByUser");
                $api->post("agencies", "ComplaintController@agencies");
                $api->post("legislature", "ComplaintController@legislature");
                $api->post("executive", "ComplaintController@executiv");
                $api->post("judiciary", "ComplaintController@judiciary");
                $api->post("state", "ComplaintController@state");
                $api->post("local", "ComplaintController@localGov");

            });
        });
    });
});
