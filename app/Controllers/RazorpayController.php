<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    // Create Razorpay Order
    public function index()
    {
        return view('razorpay_payment');
    }
    public function createOrder()
    {
        $apiKey = 'rzp_test_caghOIEgx1UIr3'; // Replace with your Razorpay API Key
        $apiSecret = 'EDt5bdXTi9aNini7DjUtZ1cW'; // Replace with your Razorpay Secret Key

        // Get amount from request (assume you're passing the amount via AJAX or POST)
        $amount = $this->request->getPost('amount');  // Amount in INR (no need for paise conversion, Razorpay handles that)

        if (!$amount) {
            return json_encode(['status' => 'error', 'message' => 'Amount is required']);
        }

        // Initialize Razorpay API client
        $api = new Api($apiKey, $apiSecret);

        try {
            $order = $api->orders->create([
                'amount' => $amount * 100,  // Amount in paise (1 INR = 100 paise)
                'currency' => 'INR',
                'receipt' => uniqid(),  // Unique receipt ID
                'payment_capture' => 1
            ]);
            return $this->response->setJSON([
                'status' => 'success',
                'order_id' => $order->id,
                'amount' => $order->amount,
                'currency' => $order->currency
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    // Handle payment success
    public function paymentSuccess()
    {
        // Handle payment success here (e.g., save transaction to the database)
        return view('payment_success');
    }

    // Handle payment failure
    public function paymentFailure()
    {
        // Handle payment failure here
        return view('payment_failure');
    }
}
