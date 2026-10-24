<?php
session_start();

function requireLogin(): void
{
    if (empty($_SESSION['utilisateur'])) {
        header('Location: login.php');
        exit;
    }
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
