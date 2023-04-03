<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" media="(max-width: 480px)" href="/public/css/mobile.css">
    <link rel="stylesheet" media="(min-width: 481px) and (max-width: 999px)" href="/public/css/iPad.css">
    <link rel="stylesheet" media="(min-width: 1000px)" href="/public/css/desktop.css">
    <link rel="stylesheet" media="(max-width: 1000px)" href="/public/css/mobile-nav.css">
    <script src="/public/js/main.js" defer></script>
</head>

<body>
    <header>
        <div class="wrapper">
            <a href="/">astro health care</a>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav>
                <ul>
                    <li><a href="/">home</a></li>
                    <?php if (isset($_SESSION['logged_on'])) {
                        if ($_SESSION['role'] != 'user') { ?>
                            <!-- Staff only -->
                            <li><a href="/search">search</a></li>
                        <?php }
                        if ($_SESSION['role'] == 'admin') { ?>
                            <!-- Admin only -->
                            <li><a href="/admin">admin</a></li>
                        <?php } ?>
                        <!-- Logged on -->
                        <li><a href="/profile">profile</a></li>
                        <li><a href="/logout">logout</a></li>
                    <?php } else { ?>
                        <!-- Not logged on -->
                        <li><a href="/login">login</a></li>
                        <li><a href="/signup">sign up</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="height-50px"></div>
    <main>
        <div class="wrapper">