<?php
include "app/model/user.php";

class UserContro extends User
{
    public function currentUser($userID)
    {
        return $this->getUserByID($userID);
    }
}
