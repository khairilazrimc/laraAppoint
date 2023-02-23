@include('user.partials.head')
@include('user.partials.header')

<div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">My Appointments</h1>
    <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      
      @foreach ($doctor as $doctorz)        
      <div class="item">
        <div class="card-doctor">
          <div class="header">
            <img src="doctorimages/{{ $doctorz->image }}" alt="">
            <div class="meta">
              <a href="#"><span class="mai-call"></span></a>
              <a href="#"><span class="mai-logo-whatsapp"></span></a>
            </div>
          </div>
          <div class="body">
            <p class="text-xl mb-0">{{ $doctorz->name }}</p>
            <span class="text-sm text-grey">{{ $doctorz->speciality }}</span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

@include('user.partials.footer')
@include('user.partials.foot')