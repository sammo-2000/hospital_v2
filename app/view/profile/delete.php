<?php
$title = "Account Delete";
include "app/view/include/head.php";
include_once "app/contro/deleteContro.php";
$delete = new DeleteContro();
$delete_reasons = $delete->getAllReason();
if (isset($_POST['submit'])) {
    $user = new UserContro($_SESSION['userID'], null, $_POST['option'], $_POST['reason'], null, null, null);
    $user->deleteUser();
}
?>
<form action="/account/delete" method="post" class="login box" autocomplete="off">
    <h1>account delete</h1>
    <p>Please be aware that this action is irreversible. Once you proceed, you will no longer be able to access your account or medical history with us</p>
    <br>
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
    <label for="option">option</label>
    <select name="option" id="option" required>
        <option value="" selected disabled hidden>Choose Reason</option>
        <?php foreach ($delete_reasons as $delete_reason) { ?>
            <option><?= $delete_reason['reason_name'] ?></option>
        <?php } ?>
        <option>Other</option>
    </select>
    <label for="reason">reason</label>
    <textarea name="reason" id="reason" rows="10" required></textarea>
    <button name="submit" class="btn blue">delete</button>
</form>
<?php
include "app/view/include/foot.php";
