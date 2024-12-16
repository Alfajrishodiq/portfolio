<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);  // Pastikan nama inputnya adalah 'message'

    include 'koneksi.php'; // Pastikan koneksi berhasil

    // Menyusun query SQL untuk menyimpan data
    // Perhatikan bahwa kolom terakhir 'massage' tidak ada koma
    $sql = "INSERT INTO pesan (name, email, message) VALUES ('$name', '$email', '$message')";

    // Menjalankan query dan memeriksa hasilnya
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn); // Menutup koneksi

    // Tampilkan data dalam format invoice untuk printer kasir
    $tampil = "\
    
    <style>
        body {font-family: Arial, sans-serif;}
        .invoice {width: 300px; margin: 0 auto;}
        .header, .footer {text-align: center;}
        .content {margin: 20px 0;}
        table {width: 100%;}
        th, td {text-align: left; padding: 5px; border-bottom: 1px solid #000;}
        .footer {margin-top: 20px;} /* Menambahkan margin untuk pemisahan */
    </style>
    <div class='invoice'>
        <div class='header'>
            <h2>Invoice</h2>
            <p>Data Pengguna</p>
        </div>
        <div class='content'>
            <table>
                <tr>
                    <th>Nama</th>
                    <td>{$name}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{$email}</td>
                </tr>
                <tr>
                    <th>Pesan</th>
                    <td>{$message}</td>
                </tr>
            </table>
        </div>
    </div>";

    // Output hasil
    echo $tampil;

} else {
    // Jika tidak ada data yang disubmit, tampilkan pesan alternatif
    echo "<p style='text-align: center; font-size: 18px;'>Data tidak disubmit.</p>";
}
?>
