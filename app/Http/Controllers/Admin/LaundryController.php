<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Laundry;
use App\Models\Admin\Amenities;
use App\Models\Admin\Vendor;
use Illuminate\Http\Request;
use Auth;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData =  Laundry::latest()->get();

        return view('admin.laundry.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenitiesList = Amenities::where('status', 1)->get();
        $vendorList = Vendor::where('status', 1)->get();

        return view('admin.laundry.create',compact(['amenitiesList','vendorList']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'amenities_id' => 'required',
            'room_no' => 'nullable',
            'vendor_id' => 'nullable',
            'description' => 'nullable',
            'assign_date' => 'nullable',
            'quantity' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('laundry/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['amenities_id'] = json_encode($request->amenities_id);
        $validatedData['quantity'] = json_encode($request->quantity);
        $validatedData['created_by'] = Auth::id();
        $dataStore = Laundry::create($validatedData);

        if($dataStore){
            return redirect()->route('admin.laundry.index')->with('success', 'Data Store Successful.');
        }else{
            return redirect()->route('admin.laundry.create')->with('error', 'Data Store Failed.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Laundry $laundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $laundry = Laundry::find($id);

        $amenitiesList = Amenities::where('status', 1)->get();
        $vendorList = Vendor::where('status', 1)->get();
        $amenities = json_decode($laundry->amenities_id, true); // ["2","3"]
        $quantities = json_decode($laundry->quantity, true);    // ["2","1"]

        foreach ($amenities as $index => $amenityId) {
            $qty = $quantities[$index];
            echo "Amenity ID: $amenityId | Quantity: $qty <br>";
        }

        return view('admin.laundry.edit',compact(['laundry','amenitiesList','vendorList']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amenities_id' => 'required',
            'room_no' => 'nullable',
            'vendor_id' => 'nullable',
            'description' => 'nullable',
            'assign_date' => 'nullable',
            'quantity' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('laundry/type/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
         // Find the laundry record
        $laundry = Laundry::findOrFail($id);

        // Save updates
        $laundry->room_no      = $request->room_no;
        $laundry->assign_date  = $request->assign_date;
        $laundry->vendor_id    = $request->vendor_id;
        $laundry->amenities_id = json_encode($request->amenities_id);
        $laundry->quantity     = json_encode($request->quantity);
        $laundry->updated_by   = auth()->id();

        $laundry->save();

        if($laundry){
            return redirect()->route('admin.laundry.index')->with('info', 'Data Updated Successful.');
        }else{
            return redirect()->route('admin.laundry.edit')->with('error', 'Data Update Failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Laundry::find($id);
        $data->delete();

        if($data){
            return redirect()->route('admin.laundry.index')->with('success', 'Data Deleted Successful.');
        }else{
            return redirect()->route('admin.laundry.index')->with('error', 'Data Delete Failed.');
        }
    }
}
