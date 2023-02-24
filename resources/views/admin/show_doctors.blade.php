@include('admin.partials.header')
@include('admin.partials.sidebar')
@include('admin.partials.navbar')

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Doctors</h4>
        <a href="{{ url('add_doctor_view') }}" class="btn btn-xl btn-success mb-3">Register New Doctor</a>
        
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Doctor</th>
                <th>Contact</th>
                <th>Speciality</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($doctors as $doctor)
              <tr>
                <td><img src="doctorimages/{{ $doctor->image }}" style="width:50px;height:50px;object-fit:cover;border-radius:5px"></td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->speciality }}</td>
                <td>
                  <a href="{{ url('update_doctor_view', $doctor->id) }}" class="btn btn-sm btn-warning">Update</a>
                  <a href="{{ url('delete_doctor', $doctor->id) }}" onclick="return confirm('Please confirm to delete this doctor.')" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('admin.partials.footer')