<?php
$title = "Profile";
include "app/contro/userContro.php";
$user = new UserContro();
$userData = $user->currentUser($_SESSION['userID']);
include "app/view/include/head.php";
?>
<div class="box-700 box profile">
    <div class="between">
        <h1>profile</h1>
        <a href="/profile/edit" class="btn blue">Edit</a>
    </div>
    <div class="grid-1-2">
        <div>
            <p>username</p>
            <p><?= $userData['username'] ?></p>
        </div>
        <div>
            <p>email</p>
            <p class="email"><?= $userData['email'] ?></p>
        </div>
        <div>
            <p>role</p>
            <p><?= $userData['role'] ?></p>
        </div>
    </div>
</div>
<?php
include "app/view/include/foot.php";
