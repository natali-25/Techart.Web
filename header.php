<header class="logo">
    <img src="images/Layer_x0020_1.svg">
    <span>Галактический вестник</span>
    </header>

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
  $query = mysqli_query($conn, "SELECT * FROM  new  ORDER BY date DESC LIMIT 1");
    $result = $conn->query($sql);
} else{
  echo "Ошибка: " . $conn->error;
}
$conn->close();

    	//-- выводим новость на экран 			
      if(mysqli_num_rows($query) == 0) {
        echo "There are no records!";
    }   else {
		while( $row_new = mysqli_fetch_assoc($query) ){
    echo "<div class=hero--container>";
        echo "<div class=text>";
          echo "<h1>" . $row_new["title"] . "</h1>";
          echo  $row_new["announce"];
        echo "</div>";
    echo "</div>";
		}
        }
		$result->free();
	?>