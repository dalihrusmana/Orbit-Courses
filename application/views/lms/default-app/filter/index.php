<?php $this->load->view('lms/default-app/_layouts/header'); ?>
<?php $this->load->view('lms/default-app/_layouts/nav'); ?>

<div class="container u-mv-small margin-bottom-26-menu" style="margin-top: 130px !important;">

	<div class="row">

		<div class="col-12">
			<div class="u-mb-small u-pv-small u-border-bottom">
				<div class="row">
					<div class="col-lg">
						<h3 class="h3 font-color-hitam">
							Filter Kelas
						</h3>
						<p class="font-color-hitam2">Cari kelas favoritmu</p>
					</div>
					<div class="justify-content-end">
						<a class="btn btn-primary-orbit h4" href="<?php echo base_url() ?>">
							Kembali ke Katalog Kelas
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="row">

				<div class="col-12">
					<form action='<?php echo base_url('courses-filter') ?>' class="c-search-form c-search-form--dark u-border-left u-border-top u-border-right u-border-bottom" method="GET">

						<?php if (!empty($this->input->get('q'))) : ?>
							<input type="hidden" name='q' value="<?php echo $this->input->get('q') ?>">
						<?php endif ?>

						<h5 class="c-search-form__label font-color-hitam">
							Urut Berdasarkan Kelas
						</h5>
						<div class="c-search-form__section u-mb-medium font-color-hitam2">
							<div class="c-choice c-choice--radio u-mb-xsmall u-mr-small">
								<input value="new" class="c-choice__input" id="filter_new" name="sort" type="radio" <?php echo (!empty($this->input->get('sort')) and $this->input->get('sort') == 'new') ? 'checked' : 'checked'  ?>>
								<label class="c-choice__label font-color-hitam2" for="filter_new">
									Terbaru
								</label>
							</div>

							<div class="c-choice c-choice--radio u-mb-xsmall  u-mr-small">
								<input value="old" class="c-choice__input" id="filter_old" name="sort" type="radio" <?php echo (!empty($this->input->get('sort')) and $this->input->get('sort') == 'old') ? 'checked' : ''  ?>>
								<label class="c-choice__label font-color-hitam2" for="filter_old">
									Terlama
								</label>
							</div>

							<div class="c-choice c-choice--radio u-mb-xsmall">
								<input value="price_low" class="c-choice__input" id="filter_price_low" name="sort" type="radio" <?php echo (!empty($this->input->get('sort')) and $this->input->get('sort') == 'price_low') ? 'checked' : ''  ?>>
								<label class="c-choice__label font-color-hitam2" for="filter_price_low">
									Harga Terendah
								</label>
							</div>

							<div class="c-choice c-choice--radio u-mb-xsmall">
								<input value="price_high" class="c-choice__input" id="filter_price_high" name="sort" type="radio" <?php echo (!empty($this->input->get('sort')) and $this->input->get('sort') == 'price_high') ? 'checked' : ''  ?>>
								<label class="c-choice__label font-color-hitam2" for="filter_price_high">
									Harga Tertinggi
								</label>
							</div>
						</div>

						<h5 class="c-search-form__label font-color-hitam">
							Filter Kategori
						</h5>
						<div class="c-search-form__section u-mb-medium">
							<select name='category' class="select2-search" data-placeholder='<?php echo $this->lang->line('select_category') ?>'>
								<option value=""></option>
								<option value="null">All Category</option>
								<?php
								foreach ($widget['all_category'] as $category_name => $child_category) {

									echo "<optgroup label='" . $category_name . "'>";

									foreach ($child_category as $category) {
										if (!empty($this->input->get('category')) and $this->input->get('category') == $category['slug']) {
											echo "<option value='" . $category['slug'] . "' selected>" . $category['name'] . "</option>";
										} else {
											echo "<option value='" . $category['slug'] . "'>" . $category['name'] . "</option>";
										}
									}

									echo "</optgroup>";
								}

								?>
							</select>
						</div>

						<h5 class="c-search-form__label font-color-hitam">
							Filter Harga
						</h5>
						<div class="c-search-form__section u-mb-medium">
							<div class="c-choice c-choice--radio u-mb-xsmall u-mr-small">
								<input value="all" class="c-choice__input" id="priceall" name="price" type="radio" <?php echo (!empty($this->input->get('price')) and $this->input->get('price') == 'all') ? 'checked' : 'checked'  ?>>
								<label class="c-choice__label font-color-hitam2" for="priceall">Semua</label>
							</div>

							<div class="c-choice c-choice--radio u-mb-xsmall  u-mr-small">
								<input value="free" class="c-choice__input" id="pricefree" name="price" type="radio" <?php echo (!empty($this->input->get('price')) and $this->input->get('price') == 'free') ? 'checked' : ''  ?>>
								<label class="c-choice__label font-color-hitam2" for="pricefree">Gratis</label>
							</div>

							<div class="c-choice c-choice--radio u-mb-xsmall">
								<input value="paid" class="c-choice__input" id="pricepaid" name="price" type="radio" <?php echo (!empty($this->input->get('price')) and $this->input->get('price') == 'paid') ? 'checked' : ''  ?>>
								<label class="c-choice__label font-color-hitam2" for="pricepaid">Berbayar</label>
							</div>
						</div>

						<button class="btn btn-primary-orbit c-btn--fullwidth" type="submit">Cari Kelas</button>
					</form>
				</div>

			</div>
		</div>

		<div class="col-lg-9 col-md-9">

			<div class="row">
				<?php if (!empty($courses['data'])) : ?>
					<?php foreach ($courses['data'] as $post) : ?>
						<div class="col-sm-12 col-lg-4">

							<article class="c-event u-p-zero">
								<div class="c-event__img u-m-zero" data-mh="imaged">
									<a title="<?php echo $post['title'] ?>" class="u-color-primary" href="<?php echo $post['url'] ?>">
										<img width="100%" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $post['image']['thumbnail'] ?>" alt="<?php echo $post['title'] ?>">
									</a>

									<span class="c-event__status u-bg-secondary u-color-primary">
										<a class='u-text-dark' href="<?php echo $post['sub_category']['url'] ?>" title="<?php echo $post['sub_category']['name'] ?>">
											<?php echo $post['sub_category']['name'] ?>
										</a>
									</span>
								</div>
								<div class="c-event__meta u-ph-small u-pt-xsmall" data-mh="heading">
									<a title="<?php echo $post['title'] ?>" class="u-color-primary u-h5 u-text-bold font-color-hitam" href="<?php echo $post['url'] ?>">
										<?php echo $post['title'] ?>
									</a>
								</div>
								<div class="c-event__meta u-ph-small u-pt-xsmall">
									<div class="o-media">
										<div class="o-media__img u-mr-xsmall">
											<div class="c-avatar c-avatar--xsmall">
												<img class="c-avatar__img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $post['author']['photo'] ?>" alt="<?php echo $post['author']['name'] ?>">
											</div>
										</div>
										<div class="o-media__body nowrap">
											<span class="u-text-small font-color-hitam">
												<?php echo $post['author']['name'] ?>
											</span>
											<small class="u-block u-text-mute u-text-xsmall font-color-hitam2">
												<?php echo $post['author']['headline'] ?>
											</small>
										</div>
									</div>
									<div class="u-ml-auto">
										<div class='rating-stars u-flex u-justify-between u-pt-xsmall nowrap'>
											<ul>
												<?php
												for ($i = 0; $i < 5; $i++) {

													if ($i < $post['rating']) {
														echo "
														<li class='star selected'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
													} else {
														echo "
														<li class='star'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
													}
												}
												?>
											</ul>
										</div>
									</div>
								</div>

								<div class="c-event__meta u-ph-small u-pt-xsmall margin-bottom-26">
									<span class="cursor-default c-btn c-event__btn c-btn--custom u-bg-secondary u-color-primary u-border-zero"><i class="fa fa-eye u-mr-xsmall"></i><?php echo $post['views'] ?></span>
									<?php if (empty($post['price'])) : ?>
										<span class="btn btn-gratis2 u-text-small">
											<?php echo $this->lang->line('free') ?>
										</span>
									<?php endif ?>

									<?php if (!empty($post['price'])) : ?>
										<span class="btn btn-harga2 u-text-small">
											<?php if (!empty($post['discount'])) : ?>
												<s class="u-text-xsmall u-mr-xsmall"><?php echo $post['price'] ?></s>
												<?php echo $post['price_total'] ?>
											<?php endif ?>
											<?php if (empty($post['discount'])) : ?>
												<?php echo $post['price_total'] ?>
											<?php endif ?>
										</span>
									<?php endif ?>

								</div>
							</article>

						</div>
					<?php endforeach ?>

					<div class="col-12">
						<?php $this->load->view('lms/default-app/_layouts/pagination'); ?>
					</div>


				<?php else : ?><div class="col-sm-12 col-lg-12">
						<div class="c-card u-p-medium u-pv-xlarge" data-mh="landing-cards">

							<div class="u-text-center u-justify-between">
								<p class="u-h5"><?php echo $this->lang->line('courses_not_found_search') ?></p>
							</div>

						</div>
					</div>
				<?php endif ?>

			</div>

		</div>

	</div><!-- // .row -->

</div><!-- // .container -->
<?php $this->load->view('lms/default-app/courses/part/nav-bottom'); ?>

<?php $this->load->view('lms/default-app/_layouts/footer'); ?>