<?php
$cart = [
    ['name' => 'Mechanical Keyboard', 'price' => 120.00, 'qty' => 1],
    ['name' => 'Wireless Mouse',      'price' => 45.50,  'qty' => 2],
    ['name' => 'Desk Mat',            'price' => 25.00,  'qty' => 0], // Out of stock
];

// Bonus: Filter out items with 0 quantity (uses array_filter + arrow function)
$activeCart = array_filter($cart, fn($item) => $item['qty'] > 0);

// 2. Initialize Total
$cartTotal = 0;
?>
<!-- HTML Output -->
<div style="font-family: sans-serif; padding: 20px; border: 1px solid #0f766e;">
    <h3>Order Summary</h3>
    <ul>
        <?php
        // 3. Iterate and Calculate
        foreach ($activeCart as $item) {
            $subtotal = $item['price'] * $item['qty'];
            $cartTotal += $subtotal;

            echo "<li>{$item['name']} (x{$item['qty']}) - $" . number_format($subtotal, 2) . "</li>";
        }
        ?>
    </ul>
    <hr>
    <h4>Total Amount Due: $<?= number_format($cartTotal, 2) ?></h4>
</div>