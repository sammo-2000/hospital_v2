<?php
include "app/model/appointment.php";

class AppointmentContro extends Appointment
{
    private $patientID;
    private $date;
    private $time;
    private $doctor;
    private $reason;
    private $extra;

    public function __construct($patientID, $date, $time, $doctor, $reason, $extra)
    {
        $this->patientID = $patientID;
        $this->date = $date;
        $this->time = $time;
        $this->doctor = $doctor;
        $this->reason = strtolower($reason);
        $this->extra = strtolower($extra);
    }
    public function book()
    {
        if (empty($this->date) || empty($this->time) || empty($this->doctor) || empty($this->reason)) {
            $_SESSION['error'] = "Please make sure all fields are filled";
            header("location: /appointment/book/$this->patientID/error");
            exit();
        }

        if ($this->isTaken($this->date, $this->time, $this->doctor)) {
            $_SESSION['error'] = "sorry time slot is taken";
            header("location: /appointment/book/$this->patientID/error");
            exit();
        }

        $this->createAppointment($this->patientID, $this->date, $this->time, $this->doctor, $this->reason, $this->extra,);
        $_SESSION['error'] = "appointment created";
        header("location: /appointment/book/$this->patientID/success");
        exit();
    }
    public function updateResult()
    {
        $this->updateResults($this->patientID, $this->extra);
    }
    public function deleteAppointment()
    {
        $this->deleteAppointmentByID($this->patientID);
    }
}
