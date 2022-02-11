<?php
require './vendor/autoload.php';
header('Content-Type', 'application/json');

// \Stripe\Stripe::setApiKey("sk_test_51KS6hlG9xVZzyAjOIxKi8QKTeq0HFClXV4L3L2Q6cGK3O4b1t8EQLktTZJQCviYxb9lwyYbDslsFlBwFRgG2reAS00Fq3bVXDI");
// $session = Stripe\Checkout\Session::create([...]);

$stripe = new Stripe\StripeClient("sk_test_51KS6hlG9xVZzyAjOIxKi8QKTeq0HFClXV4L3L2Q6cGK3O4b1t8EQLktTZJQCviYxb9lwyYbDslsFlBwFRgG2reAS00Fq3bVXDI");
$session= $stripe->checkout->sessions->create([
    "success_url" => "http://localhost:8080/LicentaV2/success.php",
    "cancel_url" => "http://localhost:8080/LicentaV2/cancel.php",
    "payment_method_types" =>['card', 'paypal'],
    "mode" => 'payment',
    "line_items" => [
        [
            "price_data" =>[
                "currency" =>"lei",
                "product_data" =>[
                    "name" => "Masina",
                    "description" => "Descriere"
                ],
                "unit_amount" => 200
            ],
            "quantity" => 1
        ]
    ]
]);

echo json_encode($session);

?>