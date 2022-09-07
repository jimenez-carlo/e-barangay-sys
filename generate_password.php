<?php
$password = readline("generate password hash: ");
echo $new = password_hash($password, PASSWORD_DEFAULT);
