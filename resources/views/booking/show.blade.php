@extends('park_layouts.app')
@section('title','Contact')
@section('content')
@if ($message = Session::get('success'))
@push('scripts')
<script>
    var message = '{{$message}}';
    toast(message);
</script>
@endpush
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Bookings</h1>

                <table class="table table-bordered table-responsive-lg">
                    <thead>
                        <tr>
                            <td>Sr.No</td>
                            <td>User Name</td>
                            <td>Email</td>
                            <td>Contact No</td>
                            <td>Park Name</td>
                            <td>Sport</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Added By</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($bookings)>0)
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$booking->user_name}}</td>
                            <td>{{$booking->email}}</td>
                            <td>{{$booking->contact ? $booking->contact : '-----'}}</td>
                            <td>{{$booking->park_name}}</td>
                            <td>{{$booking->sport}}</td>
                            <td>{{$booking->date}}</td>
                            <td>{{$booking->time}}</td>
                            <td>{{$booking->user->name}}</td>
                            <td>
                                <form action="{{route('booking.destroy',$booking->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ,You want to Delete')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">
                                <p class="text-center">No Record found</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div><!-- /.8 -->

        </div> <!-- /.row-->
    </div>
</div>

@endsection