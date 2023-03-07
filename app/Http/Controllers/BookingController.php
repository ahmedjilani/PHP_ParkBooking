<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($park_name)
    {
        return view('booking.form',compact('park_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'user_name' => $request->user_name,
            'contact' => $request->contact,
            'email' =>$request->email,
            'park_name' => $request->park_name,
            'date' => $request->date,
            'sport' => $request->sport,
            'time' => $request->time
        ]);
        return redirect()->back()->with('success' ,'Booking successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($park_name)
    {
        $bookings = Booking::where('park_name',$park_name)->get();
        return view('booking.show',compact('bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        return redirect()->back()->with('success' ,'Booking successfully Removed');
        
    }
    public function getCount(Request $request){
       $count = Booking::where(['park_name'=>$request->park_name,'date'=>$request->date,'time'=>$request->time,'sport'=>$request->sport])->count();
       $message = null;
       $status = false;
       if($request->sport == 'Football'){
          $message =  $count >= 22 ? 'No more Space Available.Please select another Date or Time..' : 22 - $count.' seats are available';
            $status = $count >= 22 ? false : true;
       }
       if($request->sport == 'Basketball'){
        $message =  $count >= 10 ? 'No more Space Available.Please select another Date or Time..' : 10 - $count.' seats are available';
        $status = $count >= 10 ? false : true; 
    }
     if($request->sport == 'Jogging'){
        $message =  $count >= 7 ? 'No more Space Available.Please select another Date or Time..' : 7 - $count.' seats are available';
        $status = $count >= 7 ? false : true; 
    }
     if($request->sport == 'Dog Walking'){
        $message =  $count >= 5 ? 'No more Space Available.Please select another Date or Time..' : 5 - $count.' seats are available';
        $status = $count >= 5 ? false : true; 
    }
     if($request->sport == 'Picnic'){
        $message =  $count >= 5 ? 'No more Space Available.Please select another Date or Time..' : 5 - $count.' seats are available';
        $status = $count >= 5 ? false : true; 
    }
       return response()->json([
        'success' => JsonResponse::HTTP_OK,
        'message' => $message,
        'getStatus' => $status
    ], JsonResponse::HTTP_OK);
    }
    public function myBooking(){
        $bookings = auth()->user()->bookings;
        return view('booking.show',compact('bookings'));
    }
}
