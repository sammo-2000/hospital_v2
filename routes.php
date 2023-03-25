<?php

// Include the router file
require_once __DIR__ . '/router.php';

if (isset($_SESSION['logged_on'])) {
    if ($_SESSION['registered'] == true) {
        // Allow access only to users who are logged on & registered

        // Profile
        get('/profile', '/app/view/profile/profile.php');
        get('/profile/edit', '/app/view/profile/edit.php');
    }
    // Logout
    get('/logout', '/app/view/include/logout.php');
} else {
    // Allow access only to users who are not logged on

    // Login
    get('/login', '/app/view/login.php');
    get('/login/$error_type', '/app/view/login.php');
    post('/login', '/app/view/login.php');

    // Sign up
    get('/signup', '/app/view/signup.php');
    get('/signup/$error_type', '/app/view/signup.php');
    post('/signup', '/app/view/signup.php');
}

// Allow access to all users

// Route for the homepage
get('/', '/app/view/index.php');

if (isset($_SESSION['logged_on'])) {
    if ($_SESSION['registered'] != true) {
        any('/404', '/app/view/registered.php');
    }
}
// Route for the 404 error page
any('/404', '/404.php');
