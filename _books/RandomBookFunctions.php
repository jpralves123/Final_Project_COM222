<?php

	function randomBook() {
		// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
		include('DatabaseConnection.php');

		// cria a instrução SQL que vai selecionar os dados
		$query_select = "SELECT * FROM bookdescriptions ORDER BY RAND() LIMIT 76";

		// executa a query
		$select = mysqli_query($connect, $query_select);

		// transforma os dados em um array
		$row = mysqli_fetch_assoc($select);

		// calcula quantos dados retornaram
		$total = mysqli_num_rows($select);

		$row = mysqli_fetch_assoc($select);

		return $row;
	}

	function trimString($FullString){
		$string = strip_tags($FullString);

		if (strlen($string) > 50) {

			// truncate string
			$stringCut = substr($string, 0, 500);

			// make sure it ends in a word so assassinate doesn't become ass...
 			$string = substr($stringCut, 0, strrpos($stringCut, ' ')); 

		}

		return $string;
	}

	function randomBookShow(){
		$ary = array();
		for ($i=0; $i<3; $i++){
		echo "<div class=\"col-sm-4\">
    			<div class=\"fff\">";

				$rdmBook = randomBook();
				while (in_array($rdmBook['ISBN'], $ary))
					$rdmBook = randomBook();
				array_push($ary, $rdmBook['ISBN']);

				echo "<div class=\"panel-heading\">
                  			<h4 class=\"text-left\">
                              			<a href=\"ProductPage.php?ISBN=".$rdmBook['ISBN']."\">".$rdmBook['title']."</a>
                        		</h4>
                  		</div>
			<div class=\"col-md-4 img-responsive center-block\">
				<img src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rdmBook['ISBN'].".01.THUMBZZZ.jpg\">
			</div>
			<div class=\"caption text-justify\">
				<p>".trimString($rdmBook['description'])."</p>
				<br><a href=\"ProductPage.php?ISBN=".$rdmBook['ISBN']."\">» Read More</a>
			</div>
			</div>
		</div>";
		}
	}
?>