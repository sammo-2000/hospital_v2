<?php
include "app/model/user.php";

class UserContro extends User
{
    private $userID;
    private $mobile;
    private $email;
    private $city;
    private $postcode;
    private $address;
    private $history;
    public function __construct($userID, $mobile, $email, $city, $postcode, $address, $history)
    {
        $this->userID = $userID;
        $this->mobile = $mobile;
        $this->email = strtolower($email);
        $this->city = strtolower($city);
        $this->postcode = strtoupper($postcode);
        $this->address = strtolower($address);
        $this->history = strtolower($history);
    }
    // Update user information from profile edit page
    public function updateUser()
    {
        if (empty($this->mobile) || empty($this->email) || empty($this->city) || empty($this->postcode) || empty($this->address)) {
            $_SESSION['error'] = "make sure all field are filled";
            header("location: /profile/edit/error");
            exit();
        }

        $sanitized_email = filter_var($this->email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "Please enter a valid email address";
            header("location: /profile/edit/error");
            exit();
        }

        $this->updateUserInfo($this->userID, $this->mobile, $this->email, $this->city, $this->postcode, $this->address, $this->history);
        $_SESSION['error'] = "profile updated";
        header("location: /profile/edit/success");
        exit();
    }
    // Get current user detail for profile page
    public function currentUser($userID)
    {
        return $this->getUserByID($userID);
    }
    // Get all users for search page
    public function getUsers()
    {
        return $this->getAllUsers();
    }
    // Get all doctor for appointment
    public function getAllDoctor()
    {
        return $this->getDoctors();
    }
    public function getAllReason()
    {
        return $this->getReasons();
    }
}
