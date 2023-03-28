<?php
include_once "dbh.php";
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
    protected function getAllUsers()
    {
        $sql = 'SELECT * FROM `user`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getDoctors()
    {
        $sql = 'SELECT * FROM `user` WHERE `role` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['doctor']);
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getReasons()
    {
        $sql = 'SELECT * FROM `reason`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
