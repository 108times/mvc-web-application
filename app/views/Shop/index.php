<section class="ftco-section">
    	<div class="container">
           <?php if ($category): ?>
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
                        <?php foreach($category as $v): ?>
    					<li><a href="<?= CATEGORY .$v['alias'] ?>"><?=$v['title']?></a></li>
                        <?php endforeach; ?>
    				</ul>
    			</div>
    		</div>
            <?php endif; ?>

    		<div class="row">
            <?php if ($product): ?>
            <?php $curr = \amir\App::$app->getProperty('currency');?>
            <?php foreach ($product as $item): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product shop-product">
    					<a href="<?=PRODUCT .$item['alias'] ?>" class="img-prod"><img class="img-fluid shop-img" src="<?=IMG . $item['img']?>" alt="Colorlib Template">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center shop-product__text">
    						<h3><a href="<?=PRODUCT .$item['alias'] ?>"><?=$item['title'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price">
                                        <span class="price_span"><?= $curr['symbol_left'] ."". (floatval($item['price']) * $curr['value']) . " " . $curr['symbol_right'] ?> <span class="old_price"><small><?= $curr['symbol_left'] ."". (floatval($item['old_price']) * $curr['value']) . " " . $curr['symbol_right']?></small></span> </span>
                                    </p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                <?php endforeach; ?>
                <?php endif; ?>
    		</div>

    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
