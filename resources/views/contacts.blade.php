<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">



    @php $page='home';  @endphp
    @include('header') 
	
	<section class="hero-wrap hero-wrap-2" style="background-image:  url('{{ asset('images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="{{route('main')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-3 bread">Contact us</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Contact us</span>
					<h2 class="mb-4">Message us for more details</h2>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-md-8">
				
					<div id="success-message"></div>
					<form class="form-horizontal mt-4"  method="POST"
					action="{{route('save.contact.message')}}" id="contact-save">
						@csrf
					
						<div class="col-md-8">
							@if (session('message_for') == 'manage_userclient_role')
								@include('common.alert')
							@endif
						</div>
					
			
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your Name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your Email" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="subject" class="form-control" placeholder="Subject" required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
								</div>
							</div>
						</div>
					</form>
					
				</div>

				<div class="col-md-4 d-flex pl-md-5">
					<div class="row">
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
								<p><span>Address:</span><a href="https://goo.gl/maps/LWL9fZQ848rGDBPD9"> HM Complex, #48 KK Street, Puttalam<a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Phone:</span> <a href="tel://+94322265511">+94322265511</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Email:</span> <a href="builders@hmgroupsl.com">builders@hmgroupsl.com</a></p>
							</div>
						</div>
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-globe"></span>
							</div>
							<div class="text">
								<p><span>Website</span> <a href="http://www.builders.hmgroupsl.com">www.builders.hmgroupsl.com</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.668983001837!2d79.8278510147102!3d8.033023506002825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afd1708037e90e3%3A0x9c99c613ea610314!2sHM%20BUILDERS%20(PVT)%20LTD!5e0!3m2!1sen!2slk!4v1660721740671!5m2!1sen!2slk" width="1110" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				</div>
			</div>
		</div>
	</section>

	@include('footer') 
	</html>

	<script>
		$(document).ready(function(){
			$('#success-message').html('');
			$('#contact-save').submit(function(event) {
				$('#success-message').html('');
				event.preventDefault();

				var formData = $(this).serialize();

				$.ajax({
					url: $(this).attr('action'),
					type: $(this).attr('method'),
					data: formData,
					success: function(response) {
						if (response.success) {
							$('#success-message').html('<div class="alert-success text-center col-md-12 p-2">'+response.success+'</div>'); // display success message
						}
					},
					error: function(xhr) {
						$('#success-message').html('<div class="alert-danger text-center col-md-12 p-2">Somthing went wrong..</div>'); 
					}
				});
			});
		})

	</script>