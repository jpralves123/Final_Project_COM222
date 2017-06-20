<?php

  // Retorna o título do livro
	function get_book_title($ISBN){

    // conecta ao banco de dados
    $connect = mysqli_connect('localhost','root','');

    // seleciona a base de dados em que vamos trabalhar
    $db = mysqli_select_db($connect, 'sandvigbookstore');

    // cria a instrução SQL que vai selecionar os dados
    $query_select = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

    // executa a query
    $select = mysqli_query($connect, $query_select);

    // transforma os dados em um array
    $row = mysqli_fetch_assoc($select);

    // retorna o nome do livro
    return $row['title'];
	}

  // Retorna o preço do livro
	function get_book_price($ISBN){

    // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
    // conecta ao banco de dados
    $connect = mysqli_connect('localhost','root','');

    // seleciona a base de dados em que vamos trabalhar
    $db = mysqli_select_db($connect, 'sandvigbookstore');

    // cria a instrução SQL que vai selecionar os dados
    $query_select = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

    // executa a query
    $select = mysqli_query($connect, $query_select);

    // transforma os dados em um array
    $row = mysqli_fetch_assoc($select);

    // retorna o preço do livro
    return $row['price'];
	}

  // remove o livro da base de dados
  function remove_book($ISBN){

    // conecta ao banco de dados
    $connect = mysqli_connect('localhost','root','');

    // seleciona a base de dados em que vamos trabalhar
    $db = mysqli_select_db($connect, 'sandvigbookstore');

    // cria a instrução SQL
    $query_selectB = "DELETE FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";
    $query_selectC = "DELETE FROM bookcategoriesbooks WHERE ISBN LIKE '%".$ISBN."%'";
    $query_selectA = "DELETE FROM bookauthorsbooks WHERE ISBN LIKE '%".$ISBN."%'";

    // executa a query
    $deleteB = mysqli_query($connect, $query_selectB);
    $deleteC = mysqli_query($connect, $query_selectC);
    $deleteA = mysqli_query($connect, $query_selectA);

    // Verifica se o livro foi deletado
    if(!$deleteB or  !$deleteC or !$deleteA) {
        die('Could not delete book: ' . mysql_error());
    } else {
       echo"<script language='javascript' type='text/javascript'>alert('Book deleted with success!');";
    }

  }

  function get_image_book($ISBN){
    return "https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$ISBN.".01.MZZZZZZZ.jpg";
  }

	// Retorna o título do livro
	function get_user_data($login){

		// conecta ao banco de dados
    $connect = mysqli_connect('localhost','root','');

    // seleciona a base de dados em que vamos trabalhar
    $db = mysqli_select_db($connect, 'sandvigbookstore');

		// cria a instrução SQL que vai selecionar os dados
		$query_select = "SELECT * FROM user WHERE login LIKE '%".$login."%'";

		$select = mysqli_query($connect, $query_select);

		// transforma os dados em um array
    $row = mysqli_fetch_assoc($select);

		return $row;

	}

?>
