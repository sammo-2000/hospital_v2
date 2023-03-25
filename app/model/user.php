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
}