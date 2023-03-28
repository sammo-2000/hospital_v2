<?php
$title = "Profile Edit";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
$userData = $user->currentUser($_SESSION['userID']);
if (isset($_POST['submit'])) {
    $user = new UserContro($_SESSION['userID'], $_POST['mobile'], $_POST['email'], $_POST['city'], $_POST['postcode'], $_POST['address'], $_POST['history']);
    $user->updateUser();
}
include "app/view/include/head.php";
?>
<form action="/profile/edit" method="post" class="login box-700 box" autocomplete="off">
    <h1>edit profile</h1>
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
        <div>
            <label for="mobile">mobile</label>
            <input type="number" id="mobile" name="mobile" value="<?= $userData['mobile'] ?>">
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="<?= $userData['email'] ?>">
        </div>
        <div>
            <label for="city">city</label>
            <input type="text" id="city" name="city" value="<?= $userData['city'] ?>">
        </div>
        <div>
            <label for="postcode">postcode</label>
            <input type="text" id="postcode" name="postcode" value="<?= $userData['postcode'] ?>">
        </div>
    </div>
    <label for="address">address</label>
    <input type="text" id="address" name="address" value="<?= $userData['address'] ?>">
    <label for="history">medical history <span>(optional)</span></label>
    <textarea name="history" id="history" rows="10"><?= $userData['history'] ?></textarea>
    <button name="submit" class="btn blue">update</button>
</form>
<?php
include "app/view/include/foot.php";
