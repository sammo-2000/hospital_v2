<?php
$title = "register";
include "app/view/include/head.php";
?>
<form action="/registered" method="post" class="login box-700 box" autocomplete="off">
    <h1>registered</h1>
    <div class="grid-1-2">
        <div>
            <label for="first_name">first name</label>
            <input type="text" id="first_name" name="first_name">
        </div>
        <div>
            <label for="last_name">last name</label>
            <input type="text" id="last_name" name="last_name">
        </div>
        <div>
            <label for="mobile">mobile</label>
            <input type="number" id="mobile" name="mobile">
        </div>
        <div>
            <label for="dob">date of birth</label>
            <input type="date" id="dob" name="dob">
        </div>
        <div>
            <label for="city">city</label>
            <input type="text" id="city" name="city">
        </div>
        <div>
            <label for="postcode">postcode</label>
            <input type="text" id="postcode" name="postcode">
        </div>
    </div>
    <label for="address">address</label>
    <input type="text" id="address" name="address">
    <label for="history">medical history</label>
    <textarea name="history" id="history" rows="10"></textarea>
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
    <button name="submit" class="btn blue">register</button>
</form>
<?php
include "app/view/include/foot.php";
