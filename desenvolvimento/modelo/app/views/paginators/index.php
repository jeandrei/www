<?php require APPROOT . '/views/inc/header.php'; ?>




<?php 
    $articles = $this->pagModel->paginacao();
?>




<div class="container">
			<div class="col-md-12">
				<?php foreach ($articles['articles'] as $article): ?>
				<div class="article">
					<p class="lead">
						<?php
						echo $article['id']; ?>: <?php echo $article['title'];
						?>
					</p>
				</div>
				<?php endforeach ?>
			</div>
            
			<div class="col-md-12">
				<div class="well well-sm">
					<div class="paginate">
                    <ul class="pagination">
                        <?php for ($x=1; $x <= $articles['pages']; $x++): ?>						
							<li class="page-item">
								<a class="page-link" href="?page=<?php echo $x; ?>&per-page=<?php echo $articles['perPage']; ?>">
									<?php
										echo $x;
									?>
								</a>
							</li>						
						<?php endfor; ?>
                    </ul>
                    </div>
				</div>
			</div>
		
        
        </div><!--end main container-->










<?php require APPROOT . '/views/inc/footer.php'; ?>

