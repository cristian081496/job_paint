@include('template.header')
	<div class="container">

		<!-- HEADER -->
		<div class="jp-header">
			<h1 class="text-center">JUAN'S AUTO PAINT</h1>
		</div>
		
		<!-- NAV -->
		<nav class="custom-header">
			<ul class="list-inline">
				<li class="active"><a href="{{ url('/') }}">NEW PAINT JOB</a></li>
				<li><a href="{{ url('paint_jobs') }}">PAINT JOBS</a></li>
			</ul>
		</nav>

		<!-- CONTENT -->
		<section class="new-paint-job">
			<h3 class="text-center">New Paint Job</h3>
			<div class="clearfix spacing"></div>
			<div class="clearfix spacing"></div>

			<div class="row carContainer">
				<div class="col-xs-12 col-md-5">
					<img src="{{asset('images/Default-Car.png')}}" alt="Car Current Color" class="img-repsponsive" id="car-current-color">
				</div>

				<div class="col-xs-12 col-md-2">
					<img src="{{asset('images/Shape-1.png')}}" class="img-repsponsive arrow-shape">
				</div>

				<div class="col-xs-12 col-md-5">
					<img src="{{asset('images/Default-Car.png')}}" alt="Car Target Color" class="img-repsponsive" id="car-target-color">
				</div>
			</div>

			<!-- Car details -->

			<div class="clearfix spacing"></div>
			<form id="carDetails">
				<h4>Car Details</h4>
				<div class="message alert "></div>
				<div class="clearfix spacing"></div>
				<table>
					<tr>
						<td><p>Plate No.</p></td>
						<td><input type="text" name="plate_no" id="plate_no"></td>
					</tr>
					<tr>
						<td><p>Current Color</p></td>

						<td>
							<select name="selectCurrentColor" id="selectCurrentColor">
								<option value=""></option>
								<option value="red">RED</option>
								<option value="green">GREEN</option>
								<option value="blue">BLUE</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><p>Target Color</p></td>

						<td>
							<select name="selectTargetColor" id="selectTargetColor">
								<option value=""></option>
								<option value="red">RED</option>
								<option value="green">GREEN</option>
								<option value="blue">BLUE</option>
							</select>
						</td>
					</tr>
				</table>
				<div class="clearfix">&nbsp;</div>
				<button type="button" id="submitPaintJob" class="btn bg-default">Submit</button>
			</form>
		</section>


		<footer>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</footer>
	</div>
@include('template.footer')	
	<script>
		$(document).ready(function () {
			PaintJobsForm()
			createNewJobPaint()
		});
	</script>

