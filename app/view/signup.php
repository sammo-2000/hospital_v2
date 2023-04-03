<?php
$title = "Sign Up";
if (isset($_POST['submit'])) {
    include "app/contro/signupContro.php";
    $signup = new SignUpContro($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirm']);
    $signup->signup();
}
include "app/view/include/head.php";
?>
<form action="/signup" method="post" class="login box" autocomplete="off">
    <h1>signup</h1>
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
    <label for="username">username</label>
    <input type="text" id="username" name="username" required>
    <label for="email">email</label>
    <input type="email" id="email" name="email" required>
    <label for="password">password</label>
    <input type="password" id="password" name="password" minlength="5" maxlength="20" required>
    <label for="password_confirm">password confirm</label>
    <input type="password" id="password_confirm" name="password_confirm" minlength="5" maxlength="20" required>
    <button name="submit" class="btn blue">signup</button>
</form>
<?php
include "app/view/include/foot.php";
