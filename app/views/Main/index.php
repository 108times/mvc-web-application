	<!-- Start Slider Section -->
	<?php if ($slides): ?>
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
			  <?php foreach($slides as $slide): ?>

				<div class="slider-item" style="background-image: url(<?=IMG .  $slide['img']?>);">
					<div class="overlay"></div>
					<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-md-12 ftco-animate text-center">
						<h1 class="mb-2"> <?=$slide['title']?> </h1>
						<h2 class="subheading mb-4"> <?=$slide['description']?> </h2>
						<p><a href="#" class="btn btn-primary">View Details</a></p>
						</div>

					</div>
					</div>
				</div>

			<?php endforeach; ?>
	    </div>
    </section>
	<?php endif; ?>
	<!-- End Slider Section -->

	<!-- Start Featues Section -->
	<?php if ($features): ?>
    <section class="ftco-section">
		<div class="container">
		  <div class="row no-gutters ftco-services">
			<?php $features_counter = 1; 		  ?>
			<?php foreach($features as $feature): ?>
				<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services mb-md-0 mb-4">
				<div class="icon bg-color-<?=$features_counter?> active d-flex justify-content-center align-items-center mb-2 shadow">
						<span class="<?=$feature['span_content']?>"></span>
				</div>
				<div class="media-body">
					<h3 class="heading"><?=$feature['title']?></h3>
					<span><?=$feature['description']?></span>
				</div>
				</div>
			</div>
			<?php $features_counter++; ?>
			<?php endforeach; ?>
          </div>
		</div>
	</section>
	<?php endif; ?>
	<!-- End Features Section -->

	<!-- Start Categories Section -->
	<?php if ($categories): ?>
	<section class="ftco-section ftco-category ftco-no-pt">
		<div class="container">
			<div class="row">
				<div class="main-categories-container">
					<?php $categories_counter = 1; 			 ?>
					<?php foreach($categories as $category): ?>
						<div class="category-wrap ftco-animate img mb-4 d-flex rounded-border align-items-end main-category-<?=$categories_counter?>" style="background-image: url(<?=IMG.$category['img']?>);">
							<a href="<?=CATEGORY ?><?=$category['alias']?>" class="full-size-link"></a>
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a class="not-a-link"><?=$category['title']?></a></h2>
							</div>
						</div>
					<?php $categories_counter++; ?>
					<?php endforeach; ?>

						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end main-category-action">
							<div class="text-center w-100 h-100 categories-action">
								<h2><a href="<?=CATEGORY ?>" class="btn btn-primary">Shop now <span class="categories-moving-arrow moving-arrow"><i class="fa fa-angle-right"></i></span></a></h2>
								<p>Protect the health of every home</p>
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- End Categroies Section -->

	<!-- Start Featured Products Section -->
	<?php if ($featured_products) : ?>
	<?php $curr = \amir\App::$app->getProperty('currency');?>
    <section class="latest-product spad">
			<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
			<?php if ($featured_products_info): ?>
			<?php foreach($featured_products_info as $item): ?>
            <h2 class="mb-4"><?=$item['title']?></h2>
            <p><?=$item['content']?></p>
			<?php endforeach; ?>
			<?php endif; ?>
          </div>
        </div>
    	</div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
					<!-- Latest Product Section Begin -->
					<?php if ($latest_products): ?>
                    <div class="latest-product__text rounded-border">
                        <h4>New</h4>
                        <div class="latest-product__slider owl-carousel">

							<?php $latest_products_counter = 1; ?>
							<?php foreach($latest_products as $item): ?>
							<?php $latest_products_size = sizeof($latest_products); ?>
							<?php if (  $latest_products_counter===1 ||
										$latest_products_counter===4 ||
									 	$latest_products_counter===7  ): ?>
							<?php $section_items_counter = 1; ?>
							<div class="latest-prdouct__slider__item">
							<?php endif; ?>

							<?php $old_price = $item['old_price']!=='0' ? "<span class='old-price'>" . $item['old_price'] . "</span>":'' ?>

								<div class="latest-product__item ">
								<a href="<?=PRODUCT ?><?=$category['alias']?>" class="full-size-link featured-full-size-link"></a>
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span class="price_span"><?= $curr['symbol_left'] ."". (floatval($item['price']) * $curr['value']) . " " . $curr['symbol_right'] ?> <span class="old_price"><small><?= $curr['symbol_left'] ."". (floatval($item['old_price']) * $curr['value']) . " " . $curr['symbol_right']?></small></span> </span>
                                    </div>
                                </div>

							<?php if ($section_items_counter  === 3||
									  $latest_products_counter=== $latest_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $latest_products_counter++; ?>
							<?php endforeach; ?>

                        </div>
						<div class="featured-products__link">
						<a  href="<?=PRODUCT . "&new=1"?>">
							View All
							<span class="categories-moving-arrow moving-arrow"><i class="fa fa-angle-right"></i></span>
							</a>
						</div>
                    </div>
				<?php endif; ?>
                </div>
				<!-- Latest Product Section End -->

				<!-- Sale Product Section Start -->
                <div class="col-lg-4 col-md-6">
					<?php if ($sale_products): ?>
                    <div class="latest-product__text rounded-border">
                        <h4>Discounts</h4>
                        <div class="latest-product__slider owl-carousel">

							<?php $sale_products_counter = 1; ?>
							<?php foreach($sale_products as $item): ?>
							<?php $sale_products_size = sizeof($sale_products); ?>
							<?php if (  $sale_products_counter===1 ||
										$sale_products_counter===4 ||
									 	$sale_products_counter===7  ): ?>
							<?php $section_items_counter = 1; ?>
							<div class="latest-prdouct__slider__item">
							<?php endif; ?>

							<?php $old_price = $item['old_price']!=='0' ? "<span class='old-price'>" . $item['old_price'] . "</span>":'' ?>

								<div class="latest-product__item">
									<a href="<?=PRODUCT ?><?=$category['alias']?>" class="full-size-link featured-full-size-link"></a>
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span class="price_span"><?= $curr['symbol_left'] ."". (floatval($item['price']) * $curr['value']) . " " . $curr['symbol_right'] ?> <span class="old_price"><small><?= $curr['symbol_left'] ."". (floatval($item['old_price']) * $curr['value']) . " " . $curr['symbol_right']?></small></span> </span>
                                    </div>
                                </div>

							<?php if ($section_items_counter  === 3||
									  $sale_products_counter=== $sale_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $sale_products_counter++; ?>
							<?php endforeach; ?>

                        </div>
						<div class="featured-products__link">
							<a  href="<?=PRODUCT . "&sale=1"?>">
							View All
							<span class="categories-moving-arrow moving-arrow"><i class="fa fa-angle-right"></i></span>
							</a>
						</div>
                    </div>
				<?php endif; ?>
                </div>
				<!-- Sale Product Section End -->

				<!-- Popular Product Section Start -->
                <div class="col-lg-4 col-md-6">

					<?php if ($popular_products): ?>
                    <div class="latest-product__text rounded-border">
                        <h4>Hits</h4>
                        <div class="latest-product__slider owl-carousel">

							<?php $popular_products_counter = 1; ?>
							<?php foreach($popular_products as $item): ?>
							<?php $popular_products_size = sizeof($popular_products); ?>
							<?php if (  $popular_products_counter===1 ||
										$popular_products_counter===4 ||
									 	$popular_products_counter===7  ): ?>
							<?php $section_items_counter = 1; ?>
							<div class="latest-prdouct__slider__item">
							<?php endif; ?>

							<?php $old_price = $item['old_price']!=='0' ? "<span class='old-price'>" . $item['old_price'] . "</span>":'' ?>

								<div class="latest-product__item">
									<a href="<?=PRODUCT ?><?=$category['alias']?>" class="full-size-link featured-full-size-link"></a>
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span class="price_span"><?= $curr['symbol_left'] ."". (floatval($item['price']) * $curr['value']) . " " . $curr['symbol_right'] ?> <span class="old_price"><small><?= $curr['symbol_left'] ."". (floatval($item['old_price']) * $curr['value']) . " " . $curr['symbol_right']?></small></span> </span>
                                    </div>
                                </div>

							<?php if ($section_items_counter  === 3||
									  $popular_products_counter=== $popular_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $popular_products_counter++; ?>
							<?php endforeach; ?>

                        </div>
						<div class="featured-products__link">
							<a  href="<?=PRODUCT . "&hit=1"?>">
							View All
							<span class="categories-moving-arrow moving-arrow"><i class="fa fa-angle-right"></i></span>
							</a>
						</div>
                    </div>
				<?php endif; ?>
                </div>
				<!-- Sale Product Section End -->
            </div>
        </div>
    </section>
	<?php endif; ?>
	<!-- End Featured Products Section -->

	<!-- Start Daydeal Section -->
	<?php if($daydeal): ?>
	<?php $datetime = makeDate($daydeal_deal[1]['expires_on']); ?>
	<?php foreach($daydeal_product as $item): ?>
	<section class="ftco-section img" style="background-image: url(<?=IMG . $daydeal_deal[1]['img'] ?>);">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate shadow rounded-border">
					<span class="subheading">Best Price For You</span>
					<h2 class="mb-4">Deal of the day</h2>
					<h3><a href="product/<?=$item['alias']?>"> <?=$item['title']?>
					<span class="moving-arrow"><i class="fa fa-angle-right"></i></span> </a></h3>
					<span class="price">was <?=$curr['symbol_left'] ."". (floatval($item['old_price']) * $curr['value']) . " " . $curr['symbol_right']?> &nbsp; <a class="daydeal-link" href="<?=PRODUCT . $item['alias']?>" class="">now <?=$curr['symbol_left'] ."". (floatval($item['price']) * $curr['value']) . " " . $curr['symbol_right']?> only</a></span>
					<div id="timer" class="d-flex mt-5">
							<div class="time" id="days"></div>
							<div class="time pl-3" id="hours"></div>
							<div class="time pl-3" id="minutes"></div>
							<div class="time pl-3" id="seconds"></div>
					</div>
					<p> <?=$item['content']?> </p>
         		</div>
        	</div>
    	</div>

	<script>
		const dayDealTime = "<?=$datetime?>";
	</script>

    </section>
	<?php endforeach; ?>
	<?php endif; ?>
	<!-- End Daydeal Section -->


	 <!-- Blog Section Begin -->
	<?php if ($blogs): ?>
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
						<?php if ($blogs_info): ?>
						<?php foreach($blogs_info as $item): ?>
                        <h2 class="subheading"><?=$item['title'] ?></h2>
						<p><?=$item['content']?></p>
						<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
				<?php $blogs_counter = 1; ?>
				<?php foreach($blogs as $item): ?>
				<?php $blogDate = reverseDate($item['posted_on']); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item shadow rounded-border">
						<div class="blog__item__part-1">
							<div class="blog__item__pic">
                            <img src="<?=IMG . $item['img']?>" class="main__blog-img" alt="<?=$item['title']?>">
                        	</div>
							<ul class="blog-ul">
                                <li><i class="fa fa-calendar-o"> &nbsp; &nbsp;</i><?=$blogDate; ?></li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
						</div>
						<div class="blog__item__part-2">
    						<div class="blog__item__text">
                            <h5><a href="<?=BLOG . $item['alias']?>"><?=$item['title']?></a></h5>
                            <p><?=$item['description']?></p>
                        </div>
						</div>


                    </div>
                </div>

				<?php endforeach; ?>
            </div>
			<div class="row">
				<div class="col-mg-12 featured-products__link">
					<a href="<?=BLOG?>"> View more
					<span class="categories-moving-arrow moving-arrow"><i class="fa fa-angle-right"></i></span> </a>
				</div>
			</div>
        </div>
    </section>
	<?php endif; ?>
    <!-- Blog Section End -->

    <!-- <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Garreth Smith</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr>

		<section class="ftco-section ftco-partner">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-sm ftco-animate">
    				<a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    		</div>
    	</div>
    </section> -->

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
