@extends('park_layouts.app')
@section('title','Home')
@php
$greenwich = null;
$kent = null;
$newham = null;
if(auth()->user()->hasRole('admin')){
$greenwich = route('booking.show',"Greenwich");
$kent = route('booking.show',"Kent");
$newham = route('booking.show',"Newham");
}
if(auth()->user()->hasRole('user')){
$greenwich = route('booking-create',"Greenwich");
$kent = route('booking-create',"Kent");
$newham = route('booking-create',"Newham");
}
@endphp
@section('content')
<div class="row my-4">
    <div class="col-md-4 px-3">
        <a href="{{$newham}}">
            <div class="card">
                <img class="card-img-top"
                    src="https://images.cm.archant.co.uk/resource/responsive-image/8545662/article-lead-image/lg/1/20190227-nrc-wk10-plashet-park-8375.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Newham Local Park</h5>
                    <p class="card-text">Sports you can book.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Football</li>
                    <li class="list-group-item">Basketball</li>
                    <li class="list-group-item">Jogging</li>
                    <li class="list-group-item">Dog Walking</li>
                    <li class="list-group-item">Picnic</li>

                </ul>
            </div>
        </a>
    </div>
    <div class="col-md-4 px-3">
        <a href="{{$kent}}">
            <div class="card">
                <img class="card-img-top"
                    src="https://static.trip101.com/paragraph_media/pictures/002/411/132/large/Midweek_Birthday_Margate_Mini-Break-3220160816_%2829052138755%29.jpg?1617182836"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Kent Local Park</h5>
                    <p class="card-text">Sports you can book.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Football</li>
                    <li class="list-group-item">Basketball</li>
                    <li class="list-group-item">Jogging</li>
                    <li class="list-group-item">Dog Walking</li>
                    <li class="list-group-item">Picnic</li>
                </ul>
            </div>
        </a>
    </div>
    <div class="col-md-4 px-3">
        <a href="{{$greenwich}}">
            <div class="card">
                <img class="card-img-top"
                    src="https://www.visitgreenwich.org.uk/imageresizer/?image=%2Fdmsimgs%2FGreenwich_Park_1454583505.png&action=ProductDetailProFullWidth"
                    alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Greenwich Local Park</h5>
                    <p class="card-text">Sports you can book.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Football</li>
                    <li class="list-group-item">Basketball</li>
                    <li class="list-group-item">Jogging</li>
                    <li class="list-group-item">Dog Walking</li>
                    <li class="list-group-item">Picnic</li>
                </ul>
            </div>
        </a>
    </div>



</div>
@endsection