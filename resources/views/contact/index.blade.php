@extends('park_layouts.app')
@section('title','Contact')
@section('content')
<div class="card">
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 ">
            <h1>Contact Us</h1>
    
            <p class="lead">Need to get in touch with us? Either fill out the form with your inquiry.
            </p>
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <td>Sr.No</td>
                       <td>Name</td>
                       <td>Email</td>
                       <td>Contact No</td>
                       <td>Message</td>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($contacts as $contact)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$contact->first_name.' '. $contact->last_name }}</td>
                       <td>{{$contact->email}}</td>
                       <td>{{$contact->contact ? $contact->contact : '-----'}}</td>
                       <td>{{$contact->message}}</td>
                    </tr>
                   @endforeach
               </tbody>
           </table>
    
        </div><!-- /.8 -->
    
    </div> <!-- /.row-->
</div>
</div>

@endsection