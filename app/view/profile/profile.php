<?php
$title = "Profile";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
if (isset($id)) {
    // Search patient profile if searched by ID
    $userData = $user->currentUser($id);
} else {
    // Search my profile if not viewed by ID
    $userData = $user->currentUser($_SESSION['userID']);
}
include "app/view/include/head.php";
?>
<div class="box-700 box profile">
    <div class="between">
        <h1>profile</h1>
        <?php if (!isset($id)) { ?>
            <a href="/profile/edit" class="btn blue">Edit</a>
        <?php } ?>
    </div>
    <h2>Detail</h2>
    <div class="grid-1-2">
        <div>
            <p>first name</p>
            <p><?= $userData['first_name'] ?></p>
        </div>
        <div>
            <p>last name</p>
            <p><?= $userData['last_name'] ?></p>
        </div>
        <div>
            <p>mobile</p>
            <p><?= $userData['mobile'] ?></p>
        </div>
        <div>
            <p>date of birth</p>
            <p><?= $userData['dob'] ?></p>
        </div>
        <div>
            <p>address</p>
            <p><?= $userData['address'] ?></p>
        </div>
        <div>
            <p>city</p>
            <p><?= $userData['city'] ?></p>
        </div>
        <div>
            <p>postcode</p>
            <p><?= $userData['postcode'] ?></p>
        </div>
        <div class="span-2 history">
            <p>history</p>
            <p><?= $userData['history'] ?></p>
        </div>
    </div>
    <h2>Account info</h2>
    <div class="grid-1-2">
        <div>
            <p>user ID</p>
            <p><?= $userData['userID'] ?></p>
        </div>
        <div>
            <p>username</p>
            <p><?= $userData['username'] ?></p>
        </div>
        <div>
            <p>role</p>
            <p><?= $userData['role'] ?></p>
        </div>
        <div>
            <p>email</p>
            <p class="email"><?= $userData['email'] ?></p>
        </div>
    </div>
</div>
<?php
include "app/view/include/foot.php";
