<?php
require_once 'models/UserModel.php';
require_once 'config.php';

class PasswordResetController {
    private $userModel;

    public function __construct() {
        $pdo = getDbConnection();
        $this->userModel = new UserModel($pdo);
    }

    public function requestReset() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $user = $this->userModel->findByEmail($email);
            if ($user) {
                $token = bin2hex(random_bytes(50));
                $this->userModel->savePasswordResetToken($email, $token);
                echo "Check your email for the password reset link.";
            } else {
                echo "No user found with that email address.";
            }
        } else {
            require 'views/password_reset_request.php';
        }
    }

    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $newPassword = $_POST['new_password'];
            $user = $this->userModel->findByResetToken($token);
            if ($user) {
                $this->userModel->updatePassword($user['id'], $newPassword);
                echo "Your password has been updated.";
            } else {
                echo "Invalid or expired token.";
            }
        } else {
            $token = $_GET['token'] ?? '';
            require 'views/password_reset.php';
        }
    }
}
?>
