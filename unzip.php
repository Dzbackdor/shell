<?php
// Konfigurasi file zip dan direktori ekstraksi
$zipFile = 'index.zip';         // Nama file zip
$extractPath = '/var/www/html/makhuduthamaga/documents/';   // Direktori tujuan ekstraksi

// Validasi keberadaan file zip
if (!file_exists($zipFile)) {
    die("Error: File zip '$zipFile' tidak ditemukan!");
}

// Membuat direktori ekstraksi jika belum ada
if (!is_dir($extractPath)) {
    if (!mkdir($extractPath, 0755, true)) {
        die("Error: Gagal membuat direktori ekstraksi!");
    }
}

// Inisialisasi ZipArchive
$zip = new ZipArchive();
$status = $zip->open($zipFile);

// Proses ekstraksi file
if ($status === TRUE) {
    try {
        $zip->extractTo($extractPath);
        $zip->close();
        echo "File berhasil di-unzip ke direktori: $extractPath";
    } catch (Exception $e) {
        die("Error: Ekstraksi gagal - " . $e->getMessage());
    }
} else {
    // Pesan error berdasarkan kode error
    switch ($status) {
        case ZipArchive::ER_NOENT:
            $error = "File tidak ditemukan";
            break;
        case ZipArchive::ER_READ:
            $error = "Gagal membaca file";
            break;
        case ZipArchive::ER_OPEN:
            $error = "Gagal membuka file";
            break;
        case ZipArchive::ER_INCONS:
        case ZipArchive::ER_CRC:
            $error = "File zip korup atau rusak";
            break;
        default:
            $error = "Kode error: $status";
            break;
    }
    die("Error: $error");
}
?>