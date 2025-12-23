<?php
header("Content-Type: application/json");
include "db_conn.php";

$from   = $_GET['from'];
$to     = $_GET['to'];
$amount = $_GET['amount'];

$sql = "SELECT rate FROM exchange_rates 
        WHERE from_currency = ? AND to_currency = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $from, $to);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    $rate = $row['rate'];
    $convertedAmount = $amount * $rate;

    echo json_encode([
        "fromCurrency"     => $from,
        "toCurrency"       => $to,
        "amount"           => $amount,
        "rate"             => $rate,
        "convertedAmount"  => $convertedAmount
    ]);

} else {
    echo json_encode([
        "error" => "Conversion not available"
    ]);
}
?>
