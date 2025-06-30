<?php
require_once 'MoneyAdder.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount1 = (float)$_POST['amount1'];
    $currency1 = $_POST['currency1'];
    $amount2 = (float)$_POST['amount2'];
    $currency2 = $_POST['currency2'];
    $targetCurrency = $_POST['targetCurrency'];

    $moneyAdder = new MoneyAdder();
    try {
        $result = $moneyAdder->add($amount1, $currency1, $amount2, $currency2, $targetCurrency);
        $message = "Total amount in $targetCurrency: " . number_format($result, 2);
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Adder</title>
</head>
<body>
    <h1>Add Two Monetary Amounts</h1>
    <form method="POST">
        <label>Amount 1: <input type="number" step="0.01" name="amount1" required></label>
        <label>Currency 1:
            <select name="currency1">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </label>
        <br><br>
        <label>Amount 2: <input type="number" step="0.01" name="amount2" required></label>
        <label>Currency 2:
            <select name="currency2">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </label>
        <br><br>
        <label>Target Currency:
            <select name="targetCurrency">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>
        </label>
        <br><br>
        <button type="submit">Add</button>
    </form>

    <?php if (isset($message)): ?>
        <h2><?php echo $message; ?></h2>
    <?php endif; ?>
</body>
</html>
