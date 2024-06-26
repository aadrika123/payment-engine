<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/payment'], function () use ($router) {
    $router->post('/verify-payment-status', 'PaymentGatewayController@verifyPaymentStatus');
    $router->post('/generate-orderid', 'PaymentGatewayController@saveGenerateOrderid');
    $router->post('/razorpay-webhook', 'PaymentGatewayController@gettingWebhookDetails');
    $router->post('/get-tran-by-orderid', 'PaymentGatewayController@getTranByOrderId');
    
});
