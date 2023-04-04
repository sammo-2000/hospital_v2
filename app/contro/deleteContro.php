<?php
include "app/model/delete.php";

class DeleteContro extends Delete
{
    public function getAllReason()
    {
        return $this->getAllReasons();
    }
    public function addReason($reason)
    {
        $this->addNewReason($reason);
    }
    public function getAllAppointmentReason()
    {
        return $this->getAllAppointmentReasons();
    }
    public function addAppointmentReason($reason)
    {
        $this->addNewAppointmentReason($reason);
    }
    public function deleteReason($id)
    {
        $this->deleteReasons($id);
    }
    public function deleteAppointment($id)
    {
        $this->deleteAppointments($id);
    }
    public function getAllContact()
    {
        return $this->getAllContacts();
    }
    public function deleteContact($id)
    {
        $this->deleteContacts($id);
    }
}
