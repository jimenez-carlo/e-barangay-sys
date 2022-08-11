<?php
$password = readline("generate password: ");
echo password_hash($password, PASSWORD_DEFAULT);
