<?php
include "dbh.php";
class Register extends Dbh
{
    protected function registerUser($userID, $first_name, $last_name, $mobile, $dob, $city, $postcode, $address, $history = null)
    {
        $sql = 'UPDATE `user` SET `first_name` = ?, `last_name` = ?, `mobile` = ?, `dob` = ?, `city` = ?, `postcode` = ?, `address` = ?, `history` = ?, `registered` = ? WHERE `userID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$first_name, $last_name, $mobile, $dob, $city, $postcode, $address, $history, 'true', $userID]);
    }
}
