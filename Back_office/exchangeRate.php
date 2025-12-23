<?php
header("Content-Type: application/json");
include "db_conn.php";

$from = $_GET['from'];
$to   = $_GET['to'];

$sql = "SELECT rate FROM exchange_rates 
        WHERE from_currency = ? AND to_currency = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $from, $to);
$stmt->execute();

$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        "fromCurrency" => $from,
        "toCurrency"   => $to,
        "rate"         => $row['rate']
    ]);
} else {
    echo json_encode([
        "error" => "Exchange rate not found"
    ]);
}
?>
