<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['payment_proof']) && isset($_POST['product'])) {
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($_FILES['payment_proof']['name']);
    $product = htmlspecialchars($_POST['product']);

    // Check if the file was uploaded successfully
    if (is_uploaded_file($_FILES['payment_proof']['tmp_name'])) {
        if (move_uploaded_file($_FILES['payment_proof']['tmp_name'], $upload_file)) {
            // Redirect to confirmation page
            header("Location: confirmation.html");
            exit();
        } else {
            echo "<p>Terjadi kesalahan saat mengunggah bukti pembayaran.</p>";
        }
    } else {
        echo "<p>File tidak berhasil diunggah.</p>";
    }
} else {
    echo "<p>Data tidak lengkap atau kesalahan saat memproses unggahan.</p>";
}
?>