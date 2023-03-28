<?php
include_once "dbh.php";
class SignUp extends Dbh
{
    protected function isUserNameTaken($username)
    {
        $sql = 'SELECT * FROM `user` WHERE `username` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    protected function signUpUser($username, $email, $password)
    {
        $sql = 'INSERT INTO `user` (`username`, `email`, `password`) VALUE (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $password]);
    }
}
