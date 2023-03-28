<?php
include "dbh.php";
class User extends Dbh
{
    protected function getUserByID($userID)
    {
        $sql = 'SELECT * FROM `user` WHERE `userID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID]);
        $result = $stmt->fetch();
        return $result;
    }
    protected function updateUserInfo($userID, $mobile, $email, $city, $postcode, $address, $history)
    {
        $sql = 'UPDATE `user` SET `mobile` = ?, `email` = ?, `city` = ?, `postcode` = ?, `address` = ?, `history` = ? WHERE `userID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$mobile, $email, $city, $postcode, $address, $history, $userID]);
    }
}
