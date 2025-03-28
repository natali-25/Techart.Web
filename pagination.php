<?php
    //-- линейка кнопок для постраничного просмотра таблицы
	
	//-- блокировка пагинации при одной странице
	if ($pages_count > 1){
		
		//-- выводим кнопки пагинации 
		echo '<div class="nav">';
		echo '<ul>';

		//-- сформировать кусок кнопок пагинации
		function form_pagebuttons( $start_page, $end_page )
		{   global $page_num;
			for( $num=$start_page; $num <=$end_page; $num++ ){
				if( $num == $page_num)
					echo "<li class=curr_page> <a href='?page_num=".$page_num."'>$page_num </a></li>";
				else
					echo "<li > <a href='?page_num=".$num."'>$num </a></li>";
			}
		}
			
		//-- формируем кнопки с номерами страниц
		if($pages_count < 4){    //-- малое количество страниц
			form_pagebuttons( 1, $pages_count);
		}else {                  //--страниц много
		
			if($page_num <= 3){ //-- номер выбран близко к началу
				form_pagebuttons( $page_num - 1, $page_num + 1 );
			
			} elseif( $page_num > $pages_count - 3){//-- номер выбран близко к концу
				form_pagebuttons( $pages_count -2 , $pages_count );

			} else {//-- номер выбран в середине списка
				form_pagebuttons( $page_num - 1, $page_num + 1);

			}

        //-- кнопка вперед
        $next_page = $page_num + 1;
        echo "<li class='next'> <a href='?page_num=".$next_page."'> &rarr;</a></li>";
        echo"</ul>";
		echo"</div>";
		
	};
}
?>
