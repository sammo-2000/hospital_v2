<?php
include_once "dbh.php";
class Delete extends Dbh
{
    protected function getAllReasons()
    {
        $sql = 'SELECT * FROM `delete-reason`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function addNewReason($reason)
    {
        $sql = 'INSERT INTO `delete-reason` (`reason_name`) VALUES (?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reason]);
    }
    protected function getAllAppointmentReasons()
    {
        $sql = 'SELECT * FROM `reason`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function addNewAppointmentReason($reason)
    {
        $sql = 'INSERT INTO `reason` (`reason_name`) VALUES (?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$reason]);
    }
    protected function deleteReasons($id)
    {
        $sql = 'DELETE FROM `delete-reason` WHERE `reasonID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    protected function deleteAppointments($id)
    {
        $sql = 'DELETE FROM `reason` WHERE `reasonID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    protected function getAllContacts()
    {
        $sql = 'SELECT * FROM `contact`';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    protected function deleteContacts($id)
    {
        $sql = 'DELETE FROM `contact` WHERE `contactID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
