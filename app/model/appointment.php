<?php
include_once "dbh.php";
class Appointment extends Dbh
{
    protected function isTaken($date, $time, $doctor)
    {
        $sql = 'SELECT * FROM `appointment` WHERE `date` = ? AND `time` = ? AND `doctor` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$date, $time, $doctor]);
        $stmt->fetch();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    protected function createAppointment($patientID, $date, $time, $doctor, $reason, $extra)
    {
        $sql = 'INSERT INTO `appointment` (`patientID`, `date`, `time`, `doctor`, `reason`, `extra`) VALUE (?, ?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$patientID, $date, $time, $doctor, $reason, $extra]);
    }
    protected function updateResults($appointmentID, $result)
    {
        $sql = 'UPDATE `appointment` SET `result` = ? WHERE `appointmentID` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$result, $appointmentID]);
    }
}
