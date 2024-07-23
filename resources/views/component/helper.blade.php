<?php

function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] == 1;
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /');
        exit;
    }
}

function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        echo 'Bạn không có quyền truy cập trang này.';
        exit;
    }
}
?>
