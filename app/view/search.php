<?php
$title = "Search";
include "app/contro/userContro.php";
$user = new UserContro(null, null, null, null, null, null, null);
$users = $user->getUsers();
include "app/view/include/head.php";
?>
<div class="searchBar">
    <input type="text" id="searchBar" class="box" placeholder="Search...">
</div>
<table class="search">
    <thead>
        <tr>
            <th>user id</th>
            <th>name</th>
            <th>dob</th>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <th>role</th>
            <?php } ?>
            <th>view</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['userID'] ?></td>
                <td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
                <td><?= $user['dob'] ?></td>
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <td><?= $user['role'] ?></td>
                <?php } ?>
                <td>
                    <a href="/profile/<?= $user['userID'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" width="30">
                            <path d="M794 960 525.787 692Q496 714.923 457.541 727.962 419.082 741 373.438 741q-115.311 0-193.875-78.703Q101 583.594 101 470.797T179.703 279.5q78.703-78.5 191.5-78.5T562.5 279.644Q641 358.288 641 471.15q0 45.85-13 83.35-13 37.5-38 71.5l270 268-66 66ZM371.441 650q75.985 0 127.272-51.542Q550 546.917 550 471.412q0-75.505-51.346-127.459Q447.309 292 371.529 292q-76.612 0-128.071 51.953Q192 395.907 192 471.412t51.311 127.046Q294.623 650 371.441 650Z" />
                        </svg>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include "app/view/include/foot.php";
