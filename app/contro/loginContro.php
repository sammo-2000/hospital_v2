<?php
include "app/model/login.php";

class LoginContro extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = strtolower($username);
        $this->password = $password;
    }

    public function login()
    {
        // retrieves user info from the Login model by username
        $result = $this->getUserDetailByUsername($this->username);

        // checks if any field is empty and sets an error message in the session
        if (empty($this->username) || empty($this->password)) {
            $_SESSION['error'] = "make sure all field are filled";
            header("location: /login/error"); // redirects to error page
            exit(); // terminates the script
        }

        // checks if the username exists in the database and sets an error message in the session if it doesn't
        if ($this->username != $result['username']) {
            $_SESSION['error'] = "user not found";
            header("location: /login/error"); // redirects to error page
            exit(); // terminates the script
        }

        // checks if the password matches the hashed password stored in the database and sets an error message in the session if it doesn't
        if (!password_verify($this->password, $result['password'])) {
            $_SESSION['error'] = "invalid detail";
            header("location: /login/error"); // redirects to error page
            exit(); // terminates the script
        }

        $_SESSION['logged_on'] = true;
        $_SESSION['userID'] = $result['userID'];
        $_SESSION['registered'] = $result['registered'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['firstName'] = $result['first_name'];
        $_SESSION['lastName'] = $result['last_name'];
        header("location: /"); // redirects to the homepage
    }
}
