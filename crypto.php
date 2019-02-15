<?php

// salt will be created randomly per password and stored in the database
// Work out how to store password and salt together as JSON in database


$password = "password";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "-".$hashed_password."-";

// echo $hashed_password;

$newPassword = "password";

if(password_verify($newPassword,$hashed_password))
    echo "Welcome";

    else
    echo "Wrong Password";