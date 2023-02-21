@include('admin.header')
@include('admin.sidebar')
@include('admin.navbar')

@if(session()->has('message'))
<div class="alert alert-success" id="success-alert">
  {{ session()->get('message') }}
</div>
@endif

<!-- @include('admin.main') -->
<div class="row">
  <div class="col-xl-3 col-md-6 col-xm-12">
    <form method="POST" action="{{ url('upload_doctor') }}" enctype="multipart/form-data">
      @csrf
      <div class="mt-5 text-muted">
        <h3>Create Doctor</h3>
      </div>
      <div class="mt-3">
        <label>Doctor Name:</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Phone Number:</label>
        <input type="text" name="phone" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Speciality:</label>
        <input type="text" name="speciality" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Image:</label>
        <input type="file" name="image" class="form-control" required>
      </div>
      <div class="mt-5">
        <button type="submit" class="btn btn-success form-control">SUBMIT</button>
      </div>
    </form>
  </div>
</div>


@include('admin.footer')

<script type="text/javascript">
$(document).ready(function() {
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
  });
});
</script>