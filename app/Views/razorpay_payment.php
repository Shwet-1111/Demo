<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>

    <!-- Razorpay Script -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
<!-- Modal HTML -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <input type="text" name="username" class="form-control mb-3" id="username" placeholder="Enter username">
                    <input type="text" name="amount" class="form-control mb-3" id="amount" placeholder="Enter amount">
                    <button type="button" class="btn btn-success" id="payBtnModal">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Open the modal when the page loads
    var myModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    myModal.show();
});

document.getElementById('payBtnModal').addEventListener('click', function() {
    var username = document.getElementById('username').value;
    var amount = document.getElementById('amount').value;

    if (username && amount) {
        // Make AJAX request to create Razorpay order
        fetch('/payment/create-order', {  // Ensure this matches the route in CodeIgniter
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ amount: amount })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                var options = {
                    key: 'rzp_test_caghOIEgx1UIr3', // Replace with your Razorpay API key
                    amount: data.amount, // Amount in paise
                    currency: data.currency,
                    order_id: data.order_id,
                    name: username,
                    description: 'Payment for ' + username,
                    handler: function(response) {
                        // Handle success here, e.g., redirect to success page or display a success message
                        window.location.href = '/payment/payment-success'; // Redirect to payment success page
                    },
                    prefill: {
                        name: username,
                        email: 'email@example.com', // Replace with the user's email
                        contact: '1234567890' // Replace with the user's contact number
                    },
                    theme: {
                        color: '#F37254' // Customize the color
                    }
                };

                // Open Razorpay Checkout
                var rzp = new Razorpay(options);
                rzp.open();
            } else {
                alert('Error creating order. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something went wrong.');
        });
    } else {
        alert("Please enter username and amount");
    }
});
</script>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
