<?php
include "app/model/register.php";

class RegisterContro extends Register
{
    private $userID;
    private $first_name;
    private $last_name;
    private $mobile;
    private $dob;
    private $city;
    private $postcode;
    private $address;
    private $history;
    public function __construct($userID, $first_name, $last_name, $mobile, $dob, $city, $postcode, $address, $history = null)
    {
        $this->userID = $userID;
        $this->first_name = strtolower($first_name);
        $this->last_name = strtolower($last_name);
        $this->mobile = $mobile;
        $this->dob = $dob;
        $this->city = strtolower($city);
        $this->postcode = strtoupper($postcode);
        $this->address = strtolower($address);
        $this->history = strtolower($history);
    }
    public function register()
    {
        if (empty($this->first_name) || empty($this->last_name) || empty($this->mobile) || empty($this->dob) || empty($this->city) || empty($this->postcode) || empty($this->address)) {
            $_SESSION['error'] = "make sure all field are filled";
            header("location: /register/error");
            exit();
        }

        $this->registerUser($this->userID, $this->first_name, $this->last_name, $this->mobile, $this->dob, $this->city, $this->postcode, $this->address, $this->history);
        $_SESSION['registered'] = true;
        header("location: /profile");
    }
}
