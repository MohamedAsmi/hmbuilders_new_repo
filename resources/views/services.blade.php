<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta property="og:title" content="HM BUILDERS & SUPPLIERS (PVT) LTD">
    <meta property="og:description" content="We Build Your Future">
    <meta property="og:image" content="{{asset('images/fav.png')}}">
    <meta property="og:url" content="https://builders.hmgroup.lk/">
    <title>HM BUILDERS & SUPPLIERS (PVT) LTD</title>
    <link rel="icon" type="image/png" href="images/fav.png">
    
    @php $page='home';  @endphp
    @include('header') 
    
<section class="hero-wrap hero-wrap-2" style="background-image:  url('{{ asset('images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
       <p class="breadcrumbs"><span class="mr-2"><a href="{{route('main')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-3 bread">Services</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section bg-half-light">
 <div class="container">
  <div class="row justify-content-center mb-5 pb-2">
    <div class="col-md-8 text-center heading-section ftco-animate">
     <span class="subheading">Our Services</span>
     <h2 class="mb-4">We Offer Services</h2>
   </div>
 </div>
 <div class="row">

  @foreach ($services as $service)
  <div class="col-md-4">
    <div class="services-wrap ftco-animate">
    <div class="img" style="background-image: url(image/{{$service->image}});"></div>
    <div class="text">
      <div class="icon"><span class="{{$service->icon}}"></span></div>
      <h2>{{$service->title}}</h2>
      <p>{{$service->description}}</p>
   
      <a href="#" class="btn-custom">Read more</a>
    </div>
  </div>
</div>

  @endforeach
   
  {{-- <div class="col-md-4">
      <div class="services-wrap ftco-animate">
      <div class="img" style="background-image: url(images/services-1.jpg);"></div>
      <div class="text">
        <div class="icon"><span class="flaticon-architect"></span></div>
        <h2>Building Construction</h2>
        <p>Houses</p>
        <p>Commercial Building</p>
        <p>Apartments</p>
        <p>Industrial Building</p>
        <p>Modular Building</p>
        <a href="#" class="btn-custom">Read more</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
      <div class="services-wrap ftco-animate">
      <div class="img" style="background-image: url(images/services-3.jpg);"></div>
      <div class="text">
        <div class="icon"><span class="flaticon-architect"></span></div>
        <h2>Building Plan Drawing</h2>
        <p>Architecture</p>
        <p>Structural</p>
        <p>Mechanical and Electrical</p>
        <p>Landscape</p>
        <a href="#" class="btn-custom">Read more</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
      <div class="services-wrap ftco-animate">
      <div class="img" style="background-image: url(images/services-6.jpg);"></div>
      <div class="text">
        <div class="icon"><span class="flaticon-architect"></span></div>
        <h2>Construction Material Supply</h2>
        <p>We supply a wide range of construction materials for residential and commercial construction jobs, we are the leading supplier of construction materials like washed sand, Aggregates of different types, varieties of bases, Sweet Sand, different sizes of boulders and Natural Rocks.</p>
        <a href="#" class="btn-custom">Read more</a>
      </div>
    </div>
  </div>

  <div class="col-md-4">
      <div class="services-wrap ftco-animate">
      <div class="img" style="background-image: url(images/services-5.jpg);"></div>
      <div class="text">
        <div class="icon"><span class="flaticon-architect"></span></div>
        <h2>Consultation</h2>
        <p>#</p>
        <a href="#" class="btn-custom">Read more</a>
      </div>
    </div>
  </div> --}}

  {{-- <div class="col-md-4">
      <div class="services-wrap ftco-animate">
      <div class="img" style="background-image: url(images/services-7.jpg);"></div>
      <div class="text">
        <div class="icon"><span class="flaticon-architect"></span></div>
        <h2>Interior Designing</h2>
        <p>Interior design is the art and science of enhancing the interior of a building to achieve a healthier and more aesthetically pleasing environment for the people using the space.</p>
        <a href="#" class="btn-custom">Read more</a>
      </div>
    </div>
  </div> --}}

</div>
</div>
</div>
</section>

@include('footer') 
</html>