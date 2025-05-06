extends('admin.layouts')

@section('content')
    <div class="container">
      <h1>details</h1>
      <p>Name: {{ $event->name }}</p>
      <p>Created At: {{ $event->created_at }}</p>
      <p>Updated At: {{ $event->updated_at }}</p>
    </div>
@endsection