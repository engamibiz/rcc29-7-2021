<?php
 // echo sha1('123456') . 'ahmed';
// echo md5('123456');
echo password_hash('123456',PASSWORD_BCRYPT);