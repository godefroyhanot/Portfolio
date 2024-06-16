<?php
include 'config.php';

if ($pdo) {
    echo "Connection to the database was successful!";
} else {
    echo "Connection failed.";
}
?>
