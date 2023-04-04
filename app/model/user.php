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
    protected function getUpcomingAppointments($id, $date)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM `appointment` WHERE `date` >= ? AND `patientID` = ? ORDER BY `appointmentID` ASC';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function getOldAppointments($id, $date)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM `appointment` WHERE `date` < ? AND `patientID` = ? ORDER BY `appointmentID` DESC';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function deleteAccount($id, $option, $reason)
    {
        // Insert reason 
        $sql = 'INSERT INTO `deleted-account` (`userID`, `options`, `reason`) VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $option, $reason]);
        // Delete account
        $sql = 'DELETE FROM `user` WHERE `userID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    protected function getDoctorAppointments($date, $doctor)
    {
        $date = date('Y-m-d');
        $sql = 'SELECT * FROM `appointment` WHERE `date` >= ? AND `doctor` = ? ORDER BY `date` ASC';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $doctor]);
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function contactUs($name, $email, $reason)
    {
        $sql = 'INSERT INTO `contact` (`name`, `email`, `reason`) VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $email, $reason]);
    }
    protected function updateUserRole($userID, $role)
    {
        $sql = 'UPDATE `user` SET `role` = ? WHERE `userID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$role, $userID]);
    }
}
