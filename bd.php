<?php
  //-- подключаемся к базе
	$conn = new mysqli("localhost", "root", "root", "news");
    mysqli_set_charset($conn, "utf8");
	if($conn->connect_error){
		die("Ошибка: " . $conn->connect_error);
	}

	//-- формируем номер страницы
    if (isset($_GET['page_num'])) {
    	$page_num = $_GET['page_num'];
    } else {
    	$page_num = 1;
    }

    //-- задаем размер страницы
    $page_len = 4;
    $sql = "SELECT COUNT(*) FROM new";
    if($result = $conn->query($sql)){
    	//-- вычисляем число страниц 
		$res =  mysqli_fetch_array($result);
		$rows_count =$res[0];		
       $pages_count = ceil($rows_count / $page_len);

    	//-- исправляем возможный выход за границы 
       if($page_num < 1)
    		$page_num = 1;
    	if($page_num > $pages_count)
    		$page_num = $pages_count;

    	//-- извлекаем все записи страницы в обратном порядке
       $offset = ($page_num-1) * $page_len;
       $sql = "SELECT * FROM  new  ORDER BY date DESC LIMIT $page_len OFFSET $offset";
		$result = $conn->query($sql);
  } else{
		  echo "Ошибка: " . $conn->error;
	}
	$conn->close();

?>