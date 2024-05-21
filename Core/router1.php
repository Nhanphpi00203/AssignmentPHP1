<?php
require_once 'controllers/PasswordResetController.php';

$controller = new PasswordResetController();

if ($_SERVER['REQUEST_URI'] === '/request_reset') {
    $controller->requestReset();
} elseif ($_SERVER['REQUEST_URI'] === '/reset_password') {
    $controller->resetPassword();
} else {
    echo "404 Not Found";
}
?>
