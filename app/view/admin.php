<?php
$title = "Admin";
include "app/view/include/head.php";
include_once "app/contro/deleteContro.php";
$delete = new DeleteContro();
if (isset($_POST['add_reason'])) {
    $delete->addReason($_POST['add_reason']);
}
if (isset($_POST['add_appointment'])) {
    $delete->addAppointmentReason($_POST['add_appointment']);
}
if (isset($_POST['delete_reason'])) {
    $delete->deleteReason($_POST['ID']);
}
if (isset($_POST['delete_appointment'])) {
    $delete->deleteAppointment($_POST['ID']);
}
$delete_results = $delete->getAllReason();
$appointment_results = $delete->getAllAppointmentReason();
?>
<div class="box box-700">
    <h2 class="admin">Click to delete</h2>
    <div class="admin">
        <div>
            <h3>Account delete</h3>
            <form action="/admin" method="POST">
                <input type="text" name="add_reason" placeholder="New Reason..." minlength="5" maxlength="50" required>
                <button class="btn blue">Add</button>
            </form>
            <?php foreach ($delete_results as $delete_result) { ?>
                <form action="/admin" method="post">
                    <input type="hidden" name="ID" value="<?= $delete_result['reasonID'] ?>">
                    <button type="submit" name="delete_reason" class="btns"><?= $delete_result['reason_name'] ?></button>
                </form>
            <?php } ?>
        </div>
        <div>
            <h3>Appointment option</h3>
            <form action="/admin" method="POST">
                <input type="text" name="add_appointment" placeholder="New Appointment Reason..." minlength="5" maxlength="50" required>
                <button class="btn blue">Add</button>
            </form>
            <?php foreach ($appointment_results as $appointment_result) { ?>
                <form action="/admin" method="post">
                    <input type="hidden" name="ID" value="<?= $appointment_result['reasonID'] ?>">
                    <button type="submit" name="delete_appointment" class="btns"><?= $appointment_result['reason_name'] ?></button>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include "app/view/include/foot.php";
