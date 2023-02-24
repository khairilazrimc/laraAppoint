@include('user.partials.head')
@include('user.partials.header')
@include('user.partials.bannertop')

<div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">My Appointments</h1>
    <div class="wow fadeInUp row align-items-center">
      
      @foreach ($appointments as $appointment)        
      <div class="item col-md-3">
        <div class="card-doctor">
          <div class="header">
          <div class="body">
            <p class="text-xl mb-0">Name: {{ $appointment->name }}</p>
            <p class="text-sm text-grey mb-0">Status: {{ $appointment->status }}</p>
            <br>
            <p class="text-sm text-grey mb-0">Email: {{ $appointment->email }}</p>
            <p class="text-sm text-grey mb-0">Phone: {{ $appointment->phone }}</p>
            <p class="text-sm text-grey mb-0">Date: {{ $appointment->date }}</p>
            <br>
            <p class="text-sm text-grey mb-0">Doctor: {{ $appointment->doctor }}</p>
            <p class="text-sm text-grey mb-0">Message: {{ $appointment->message }}</p>
          </div>
            <div class="meta align-items-center">
              <a href="{{ url('cancel_appointment', $appointment->id) }}" onclick="return confirm('Please confirm your appointment cancellation.')" title="Cancel Appointment">X</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>

@include('user.partials.bannerbtm')
@include('user.partials.footer')
@include('user.partials.foot')