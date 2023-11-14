<!DOCTYPE html>
<head>
    <?php
		require 'head.php';
	?>
	
	<style>
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
	
	
</head>
<body>
     <audio hidden autoplay loop>
        <source src="sounds/gameOver.mp3" type="audio/mp3">
    </audio>
    <div class = "center">
        <img src="img/gameOver.jpg" alt="gameOver"><br>
        <a href="index.php"> <img src="img/tryAgainGameOver.jpg" alt="gameOver"> </a>
    </div>
</body>
</html>

