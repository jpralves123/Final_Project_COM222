<!-- ************************************************ -->
<?php
// Verifica se o usuário está logado
//include_once("./validate.php");

// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once("./DatabaseConnection.php");

// cria a instrução SQL que vai selecionar os dados
$query_select = "SELECT * FROM bookcategories";

// executa a query
$select = mysqli_query($connect, $query_select);

// transforma os dados em um array
$row = mysqli_fetch_assoc($select);

// calcula quantos dados retornaram
$total = mysqli_num_rows($select);

// se o número de resultados for maior que zero, mostra os dados
if($total > 0) {

?>
<!--HEADER-->
<html lang="en">

<body>
  <div class="container-fluid col-md-2">

    <div class="row">

      <!--SIDEMENU-->
        <div class="col-md-12 btn-group-vertical" id="sidemenu">

          <h3> Browse</h3>

          	<?php
            		do{
            			echo '<a href="SearchBrowse.php?catID=' . $row['CategoryID'] . '&catName=' . $row['CategoryName'] . '" class="col-md-12 text-left btn btn-primary">' . $row['CategoryName']  . '</a>';
                }while($row = mysqli_fetch_assoc($select));
           	?>

        </div>

      <?php
      // fim do if
      }
      ?>
    </div>
  </div>
</body>
</html>
