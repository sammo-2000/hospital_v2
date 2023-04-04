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
if (isset($_POST['delete_contact'])) {
    $delete->deleteContact($_POST['contactID']);
}
$delete_results = $delete->getAllReason();
$appointment_results = $delete->getAllAppointmentReason();
$contacts = $delete->getAllContact();
?>
<div class="box box-700">
    <?php if ($_SESSION['role'] == 'admin') { ?>
        <div class="middle">
            <button class="btn blue select" data-target="admin-select-1">delete reason</button>
            <button class="btn blue select" data-target="admin-select-2">appointment</button>
            <button class="btn blue select" data-target="admin-select-3">contact</button>
        </div>
        <div class="admin">
            <div class="admin-select" id="admin-select-1" style="display:none;">
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
            </div>
            <div class="admin-select" id="admin-select-2" style="display:none;">
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
        <?php } ?>
        <div class="admin-select" id="admin-select-3">
            <div>
                <h3>Contact</h3>
                <?php foreach ($contacts as $contact) { ?>
                    <form action="/admin" method="post" class="contact-us box">
                        <input type="hidden" name="contactID" value="<?= $contact['contactID'] ?>">
                        <p><strong>Name</strong>: <?= $contact['name'] ?></p>
                        <p><strong>Email</strong>: <?= $contact['email'] ?></p>
                        <p><strong>Reason</strong>: <?= $contact['reason'] ?></p>
                        <button type="submit" name="delete_contact" class="btns">delete</button>
                    </form>
                <?php } ?>
            </div>
        </div>
        </div>
</div>
<script>
    let select = document.querySelectorAll('.select');
    let item = document.querySelectorAll('.admin-select');
    select.forEach((btn) => {
        btn.addEventListener('click', () => {
            let target = document.getElementById(btn.dataset.target);
            item.forEach((el) => {
                el.style.display = 'none';
            });
            target.style.display = 'block';
        });
    });
</script>
<?php
include "app/view/include/foot.php";
