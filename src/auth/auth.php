<?php
session_start();
require_once(__DIR__ . '/../commons/connection.php');
include 'user_functions.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$email = filter_var($_GET['email'] ?? null, FILTER_VALIDATE_EMAIL);
$verification_code = $_GET['code'] ?? null;
echo $email;
if ($email && $verification_code)
{
	if (isAccountActivated($conn, $email))
        $_SESSION['message'] = "Account is already activated. You can log in now.";
    else
	{
        if (activateAccount($conn, $email, $verification_code))
            $_SESSION['message'] = "Account activated successfully. You can log in now.";
        else
            $_SESSION['message'] = "Failed to activate the account. Please try again.";
    }
}
else
{
	$_SESSION['message'] = "Invalid activation link";

}
header("location: login.php");
exit;
?>
