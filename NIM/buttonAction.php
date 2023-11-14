<?php
session_start();
//echo '<p>'; var_dump($_SESSION); echo '</p>'; 
require "myLib.php";
$_SESSION['player'] += 1;
$line = 'l' . $_GET['nLine'];
$quantity = $_GET['nSticks'];
$_SESSION[$line] = $_SESSION[$line] - $quantity;
$_SESSION['stick'] -= $quantity;
if ($_SESSION['stick'] == 0) {
	resetGame();
	$next = 'endGame.php';
} else {
	$next = 'index.php';
}
//echo '<p>'; var_dump($_SESSION); echo '</p>'; 
//echo "<a href = '$next'> premi</a>";
header("location:$next");
?>