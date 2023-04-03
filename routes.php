<?php

// Include the router file
require_once __DIR__ . '/router.php';

if (isset($_SESSION['logged_on'])) {
    if ($_SESSION['registered'] == 'true') {
        // Profile
        get('/profile', '/app/view/profile/profile.php');

        // Profile edit
        get('/profile/edit', '/app/view/profile/edit.php');
        get('/profile/edit/$error_type', '/app/view/profile/edit.php');
        post('/profile/edit', '/app/view/profile/edit.php');

        // Profile delete
        get('/account/delete', '/app/view/profile/delete.php');
        post('/account/delete', '/app/view/profile/delete.php');

        // Update appointment result
        get('/appointment/$id', '/app/view/appointment.php');
        post('/appointment/$id', '/app/view/appointment.php');

        if ($_SESSION['role'] != 'user') {
            // Search
            get('/search', '/app/view/search.php');
            get('/profile/$id', '/app/view/profile/profile.php');
            get('/appointment/book/$id', '/app/view/profile/appointment.php');
            get('/appointment/book/$id/$error_type', '/app/view/profile/appointment.php');
            post('/appointment/book/$id', '/app/view/profile/appointment.php');
        }

        if ($_SESSION['role'] == 'admin') {
            // Admin page
            get('/admin', '/app/view/admin.php');
            post('/admin', '/app/view/admin.php');
        }
    }
    // Register
    get('/register/$error_type', '/app/view/registered.php');
    post('/register', '/app/view/registered.php');

    // Logout
    get('/logout', '/app/view/include/logout.php');
} else {
    // Login
    get('/login', '/app/view/login.php');
    get('/login/$error_type', '/app/view/login.php');
    post('/login', '/app/view/login.php');

    // Sign up
    get('/signup', '/app/view/signup.php');
    get('/signup/$error_type', '/app/view/signup.php');
    post('/signup', '/app/view/signup.php');
}
// Route for the homepage
get('/', '/app/view/index.php');

// Load register page if user is logged on
if (isset($_SESSION['logged_on'])) {
    if ($_SESSION['registered'] == 'false') {
        any('/404', '/app/view/registered.php');
    }
}
// Route for the 404 error page
any('/404', '/404.php');
