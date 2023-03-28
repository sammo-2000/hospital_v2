<?php
$title = "Profile";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
if (isset($_POST['submit'])) {
    include "app/contro/appointment.php";
    $update = new AppointmentContro($_POST['appointmentID'], null, null, null, null, $_POST['result']);
    $update->updateResult();
}
if ($_SESSION['role'] == 'user') {
    $upcomings = $user->getUpcomingAppointment($_SESSION['userID']);
    $old_ones = $user->getOldAppointment($_SESSION['userID']);
} else {
    $upcomings = $user->getUpcomingAppointment($id);
    $old_ones = $user->getOldAppointment($id);
}
include "app/view/include/head.php";
?>
<!-- Upcoming -->
<div class="box-700 box profile">
    <h2>Upcoming</h2>
    <?php foreach ($upcomings as $upcoming) { ?>
        <div class="grid-1-2">
            <div class="span-2 appointment">
                <div>
                    <p>date</p>
                    <input value="<?= $upcoming['date'] ?>" disabled>
                </div>
                <div>
                    <p>time</p>
                    <input value="<?= $upcoming['time'] ?>" disabled>
                </div>
                <div>
                    <p>doctor</p>
                    <input value="<?= $upcoming['doctor'] ?>" disabled>
                </div>
                <div>
                    <p>reason</p>
                    <input value="<?= $upcoming['reason'] ?>" disabled>
                </div>
                <div>
                    <p>extra info</p>
                    <textarea disabled><?= $upcoming['extra'] ?></textarea>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="box-700 box profile">
    <h2>older</h2>
    <?php foreach ($old_ones as $old_one) { ?>
        <div class="grid-1-2">
            <div class="span-2 appointment">
                <div>
                    <p>date</p>
                    <input value="<?= $old_one['date'] ?>" disabled>
                </div>
                <div>
                    <p>time</p>
                    <input value="<?= $old_one['time'] ?>" disabled>
                </div>
                <div>
                    <p>doctor</p>
                    <input value="<?= $old_one['doctor'] ?>" disabled>
                </div>
                <div>
                    <p>reason</p>
                    <input value="<?= $old_one['reason'] ?>" disabled>
                </div>
                <div>
                    <p>extra info</p>
                    <textarea disabled><?= $old_one['extra'] ?></textarea>
                </div>
                <div>
                    <?php if ($_SESSION['role'] == 'doctor') { ?>
                        <form action="/appointment/<?= $id ?>" method="post" class="width-full">
                            <p>result</p>
                            <input type="hidden" name="appointmentID" value="<?= $old_one['appointmentID'] ?>">
                            <textarea name="result" id="result"><?= $old_one['result'] ?></textarea>
                            <br>
                            <button class="btn blue" name="submit">update</button>
                        </form>
                    <?php } else { ?>
                        <p>result</p>
                        <textarea disabled><?= $old_one['result'] ?></textarea>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include "app/view/include/foot.php";
