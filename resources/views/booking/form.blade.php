@extends('park_layouts.app')
@section('title','Booking')
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
            <div class="col-lg-10 ">
                <h1>Booking</h1>

                <p class="lead">{{$park_name}} Local Park Booking
                </p>
                <form id="contact-form" method="post" action="{{route('booking.store')}}" role="form">
                    @csrf
                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">User Name *</label>
                                    <input id="form_lastname" type="text" name="user_name" class="form-control"
                                        placeholder="Please enter your User name *" required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone">Contact</label>
                                    <input id="form_phone" type="tel" name="contact" class="form-control"
                                        placeholder="Please enter your contact">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="park_name">Park Name *</label>
                                    <input id="park_name" type="text" name="park_name" value="{{$park_name}}"
                                        class="form-control" readonly>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Sports *</label>
                                    <select class="form-control" name="sport" id="sport">
                                        <option selected disabled>-- Select Type --</option>
                                        @foreach(config('sports') as $sport)
                                        <option value="{{$sport}}">{{$sport}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date *</label>
                                    <input id="date" type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Time *</label>
                                    <select class="form-control" name="time" id="time">
                                        <option selected disabled>-- Select Time --</option>
                                        @foreach(config('time') as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <p id="message" class="mt-4 text-success"></p>
                            </div>
                            <br>
                            <div class="col-md-12 mt-2">
                                <input type="submit" id="book_now" class="btn btn-success btn-send d-none"
                                    value="Book Now">
                            </div>
                        </div>
                    </div>

                </form>

            </div><!-- /.8 -->

        </div> <!-- /.row-->
    </div>
</div>
@push('scripts')
<script>
    var dateToday = new Date(); 
    var datepickerid = document.getElementById('date');
    datepickerid.min = new Date().toISOString().split("T")[0];
    $('#date').on('change',function(){
        var time = $('#time :selected').val();
            if(time != '-- Select Time --'){
                getBookingCount();
                }
        });
        $('#sport').on('change',function(){
            var time = $('#time :selected').val();
            if(time != '-- Select Time --'){
                getBookingCount();
                }
        });
    $('#time').on('change',function(){
            getBookingCount();
        });
        function getBookingCount(){
            var time = $('#time :selected').val();
            var date = $('#date').val();
            var sport = $('#sport :selected').val();
            var park_name =  $('#park_name').val();
            if(time != '-- Select Time --'){
                if(sport == '-- Select Type --'){
                    dnagerToast('Please Select any sport..');
                    return false;
                }
                if(!date){
                    dnagerToast('Please Select Date..');
                    return false;
                    }
            var url = '{{route("booking-getcount")}}';
         $.ajax({
            url: url,
            type: 'GET',
            data : {
                'date' : date,
                'sport' : sport,
                'time' : time,
                'park_name' : park_name
            },
            success: function (response) {
                if(response.getStatus == true){
                    $('#message').empty().append(response.message);
                    $('#book_now').removeClass('d-none');
                }
                else{
                    $('#message').empty().append(response.message);
                    $('#book_now').addClass('d-none');
                }
                    
            },
            error:function(responses){
                    
            }
        });
    }
}
</script>
@endpush
@endsection