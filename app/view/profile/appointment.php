<?php
$title = "Profile";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
$userData = $user->currentUser($id);
$doctors = $user->getAllDoctor();
$reasons = $user->getAllReason();
if (isset($_POST['submit'])) {
    include "app/contro/appointment.php";
    $time = $_POST['hour'] . ":" . $_POST['min'];
    $appointment = new AppointmentContro($id, $_POST['date'], $time, $_POST['doctor'], $_POST['reason'], $_POST['extra']);
    $appointment->book();
}
include "app/view/include/head.php";
?>
<form action="/appointment/<?= $id ?>" method="post" class="login box box-700" autocomplete="off">
    <h1>appointment booking</h1>
    <?php
    // checks if there is an error message stored in the session
    if (isset($error_type) && isset($_SESSION['error'])) {
        if ($error_type == "error") { ?>
            <p class="error"><?php out($_SESSION['error']) ?></p>
        <?php } else { ?>
            <p class="success"><?= $_SESSION['error'] ?></p>
    <?php }
        unset($_SESSION['error']);
    } ?>
    <div class="grid-1-2">
        <input type="hidden" value="<?= $id ?>" name="userID">
        <div>
            <label for="name">name</label>
            <input type="text" id="name" name="name" value="<?= $userData['first_name'] ?> <?= $userData['last_name'] ?>" disabled>
        </div>
        <div>
            <label for="dob">date of birth</label>
            <input type="text" id="dob" name="dob" value="<?= $userData['dob'] ?>" disabled>
        </div>
        <div>
            <label for="date">date</label>
            <input type="date" name="date" id="date" min="<?= date('Y-m-d'); ?>">
        </div>
        <div>
            <label for="time">time</label>
            <div class="grid-2">
                <select name="hour" id="hour">
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                </select>
                <select name="min" id="min">
                    <option>00</option>
                    <option>15</option>
                    <option>30</option>
                    <option>45</option>
                </select>
            </div>
        </div>
        <div>
            <label for="doctor">doctor</label>
            <select name="doctor" id="doctor">
                <option value="" selected disabled hidden>Choose Doctor</option>
                <?php foreach ($doctors as $doctor) { ?>
                    <option><?= $doctor['first_name'] ?> <?= $doctor['last_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="reason">reason</label>
            <select name="reason" id="reason">
                <option value="" selected disabled hidden>Choose Reason</option>
                <?php foreach ($reasons as $reason) { ?>
                    <option><?= $reason['reason_name'] ?></option>
                <?php } ?>
                <option>other</option>
            </select>
        </div>
        <div class="span-2">
            <label for="extra">extra</label>
            <textarea name="extra" id="extra" rows="10"></textarea>
        </div>
    </div>
    <button name="submit" class="btn blue">book</button>
</form>
<?php
include "app/view/include/foot.php";
