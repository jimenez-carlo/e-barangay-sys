<?php
$password = readline("generate password hash: ");
echo password_hash($password, PASSWORD_DEFAULT);
