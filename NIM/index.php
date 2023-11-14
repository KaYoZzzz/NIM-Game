<?php
session_start();
require 'myLib.php';
if (!isset($_SESSION['l1'])) {
	resetGame();
}

if (isset($_SESSION['player'])) {
	$player = $_SESSION['player'];
} else {
	$player = 1;
}
?>
<!DOCTYPE html>
<html>

<head>
	<?php
	require 'head.php';
	?>
</head>

<body>
	<script>
		var lastNum;
		var row;

		function clickMe(id) {

			if (row != undefined) {
				updateFigure(true);
			}

			line = Math.floor(id / 10);
			row = document.getElementById("nLine").value = line;
			lastNum = document.getElementById("nSticks").value = id % 10;
			updateFigure(false);
			document.getElementById('commandFields').className = "show";
			var selectAudio = new Audio('sounds/selectSticks.mp3');
			selectAudio.play();
		}

		function updateFigure(undo) {
			let newImage;
			if (undo) {
				newImage = "img/stick.jpg";
			} else {
				newImage = "img/stickRemoved.jpg";
			}
			for (let box = 1; box < (lastNum + 1); box++) {
				document.getElementById("" + (row * 10 + box)).src = newImage;
			}

		}
	</script>
	<h1 id="title">Gioco del NIM</h1>
	<h2 id="sub">Modalità: 2 giocatori</h2>
	<table>
		<?php
		//echo '<p>'; var_dump($_SESSION); echo '</p>'; 
		createLine(1, $_SESSION['l1']);
		createLine(2, $_SESSION['l2']);
		createLine(3, $_SESSION['l3']);
		createLine(4, $_SESSION['l4']);
		?>
	</table>
	<?php if (is_int($player / 2) == 0) {
		echo "<h2>Tocca al giocatore numero 1</h2>";
	} else {
		echo "<h2>Tocca al giocatore numero 2</h2>";
	}
	?>
	<div class="hide" id="commandFields">
		<form action="buttonAction.php">
			<p class="hide"> numero riga: </p>
			<input type="text" id="nLine" name="nLine" readonly class="hide">
			<p class="hide"> numero di bastoni da rimuovere: </p>
			<input type="text" id="nSticks" name="nSticks" readonly class="hide">
			<p></p>
			<input class="submit" type="submit" style="display: block; margin: auto;" value="Rimuovi">
			<audio hidden autoplay src="sounds/removeSticks.mp3">
				<a href="sounds/removeSticks.mp3">
				</a>
			</audio>
			</from>
	</div>
</body>

</html>