<!-- Footer -->

	<footer class="ftco-footer">
		<div class="container mb-5 pb-4">
			<div class="row">
				<div class="col-lg col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2 d-flex align-items-center">About</h2>
						<p>We're in this business since 2004 and We provide the best insdustrial services</p>
						<ul class="ftco-footer-social list-unstyled mt-4">
							<li><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg col-md-4">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Quick Links</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-md-6">
								<li><a href="{{route('main')}}"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
								<li><a href="{{route('about')}}"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
								<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
								<li><a href="{{route('projects')}}"><span class="fa fa-chevron-right mr-2"></span>Projects</a></li>
								<li><a href="{{route('contacts')}}"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg col-md-8">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Building Construction</a></li>
							<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Building Plan Drawing</a></li>
							<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Construction Material Supply</a></li>
							<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Consultation</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg col-md-6">
					<div class="ftco-footer-widget">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="fa fa-map-marker mr-3"></span><span class="text">HM Complex, #48 KK Street, Puttalam</span></li>
								<li><a href="#"><span class="fa fa-phone mr-3"></span><span class="text">+94322265511</span></a></li>
								<li><a href="#"><span class="fa fa-paper-plane mr-3"></span><span class="text">builders@hmgroupsl.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid bg-primary">
			<div class="container">
				<div class="row">
					<div class="col-md-6 aside-stretch py-3">
						
						<p class="mb-0">
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All Rights Reserved | Developed by <a href="https://addonlk.net/addonit/" target="_blank">Addon IT</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		@php $services = App\Models\service::select('title')->get();@endphp

		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="fa fa-close"></span>
						</button>
					</div>
					<div class="modal-body p-4 p-md-5">
						<div id="success-message-inquire"></div>

						<form action="{{route('save.inquires.message')}}" class="appointment-form ftco-animate" id="inquire-submit" method="POST">
							{{ csrf_field() }}
							<h3>Request Quote</h3>
							<div class="">
								<div class="form-group">
									<input type="text" class="form-control" name="fname" placeholder="First Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="lname" 
									 placeholder="Last Name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="mobile"  placeholder="Phone">
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="service" id="" class="form-control" required>
												<option value="">Select Your Services</option>
												@foreach ($services  as $service)
												<option value="{{$service->title}}">{{$service->title}}</option>
												@endforeach
											</select>
											{{-- <select name="service" id="" class="form-control" required>
												<option value="">Select Your Services</option>
												<option value="Architecture">Architecture</option>
												<option value="Renovation">Renovation</option>
												<option value="Construction3">Construction</option>
												<option value="Interior & Exterior">Interior &amp; Exterior</option>
												<option value="Chemical Research">Chemical Research</option>
												<option value="Petroleum & Gas">Petroleum &amp; Gas</option>
												<option value="Other Services">Other Services</option>
											</select> --}}
										</div>
									</div>
								</div>
							</div>
							<div class="">
								<div class="form-group">
									<textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
		<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
		<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
		<script src="{{asset('js/scrollax.min.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="{{asset('js/google-map.js')}}"></script>
		
		<script src="{{asset('js/main.js')}}"></script>
		<script src="{{asset('js/common.js')}}"></script>
		
	</body>
	</html>
	<script>
		$(document).ready(function(){
			$("#exampleModalCenter").click(function(){
				$('#success-message-inquire').html('');
			});
			$('#inquire-submit').submit(function(event) {
				event.preventDefault();

				var formData = $(this).serialize();

				$.ajax({
					url: $(this).attr('action'),
					type: $(this).attr('method'),
					data: formData,
					success: function(response) {
						if (response.success) {
							$('#success-message-inquire').html('<div class="alert-success text-center col-md-12 p-2">'+response.success+'</div>'); // display success message
						}
					},
					error: function(xhr) {
						$('#success-message-inquire').html('<div class="alert-danger text-center col-md-12 p-2">Somthing went wrong..</div>'); 
					}
				});
			});
		})

	</script>