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
            <div class="col-lg-8 ">
                <h1>Contact Us</h1>

                <p class="lead">Need to get in touch with us? Either fill out the form with your inquiry.
                </p>
                <form id="contact-form" method="post" action="{{route('contact.store')}}" role="form">
                    @csrf
                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Firstname *</label>
                                    <input id="form_name" type="text" name="first_name" class="form-control"
                                        placeholder="Please enter your firstname *" required="required"
                                        data-error="Firstname is required.">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Lastname *</label>
                                    <input id="form_lastname" type="text" name="last_name" class="form-control"
                                        placeholder="Please enter your lastname *" required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="contact" class="form-control"
                                        placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Message *</label>
                                    <textarea id="form_message" name="message" class="form-control"
                                        placeholder="Message for me *" rows="4" required="required"
                                        data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="Send message">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div><!-- /.8 -->

        </div> <!-- /.row-->
    </div>
</div>

@endsection