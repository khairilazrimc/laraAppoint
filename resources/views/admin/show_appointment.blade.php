@include('admin.partials.header')
@include('admin.partials.sidebar')
@include('admin.partials.navbar')

<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List of Appointments</h4>
        <p class="card-description">Appointments created by clients</p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Client</th>
                <th>Contact</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

              @foreach($appointments as $appointment)
              <tr>
                <td>{{ $appointment->name }}</td>
                <td class="lh-base">{{ $appointment->email }}<br>{{ $appointment->phone }}</td>
                <td>{{ $appointment->doctor }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->message }}</td>
                <td class="">
                  <label class="badge badge-dark">{{ $appointment->status }}</label>
                  <br>
                  <a href="{{ url('approve_appointment', $appointment->id) }}" class="btn btn-sm btn-success mt-2">Approve</a>
                  <br>
                  <a href="{{ url('disapprove_appointment', $appointment->id) }}" class="btn btn-sm btn-danger mt-2">Disapprove</a>
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