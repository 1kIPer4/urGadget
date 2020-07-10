<?php 
	if ( $total_pages > 1 ) {
		?>
			<div class="footer__navigation">				
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
								if ($total_pages > $count__pages) {
									?>
									<div class="page <?= $page <= 1 ? "page__active" : "" ?>">
										<a href="<?= $page <= 1 ? "" : "?page=" . ($page >= $total_pages ? $total_pages - 2  : $page - 1).$searchString ?>">
											<?= $page <= 1 ? $page : ($page >= $total_pages ? $total_pages - 2  : $page - 1) ?>
										</a>
									</div>
									<div class="page <?= $page > 1 && $page < $total_pages ? "page__active" : "" ?>">
										<a href="?page=<?= $page > 1 && $page < $total_pages ? "$page" : ($page <=1 ? $page+1 : $page - 1) . $searchString ?>">
											<?= $page > 1 && $page < $total_pages ? $page : ($page <=1 ? $page+1 : $page - 1) ?>
										</a>
									</div>
									<div class="page <?= $page >= $total_pages ? "page__active" : "" ?>">
										<a href="<?= $page >= $total_pages ? "" : "?page=" . ($page <= 1 ? $total_pages + 2  : $page + 1).$searchString ?>">
											<?= $page >= $total_pages ? $total_pages : ($page <= 1 ? $page + 2  : $page + 1) ?>
										</a>
									</div>
									<?php
								} else {
									for ( $i = 1; $i <= $count__pages; $i++) {
									?>
										<div class="page <?= $i == $page ? "page__active" : "" ?>">
											<a href="?page=<?= $i . $searchString ?>"><?php echo $i;?></a>
										</div>
									<?php
									}
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