@include('template.header')
	<div class="container">

		<!-- HEADER -->
		<div class="jp-header">
			<h1 class="text-center">JUAN'S AUTO PAINT</h1>
		</div>
		
		<!-- NAV -->
		<nav class="custom-header">
			<ul class="list-inline">
				<li><a href="{{ url('/') }}">NEW PAINT JOB</a></li>
				<li class="active"><a href="{{ url('paint_jobs') }}">PAINT JOBS</a></li>
			</ul>
		</nav>

		<!-- CONTENT -->
		<section class="paint-jobs">
			<h3 class="text-center">Paint Jobs</h3>
			<div class="clearfix spacing"></div>
			<div class="clearfix spacing"></div>

			<strong class="col-sm-12">Paint Jobs in Progress</strong>
			<div class="clearfix"></div>
			<div class="col-sm-9">
				<table class="default-jobs">
					<tr id="header">
						<td><strong>Plate No.</strong></td>
						<td><strong>Current color</strong></td>
						<td><strong>Target color</strong></td>
						<td><strong>Actions</strong></td>
					</tr>
					<!-- Content -->
					<tbody id="content">
						<tr>
						<td>JXS 766</td>
						<td>Green</td>
						<td>Red</td>
						<td><a href="#" id="mark_as_completed" class="color-default" onclick="return false">Mark as Completed</a></td>
					</tr>
					</tbody>
				</table>
			</div>
			<div class="col-sm-3">
				<table class="default-jobs shop-performance">
					<tr class="bg-default">
						<td colspan="2"><strong>SHOP PERFORMANCE</strong></td>

					</tr>
					<tr>
						<td>Totals Cars Painted</td>
						<td id="allTotal"></td>
					</tr>
					<tr>
						<td  colspan="2">Breakdown:</td>
					</tr>
						<td>
							<ul class="list-unstyled liDefault">
								<li>Blue</li>
								<li>Red</li>
								<li>Green</li>
							</ul>
						</td>
						<td>
							<ul class="list-unstyled liDefault">
								<li id="allBlue"></li>
								<li id="allRed"></li>
								<li id="allGreen"></li>
							</ul>
						</td>
					</tr>
				</table>
			</div>

			<div class="clearfix spacing"></div>
			<div class="clearfix spacing"></div>
			
			<strong class="col-sm-12">Paint Queue</strong>
			<div class="col-sm-9">
				<table class="default-jobs">
					<tr id="header">
						<td><strong>Plate No.</strong></td>
						<td><strong>Current color</strong></td>
						<td><strong>Target color</strong></td>
					</tr>
					<!-- Content -->

					<tbody id="contentQueue">
					</tbody>
				</table>
			</div>
		</section>
	

		<footer>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</footer>
	</div>
@include('template.footer')

	<script>
		$(document).ready(function () {
			loadAllPaintJobsProgress();
		})
	</script>