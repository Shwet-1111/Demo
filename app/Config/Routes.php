<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/payment', 'RazorpayController::index');
$routes->post('/payment/create-order', 'RazorpayController::createOrder');
$routes->get('/payment/payment-success', 'RazorpayController::paymentSuccess');
$routes->get('/payment/payment-failure', 'RazorpayController::paymentFailure');