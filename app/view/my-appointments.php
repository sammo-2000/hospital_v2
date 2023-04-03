<?php
$title = "My Appointment";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
$appointments = $user->getDoctorAppointment();
include "app/view/include/head.php";
?>
<div class="grid-1-2 my-appointments">
    <?php foreach ($appointments as $appointment) { ?>
        <div class="box my-appointment">
            <div>
                <p>ID: </p>
                <p><?= $appointment['appointmentID'] ?></p>
            </div>
            <div>
                <p>Patient ID: </p>
                <p><?= $appointment['patientID'] ?></p>
            </div>
            <div>
                <p>Date:</p>
                <p><?= $appointment['date'] ?></p>
            </div>
            <div>
                <p>Time:</p>
                <p><?= $appointment['time'] ?></p>
            </div>
            <div>
                <p>Reason:</p>
                <p><?= $appointment['reason'] ?></p>
            </div>
            <div>
                <p>Extra</p>
                <p><?= $appointment['extra'] ?></p>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include "app/view/include/foot.php";
