<!DOCTYPE html>
<html>
	<head>
		<title>Léo - Leia</title>
		<link rel="stylesheet" type="text/css" href="index_style.css?v=2">
		<?php

			echo '<script> list = [';

			$return = [];

			$path = "images/";
			$diretorio = dir($path);

			while($arquivo = $diretorio -> read()){
				$nome = explode('.', $arquivo)[0];
				if ($nome != '') {
					$return[count($return)][0] = $nome;
					$return[count($return)][1] = $arquivo;
					//echo $nome." - ".$arquivo."<br>";
					echo '["'.$nome.'","'.$arquivo.'"],';
				}
			}

			$diretorio -> close();

			echo ']; </script>';

		?>
		<script type="text/javascript">
			function randInt(min,max) {
				n = (max-min)*Math.random();
				n = Math.floor(n+min);
				return n;
			}
			function gerar_palavra() {
				palavra = list[randInt(0,list.length)];
				document.getElementById('palavra_span').innerText = palavra[0].toUpperCase();
				errado = palavra;
				while (errado == palavra) {
					errado = list[randInt(0,list.length)];
				}
				i = randInt(0,2);
				document.getElementsByClassName('btt_escolha')[i].src = 'images/'+palavra[1];
				if (i == 0) {
					i = 1;
				} else {
					i = 0;
				}
				document.getElementsByClassName('btt_escolha')[i].src = 'images/'+errado[1];
			}
			function escolha_fun(obj) {
				src = obj.src;
				src = src.split('/');
				src = src[src.length-1].split('.')[0];
				txt = document.getElementById('palavra_span').innerText;
				txt = txt.toLowerCase();
				src = src.toLowerCase();

				if (src == txt) {
					console.log('Acertou!');
					win();
				} else {
					console.log('Errou!');
					lose();
				}
			}
			function winAud() {
				var sound = document.getElementById("audiowin");
				sound.play()
			}
			function lossAud() {
				var sound = document.getElementById("audioloss");
				sound.play()
			}
			function win() {
				score = document.getElementById('score').innerText;
				score = parseInt(score);
				score += 1;
				document.getElementById('score').innerText = score;
				winAud();
				gerar_palavra();
			}
			function lose() {
				score = document.getElementById('score').innerText;
				score = parseInt(score);
				if (score > 0) {
					score -= 1;
				}
				document.getElementById('score').innerText = score;
				lossAud();
			}
		</script>
	</head>
	<body>
		<div id="main_div">
			<div id="test">
				<div id="score">0</div>
				<div id="palavra_div">
					<span id="palavra_span">Teste</span>
				</div>
				<img class="btt_escolha" onclick="escolha_fun(this)" src="images/gato.jpg">
				<img class="btt_escolha" onclick="escolha_fun(this)" src="images/pato.jpg">
			</div>
		</div>
		<div id="audio">
			<audio id="audiowin" src="win.wav" autostart="false" ></audio>
			<audio id="audioloss" src="loss.wav" autostart="false" ></audio>
		</div>
	</body>
</html>
<script type="text/javascript">
	gerar_palavra();
</script>