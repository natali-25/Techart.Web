<?php
  //-- подключаемся к базе
	$conn = new mysqli("localhost", "root", "root", "news");
    mysqli_set_charset($conn, "utf8");
	if($conn->connect_error){
		die("Ошибка: " . $conn->connect_error);
	}

	$page = $_GET['id'];

  $sql = "SELECT COUNT(*) FROM new";
    if($result = $conn->query($sql)){
      $query = mysqli_query($conn, "SELECT * FROM  new WHERE id='$page'");
        $result = $conn->query($sql);
  } else{
		  echo "Ошибка: " . $conn->error;
	}
	$conn->close();

  ?>

<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Возвращение этнографа</title>
    <link href="css/new_block.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
  <?php require_once "blocks/headernew.php";?>

    <?php
    	//-- выводим новости на жкран
      if(mysqli_num_rows($query) == 0) {
        echo "There are no records!";
    }   else {
		while( $row = mysqli_fetch_assoc($query) ){
      echo "<div class=nav>";
        echo "<p1>Главная  / </p1>";
        echo "<p2>" . $row["title"] . "</p2>";
      echo "</div>";
        echo "<h1>" . $row["title"] . "</h1>";
      echo "<div class=new>";
        echo "<time>" . $row["date"] . "</time>";
				echo "<span>" . $row["announce"] . "</span>";
        echo  $row["content"];
        echo "<img src='images/".$row["image"]."'>";
        echo "<a href=index.php class='btn'> &#8592; назад к новостям </a>";
      echo "</div>";
      
		}
        }
		$result->free();
	?>

      <?php require_once "blocks/footer.php";?>
  </body>
</html>