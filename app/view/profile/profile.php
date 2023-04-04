<?php
$title = "Profile";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
if (isset($_POST['role'])) {
    $user->updateRole($_POST['userID'], $_POST['role']);   
}
if (isset($id)) {
    // Search patient profile if searched by ID
    $userData = $user->currentUser($id);
    $appointments = $user->getUpcomingAppointment($id); 
} else {
    // Search my profile if not viewed by ID
    $userData = $user->currentUser($_SESSION['userID']);
    $appointments = $user->getUpcomingAppointment($_SESSION['userID']);
}
include "app/view/include/head.php";
?>
<div class="box-700 box profile">
    <div class="between">
        <h1>profile</h1>
        <?php if (isset($id)) { ?>
            <a href="/appointment/book/<?= $id ?>" class="btn blue">book appointment</a>
        <?php } else { ?>
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
        <a href="/account/delete" class="btn blue account-delete-btn">account delete</a>
        <div class="span-2 history">
            <p>history</p>
            <p><?= $userData['history'] ?></p>
        </div>
    </div>
    <div class="between">
        <h2>appointments</h2>
        <?php if (isset($id)) { ?>
            <a href="/appointment/<?= $id ?>" class="btn blue">view</a>
        <?php } else { ?>
            <a href="/appointment/<?= $_SESSION['userID'] ?>" class="btn blue">view</a>
        <?php } ?>
    </div>
    <?php if (isset($appointments[0]['appointmentID'])) { ?>
        <div class="grid-1-2">
            <?php foreach ($appointments as $appointment) { ?>
                <div class="span-2 appointment">
                    <div>
                        <p>date</p>
                        <input value="<?= $appointment['date'] ?>" disabled>
                    </div>
                    <div>
                        <p>time</p>
                        <input value="<?= $appointment['time'] ?>" disabled>
                    </div>
                    <div>
                        <p>doctor</p>
                        <input value="<?= $appointment['doctor'] ?>" disabled>
                    </div>
                    <div>
                        <p>reason</p>
                        <input value="<?= $appointment['reason'] ?>" disabled>
                    </div>
                    <div>
                        <p>extra info</p>
                        <textarea disabled><?= $appointment['extra'] ?></textarea>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <span>no upcoming appointment</span>
    <?php } ?>
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
        <?php if (isset($id)) { ?>
            <form action="/profile/<?= $id ?>" method="post">
                <input type="hidden" name="userID" value="<?= $id ?>">
                <select name="role" id="role" required class="role">
                    <option value="" selected disabled hidden>Choose New Role</option>
                    <option>admin</option>
                    <option>doctor</option>
                    <option>user</option>
                </select>
                <button class="btn blue">update</button>
            </form>
        <?php } ?>
    </div>
</div>
<?php
include "app/view/include/foot.php";
