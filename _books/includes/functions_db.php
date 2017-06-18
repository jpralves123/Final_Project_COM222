<?php

  // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
  include_once('DatabaseConnection.php');

  // Retorna o título do livro
	function get_book_title($ISBN){

    // cria a instrução SQL que vai selecionar os dados
    $query_select = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

    // executa a query
    $select = mysqli_query($connect, $query_select);

    // transforma os dados em um array
    $row = mysqli_fetch_assoc($select);

    // retorna o nome do livro
    return $row['name'];
	}

  // Retorna o preço do livro
	function get_book_price($ISBN){

    // cria a instrução SQL que vai selecionar os dados
    $query_select = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

    // executa a query
    $select = mysqli_query($connect, $query_select);

    // transforma os dados em um array
    $row = mysqli_fetch_assoc($select);

    // retorna o nome do livro
    return $row['name'];
	}

  // remove o livro da base de dados
  function remove_book($ISBN){

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

?>
