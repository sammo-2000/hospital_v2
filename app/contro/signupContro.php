<?php
include "app/model/signup.php";

class SignUpContro extends SignUp
{
    private $username;
    private $email;
    private $password;
    private $password_confirm;

    public function __construct($username, $email, $password, $password_confirm)
    {
        $this->username = strtolower($username);
        $this->email = strtolower($email);
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    public function signup()
    {
        // Check if all fields are filled
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->password_confirm)) {
            $_SESSION['error'] = "Please make sure all fields are filled.";
            header("location: /signup/error");
            exit();
        }

        // Check if username is already taken
        if ($this->isUserNameTaken($this->username)) {
            $_SESSION['error'] = "Sorry, that username is already taken.";
            header("location: /signup/error");
            exit();
        }

        // Check if username only contains letters and numbers and is between 3 and 20 characters
        if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $this->username)) {
            $_SESSION['error'] = "Please make sure your username only contains letters and numbers and is between 3 and 20 characters long.";
            header("location: /signup/error");
            exit();
        }

        // Check if password and confirm password match
        if ($this->password != $this->password_confirm) {
            $_SESSION['error'] = "Please make sure your passwords match.";
            header("location: /signup/error");
            exit();
        }

        // Check password length
        if (strlen($this->password) < 5 || strlen($this->password) > 20) {
            $_SESSION['error'] = "Please make sure your password is between 5 and 20 characters long.";
            header("location: /signup/error");
            exit();
        }

        // Sanitize email address
        $sanitized_email = filter_var($this->email, FILTER_SANITIZE_EMAIL);

        // Check if email address is valid
        if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Please enter a valid email address.";
            header("location: /signup/error");
            exit();
        }

        // Hash the password using the default algorithm
        $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);

        // Store the user's info in the database
        $this->signUpUser($this->username, $this->email, $hashed_password);

        // Redirect to the login page with a success message
        $_SESSION['error'] = "User created successfully. You can now log in.";
        header("location: /login/success");
        exit();
    }
}
