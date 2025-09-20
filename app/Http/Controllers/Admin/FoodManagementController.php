<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Food;
use Illuminate\Http\Request;
use Auth;

class FoodManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData =  Food::latest()->get();

        return view('admin.food.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:foods|max:100',
            'type' => 'nullable',
            'category' => 'nullable',
            'price' => 'nullable',
            'priority' => 'nullable',
            'remarks' => 'nullable',
            'image' => 'nullable',
            'status' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('food-management/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
        if ($request->file('image')) {

            $file = $request->file('image'); 
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/food'), $fileName);
            $filePath = 'uploads/food/' .$fileName;
        }else{
            $filePath = null;
        }
        $validatedData['image'] = $filePath;
        $validatedData['created_by'] = Auth::id();
        $dataStore = Food::create($validatedData);

        if($dataStore){
            return redirect()->route('admin.food-management.index')->with('success', 'Data Store Successful.');
        }else{
            return redirect()->route('admin.food-management.create')->with('error', 'Data Store Failed.');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Food::find($id);

        return view('admin.food.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'type' => 'nullable',
            'category' => 'nullable',
            'price' => 'nullable',
            'priority' => 'nullable',
            'remarks' => 'nullable',
            'image' => 'nullable',
            'status' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('food-management/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
        if ($request->file('image')) {

            $file = $request->file('image'); 
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/food'), $fileName);
            $filePath = 'uploads/food/' .$fileName;
        }else{
            $filePath = Food::find($id)->image;
        }

        $validatedData['image'] = $filePath;
        $validatedData['updated_by'] = Auth::id();

        $dataUpdate = Food::where('id', $id)->update($validatedData);

        if($dataUpdate){
            return redirect()->route('admin.food-management.index')->with('info', 'Data Updated Successful.');
        }else{
            return redirect()->route('admin.food-management.edit')->with('error', 'Data Update Failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Food::find($id);
        $data->delete();

        if($data){
            return redirect()->route('admin.food-management.index')->with('danger', 'Data Deleted Successful.');
        }else{
            return redirect()->route('admin.food-management.index')->with('error', 'Data Delete Failed.');
        }
    }
}
