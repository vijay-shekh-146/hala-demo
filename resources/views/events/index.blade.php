<!DOCTYPE html>
<html lang="en">
<head>
  <title>Events</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Events List</h2>

  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
  <div class="row mb-3 pb-3">
    <div class="col-md-6">
      <!-- <input type="text" class="form-control" placeholder="Search"> -->
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('events.create') }}" class="btn btn-primary">Add Event</a>
    </div>
  </div>

  <div class="row mt-3" style="margin-top: 15px;">
   <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Event ID</th>
        <th>Title</th>
        <th>Reg. Title</th>
        <th>Reg Dates</th>
        <th>Enable Transport</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($events as $event)
      <tr>
        <td>{{ $event->id }}</td>
        <td>{{ $event->title }}</td>
        <td>{{ $event->button_title }}</td>
        <td><b>Start:</b> {{ date('d M Y', strtotime($event->start_date)) }} {{ $event->start_time }} <br> <b>End:</b> {{ date('d M Y', strtotime($event->end_date)) }} {{ $event->end_time }}</td>
        <td>{{ $event->transport_status }}</td>
        <td>{{ $event->status }}</td>
        <td>
          <button type="button" class="btn btn-primary">Edit</button>
        </td>
      </tr>
    @endforeach
    </tbody>
   </table>

  </div>
</div>

</body>
</html>
