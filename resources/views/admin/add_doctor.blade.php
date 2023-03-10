@include('admin.partials.header')
@include('admin.partials.sidebar')
@include('admin.partials.navbar')

<div class="row">
  <div class="col-lg-6 col-sm-12">
    <form method="POST" action="{{ url('add_doctor_process') }}" enctype="multipart/form-data">
      @csrf
      <div class="text-muted">
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

@include('admin.partials.footer')