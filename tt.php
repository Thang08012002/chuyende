<form action="process_payment.php" method="POST">
    <label for="full_name">Full Name</label>
    <input type="text" name="full_name" required><br>

    <label for="address">Shipping Address</label>
    <input type="text" name="address" required><br>

    <label for="email">Email</label>
    <input type="email" name="email" required><br>

    <label for="payment_method">Payment Method</label>
    <select name="payment_method" required>
        <option value="credit_card">Credit Card</option>
        <option value="paypal">PayPal</option>
        <option value="bank_transfer">Bank Transfer</option>
        <option value="cash_on_delivery">Cash on Delivery</option>
    </select><br>

    <button type="submit" name="pay">Proceed to Payment</button>
</form>
