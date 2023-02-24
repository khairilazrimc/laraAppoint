@include('admin.partials.header')
@include('admin.partials.sidebar')
@include('admin.partials.navbar')

<div class="row">
  <div class="col-lg-6 col-sm-12">
    <form method="POST" action="{{ url('mail_process', $appointment->id) }}">
      @csrf
      <div class="text-muted">
        <h3>Send Mail to Client</h3>
      </div>
      <div class="mt-3">
        <label>Mail Header:</label>
        <input type="text" name="mailheader" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Mail Body:</label>
        <textarea name="mailbody" class="form-control" rows="5" required></textarea>
      </div>
      <div class="mt-3">
        <label>Action Text:</label>
        <input type="text" name="actiontext" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Action URL:</label>
        <input type="text" name="actionurl" class="form-control" required>
      </div>
      <div class="mt-3">
        <label>Mail Footer:</label>
        <input type="text" name="mailfooter" class="form-control" required>
      </div>
      <div class="mt-5">
        <button type="submit" class="btn btn-success form-control">SUBMIT</button>
      </div>
    </form>
  </div>
</div>

@include('admin.partials.footer')