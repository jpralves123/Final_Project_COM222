<?php

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];
$pubdate = $_POST['pub_date'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];

$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connect, 'sandvigbookstore');

$query_select = "SELECT ISBN FROM bookdescriptions WHERE ISBN = '$isbn'";

$select = mysqli_query($connect, $query_select);
$array = mysqli_num_rows($select);

if($array > 0 ){
  $logarray = $array['ISBN'];
}else{

  $logarray = "";

  if($isbn == "" || $isbn == null || $title == "" || $title == null || $description == "" || $description == null || $title == "" || $title == null ){

    echo"<script language='javascript' type='text/javascript'>alert('ISBN field must be filled in!');window.location.href='BookStoreManagement.html';</script>";

    }else{
      if($logarray == $isbn){

        echo"<script language='javascript' type='text/javascript'>alert('This ISBN number already exists!');window.location.href='NewBook.html';</script>";
        die();

      }else{
        $query = "INSERT INTO bookdescriptions (ISBN, title, description, price, publisher, pubdate, edition, pages) VALUES ('$isbn','$title', '$description', '$price', '$publisher', '$pubdate', '$edition', '$pages')";

        $insert = mysqli_query($connect, $query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('New Book added with sucess!');window.location.href='BookStoreManagement.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not register this Book!');window.location.href='BookStoreManagement.html'</script>";
        }

      }

    }
}
?>
