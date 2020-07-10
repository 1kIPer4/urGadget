<?php 
	if ( $total_pages > 1 ) {
		$count__pages = 3;
		if ( $total_count < ($count__pages * $per_page)) {
			$count__pages = ceil($total_count/$per_page);
		}
		//Рарешение экрана
		/*$screenWidth = isset($_POST['width']);
		if ($screenWidth <= 320) {
			if ($count__pages > 3) {
				$count__pages = 3;
			}
		}*/
		//Проверка на нечетность
		if ($count__pages % 2 == 0) {
			$half = $count__pages / 2;
		} else {
			$half = ceil($count__pages / 2);
		}

		function filling($page, $count__pages, $half, $i, $total_pages) {
			if ($page <= $half) {
				echo $i;
			} else if ($total_pages - $page < $half) {
				echo $total_pages - ($count__pages - $i);
			} else {
				if ($i == $half) {
					echo $page;
				} else {
					if ( $i < $half) {
						echo $page - ($half - $i);
					} else {
						echo $page + ($i - $half);
					}
				}
			}
		}
		?>
			<div class="Paginator">			
				<div class="extreme__page">
					<a href="?page=1<?= $searchString ?>">Дом. страница</a>
				</div>
				<div class="pages__container">
					<div class="footer__nav">
						<a href= "<?= $page <= 1 ? "" : "?page=" . ($page - 1).$searchString ?>" class="arrow prev">
							<span></span>
							<span></span>
						</a>
						<div class="pages">
							<?php
								for ( $i = 1; $i <= $count__pages; $i++) {
									?>
										<div class="page <?php
														 if ($page <= $half && $i == $page) {
														 	echo "page__active";
														 } else if ($total_pages - $page < $half && $page == $total_pages - ($count__pages - $i)) {
														 	echo "page__active";
														 } else if ($i == $half && $page > $half && $total_pages - $page >= $half ) {
														 	echo "page__active";
														 }
														 ?>">
											<a href="?page=<?=
															filling($page, $count__pages, $half, $i, $total_pages).$searchString
															?>">
												<?php
													filling($page, $count__pages, $half, $i, $total_pages);
												?>
												</a>
										</div>
									<?php
								}
							?>
						</div>
						<a href="<?= $page >= $total_pages ? "" : "?page=" . ($page + 1).$searchString ?>" class="arrow next">
							<span></span>
							<span></span>
						</a>
					</div>
					<div class="quantity__pages"><?php echo $page; ?>/<?php echo '<span class="total_pages">'.$total_pages.'</span>'; ?></div>
				</div>
				<div class="extreme__page">
					<a href="?page=<?= $total_pages . $searchString ?>">Конец страницы</a>
				</div>
			</div>
		<?php 
	}
?>