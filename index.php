<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник</title>
    <link rel="stylesheet" type="text/css" href="css/news.css">
  </head>

  <body>
  <?php require_once "blocks/header.php";?>

    <div class="news">
      <h1>Новости</h1>
    </div>

  <?php require_once "bd.php";?>
  <?php
    	//-- выводим новости на экран 			
		while( $row = mysqli_fetch_assoc($result) ){
      echo "<a href=page.php?id=".$row["id"]." class=new>";
      echo "<div class=new>";
				echo "<div class=date>" . $row["date"] . "</div>";
				echo "<h2>" . $row["title"] . "</h2>";
				echo  $row["announce"];
        echo "<div class=btn> Подробнее &rarr; </div>";
      echo "</div>";
      echo "</a>";
		}
		$result->free();
	?>
		
	  <?php include "pagination.php";?>

    <?php require_once "blocks/footer.php";?>
    
  </body>

</html>
