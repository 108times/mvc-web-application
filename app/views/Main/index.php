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
				<div class="icon bg-color-<?=$features_counter?> active d-flex justify-content-center align-items-center mb-2">
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
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end main-category-<?=$categories_counter?>" style="background-image: url(<?=IMG.$category['img']?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#<?=$category['alias']?>"><?=$category['title']?></a></h2>
							</div>
						</div>
					<?php $categories_counter++; ?>
					<?php endforeach; ?>

						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end main-category-action" style="background-image: url(<?=IMG.'category.jpg'?>);">
							<div class="text-center w-100 h-100">
								<h2><a href="#" class="btn btn-primary">Shop now</a></h2>
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
    <section class="latest-product spad">
			<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    	</div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
					<!-- Latest Product Section Begin -->
					<?php if ($latest_products): ?>
                    <div class="latest-product__text">
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

								<a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span><?= $item['price'] ?></span>
                                    </div>
                                </a>

							<?php if ($section_items_counter  === 3||
									  $latest_products_counter=== $latest_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $latest_products_counter++; ?>
							<?php endforeach; ?>

                        </div>
                    </div>
				<?php endif; ?>
                </div>
				<!-- Latest Product Section End -->

				<!-- Sale Product Section Start -->
                <div class="col-lg-4 col-md-6">
					<?php if ($sale_products): ?>
                    <div class="latest-product__text">
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

								<a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span><?= $item['price'] ?></span>
                                    </div>
                                </a>

							<?php if ($section_items_counter  === 3||
									  $sale_products_counter=== $sale_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $sale_products_counter++; ?>
							<?php endforeach; ?>

                        </div>
                    </div>
				<?php endif; ?>
                </div>
				<!-- Sale Product Section End -->

				<!-- Popular Product Section Start -->
                <div class="col-lg-4 col-md-6">

					<?php if ($popular_products): ?>
                    <div class="latest-product__text">
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

								<a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= IMG.$item['img'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $item['title'] ?></h6>
                                        <span><?= $item['price'] ?></span>
                                    </div>
                                </a>

							<?php if ($section_items_counter  === 3||
									  $popular_products_counter=== $popular_products_size): ?>
							</div>
							<?php endif; ?>
							<?php $section_items_counter++; ?>
							<?php $popular_products_counter++; ?>
							<?php endforeach; ?>

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
	<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
					<span class="subheading">Best Price For You</span>
					<h2 class="mb-4">Deal of the day</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
					<h3><a href="#">Spinach</a></h3>
					<span class="price">$10 <a href="#">now $5 only</a></span>
					<div id="timer" class="d-flex mt-5">
							<div class="time" id="days"></div>
							<div class="time pl-3" id="hours"></div>
							<div class="time pl-3" id="minutes"></div>
							<div class="time pl-3" id="seconds"></div>
					</div>
         		</div>
        	</div>
    	</div>
    </section>
	<?php endif; ?>
	<!-- End Daydeal Section -->

    <section class="ftco-section testimony-section">
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
    </section>

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
