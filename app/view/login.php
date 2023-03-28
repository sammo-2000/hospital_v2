<?php
$title = "Login";
if (isset($_POST['submit'])) {
    include "app/contro/loginContro.php";
    $login = new LoginContro($_POST['username'], $_POST['password']);
    $login->login();
}
include "app/view/include/head.php";
?>
<form action="/login" method="post" class="login box" autocomplete="off">
    <h1>login</h1>
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
    <input type="text" id="username" name="username">
    <label for="password">password</label>
    <input type="password" id="password" name="password">
    <button name="submit" class="btn blue">login</button>
</form>
<?php
include "app/view/include/foot.php";
