<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\CheckIn;
use App\Models\Admin\Checkout;
use App\Models\Admin\RoomType;
use App\Models\Admin\Room;
use Illuminate\Http\Request;
use Auth;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData =  CheckIn::with('room')->orderBy('id', 'DESC')->get();
        return view('admin.checkIn.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.checkIn.page1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'day' => 'required',
            'adult' => 'required',
            'kids' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('room/checkIn/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['created_by'] = Auth::id();
        $dataStore = CheckIn::create($validatedData);

        if($dataStore){
            return redirect()->route('admin.checkIn.page2.create', $dataStore->id)->with('success', 'Data Store Successful.');
        }else{
            return redirect()->route('admin.checkIn.create')->with('error', 'Data Store Failed.');
        }
        
    }

    public function page2Create($id){

        $roomList = RoomType::with('rooms')->where('status', 1)->get();
        return view('admin.checkIn.page2',compact(['roomList','id']));
    }

    public function page2Store(Request $request){

        $validator = Validator::make($request->all(), [
            'room_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'nullable',
            'address' => 'required',
            'nid_no' => 'required',
            'age' => 'nullable',
            'gender' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('checkIn/page2/create/'.$request->booking_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->file('file')) {

            $file = $request->file('file'); 
            $profile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents'), $profile);
            $imagePath = 'uploads/documents/' .$profile;
        }

        $validatedData = $validator->validated();
        $validatedData['file'] = $imagePath;
        $validatedData['available_status'] = 1;
        $validatedData['created_by'] = Auth::id();
        $dataStore = CheckIn::where('id', $request->booking_id)->update($validatedData);

        if($dataStore){
            return redirect()->route('admin.checkIn.index')->with('success', 'Data Store Successful.');
        }else{
            return redirect()->route('admin.checkIn.page2.create', $request->booking_id)->with('error', 'Data Store Failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckIn $checkIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CheckIn::find($id);
        $selectedRooms = json_decode($data->room_id); 
        $roomList = RoomType::with('rooms')->where('status', 1)->get();
        return view('admin.checkIn.edit',compact(['data','selectedRooms','roomList']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'day' => 'required',
            'adult' => 'required',
            'kids' => 'nullable',
            'room_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'nullable',
            'address' => 'required',
            'nid_no' => 'required',
            'age' => 'nullable',
            'gender' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('checkIn/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->file('file')) {

            $file = $request->file('file'); 
            $profile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents'), $profile);
            $imagePath = 'uploads/documents/' .$profile;
        }else{
            $imagePath = CheckIn::where('id', $id)->first()->file;
        }

        $validatedData = $validator->validated();
        $validatedData['file'] = $imagePath;
        $validatedData['updated_by'] = Auth::id();

        $dataUpdate = CheckIn::where('id', $id)->update($validatedData);

        if($dataUpdate){
            return redirect()->route('admin.checkIn.index')->with('info', 'Data Updated Successful.');
        }else{
            return redirect()->route('admin.checkIn.edit')->with('error', 'Data Update Failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = CheckIn::find($id);
        $data->delete();

        if($data){
            return redirect()->route('admin.checkIn.index')->with('success', 'Data Deleted Successful.');
        }else{
            return redirect()->route('admin.checkIn.index')->with('error', 'Data Delete Failed.');
        }
    }

    public function checkoutPage($id){

        $data = CheckIn::find($id);
        $roomList = RoomType::with('rooms')->where('status', 1)->get();
        $selectedRooms = json_decode($data->room_id, true);
        $rooms = Room::whereIn('id', $selectedRooms)->get();

        return view('admin.checkOut.create',compact('data','roomList','rooms','selectedRooms'));
    }

    public function getCheckoutInfo(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
            'room_cost' => 'required',
            'laundry_cost' => 'nullable',
            'food_cost' => 'nullable',
            'service_cost' => 'nullable',
            'other_cost' => 'nullable',
            'subtotal' => 'required',
            'vat' => 'nullable',
            'discount_type' => 'nullable',
            'discount' => 'nullable',
            'grand_total' => 'required',
            'advanced' => 'nullable',
            'due' => 'nullable',
            'payment_method' => 'required',
            'transaction_id' => 'nullable',
            'note' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('checkOut/create/'.$request->booking_id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();

        $checkoutData = new Checkout();
        $checkoutData->checkout_date = date('Y-m-d');
        $checkoutData->booking_id = $request->booking_id;
        $checkoutData->room_cost = $request->room_cost;
        $checkoutData->laundry_cost = $request->laundry_cost;
        $checkoutData->food_cost = $request->food_cost;
        $checkoutData->service_cost = $request->service_cost;
        $checkoutData->other_cost = $request->other_cost;
        $checkoutData->subtotal = $request->subtotal;
        $checkoutData->vat = $request->vat;
        $checkoutData->discount_type = $request->discount_type;
        $checkoutData->discount = $request->discount;
        $checkoutData->grand_total = $request->grand_total;
        $checkoutData->advanced = $request->advanced;
        $checkoutData->due = $request->due;
        $checkoutData->payment_method = $request->payment_method;
        $checkoutData->transaction_id = $request->transaction_id;
        $checkoutData->payment_status = 1;
        $checkoutData->note = $request->note;
        $checkoutData->created_by = Auth::id();
        $checkoutData->save();

        $checkInData = CheckIn::where('id', $request->booking_id)->first();
        $checkInData['checkout_id'] = $checkoutData->id;
        $checkInData->save();

        $rooms = json_decode($checkInData->room_id, true);
        Room::whereIn('id', $rooms)->update(['available_status' => 0]);

        if($checkoutData){
            return redirect()->route('admin.checkIn.index')->with('success', 'Check Out Successful.');
        }else{
            return redirect()->route('admin.checkOut.create', $request->booking_id)->with('error', 'Check Out Failed.');
        }

    }
}
