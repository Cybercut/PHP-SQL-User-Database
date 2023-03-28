<?php
ob_start();
$conn = mysqli_connect("localhost", "someuser", "somepassword", "doctor");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM users";
include('fpdf.php');
$pdf = new FPDF();
$pdf->SetFont('Arial','B',12);
$pdf->AddPage();
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(40, 10, $row['name'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['address'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['mobno'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['email'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['password'], 1, 0, 'C');
    $pdf->Ln();
}
$pdf->Output("user_details.pdf", "D");
ob_end_flush();
mysqli_close($conn);
?>