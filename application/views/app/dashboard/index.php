<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>

<div class="c-toolbar u-justify-center u-mb-small">
	<div class="col-12 col-lg-10 col-xl-8">
		<div class="row">
			<div class="col-6 col-md-3 c-toolbar__state">
				<h4 class="c-toolbar__state-number">Rp<?php echo $total_amount; ?></h4>
				<span class="c-toolbar__state-title">Total Pendapatan</span>
			</div>
			<div class="col-6 col-md-3 c-toolbar__state">
				<h4 class="c-toolbar__state-number"><?php echo $count_courses; ?></h4>
				<span class="c-toolbar__state-title">Kelas Tersedia</span>
			</div>
			<div class="col-6 col-md-3 c-toolbar__state">
				<h4 class="c-toolbar__state-number"><?php echo $count_user; ?></h4>
				<span class="c-toolbar__state-title">Total Member</span>
			</div>
			<div class="col-6 col-md-3 c-toolbar__state">
				<h4 class="c-toolbar__state-number"><?php echo $count_mentor; ?></h4>
				<span class="c-toolbar__state-title">Total Mentor</span>
			</div>
		</div><!-- // .row -->
	</div><!-- // -->
</div>

<?php $this->load->view('app/_layouts/content'); ?>

<div class="col-lg-8 u-mb-medium">
	<div class="c-graph-card" data-mh="secondary-graphs">
		<div class="c-graph-card__content u-flex u-justify-between u-align-items-baseline">
			<h3 class="c-graph-card__title u-h4">Statistik Pengunjung</h3>
			<div class="u-text-right">
				<h4 class="u-h4 u-mb-zero"><?php echo @$statistic_month; ?></h4>
				<span <?php echo (@$statistic_percent_status == 'up' ? 'class="u-color-success"' : 'class="u-color-danger"') ?>><?php echo @$statistic_percent ?>%</span>
			</div>
		</div>

		<div class="c-graph-card__chart u-p-zero">
			<canvas id="statistic_chart_js" width="50" height="25"></canvas>
		</div>

	</div>

</div>

<div class="col-lg-4 u-mb-medium">

	<div class="c-card u-p-medium u-mb-small">

		<h3 class="u-mb-small">Log Pengunjung</h3>

		<p class="u-mb-xsmall">
			Pengunjung Hari Ini
			<span class="u-float-right u-text-mute">
				<?php echo $hits_today; ?>
			</span>
		</p>

		<p class="u-mb-xsmall">
			Total Pengunjung Hari Ini
			<span class="u-float-right u-text-mute">
				<?php echo $total_visitor ?>
			</span>
		</p>

	</div>

	<div class="c-card u-p-medium u-mb-small">

		<h3 class="u-mb-small">Tampil Halaman</h3>

		<p class="u-mb-xsmall">
			Hari Ini

			<span class="u-float-right u-text-mute">
				<?php echo $page_view_today; ?>
			</span>
		</p>


		<p class="u-mb-xsmall">
			Kemarin

			<span class="u-float-right u-text-mute">
				<?php echo $page_view_yesterday; ?>
			</span>
		</p>


		<p class="u-mb-xsmall">
			Satu Bulan Terakhir

			<span class="u-float-right u-text-mute">
				<?php echo $page_view_last_month; ?>
			</span>
		</p>


		<p class="u-mb-xsmall">
			Sepanjang Waktu
			<span class="u-float-right u-text-mute">
				<?php echo $page_view_all_time; ?>
			</span>
		</p>

	</div>

	<div class="c-card u-p-medium u-mb-small">

		<h3 class="u-mb-small">Tampil Halaman by Browsers</h3>

		<?php if ($page_view_by_browser_data) : foreach ($page_view_by_browser_data as $data) : ?>
				<p class="u-mb-xsmall">
					<?php echo $data['browser'] ?>

					<span class="u-float-right u-text-mute">
						<?php echo $data['jumlah']; ?>
						<span class="u-color-info">
							(<?php echo $data['percentage'] ?>)
						</span>
					</span>
				</p>
			<?php endforeach ?>
		<?php else : ?>
			<P>Tidak ada data.</P>
		<?php endif ?>

	</div>

	<div class="c-card u-p-medium u-mb-small">

		<h3 class="u-mb-small u-text-medium">Tampil Halaman by OS</h3>


		<?php if ($page_view_by_os_data) : foreach ($page_view_by_os_data as $data) : ?>
				<p class="u-mb-xsmall">
					<?php echo $data['os'] ?>

					<span class="u-float-right u-text-mute">
						<?php echo $data['jumlah'] ?>
						<span class="u-color-info">
							(<?php echo $data['percentage'] ?>)
						</span>
					</span>
				</p>
			<?php endforeach ?>
		<?php else : ?>
			<P>Tidak ada data.</P>
		<?php endif ?>

	</div>
</div>

<?php $this->load->view('app/_layouts/footer'); ?>