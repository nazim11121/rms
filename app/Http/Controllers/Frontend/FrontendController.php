<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\PackageCategory;
use App\Models\Admin\RoomType;
use App\Models\Admin\Package;
use App\Models\Frontend\AboutUs;
use App\Models\Admin\Room;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('hierarchy', 'ASC')->get();
        $aboutUs =  AboutUs::where('status', 1)->latest()->get()->first();
        $rooms = Room::with(['roomType'])->where('status', 1)->latest()->get();
        $packageCategory = PackageCategory::where('status', 1)->get();
        $packages = Package::with(['packageCategory'])->where('status', 1)->latest()->take(6)->get();

        return view('frontend.index_one',compact(['sliders','aboutUs', 'rooms', 'packageCategory', 'packages']));
    }

    public function packageList(Request $request)
    {
        $query = Package::with('packageCategory'); // eager load to avoid N+1

        // Filter by category_id
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // Price filter
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $query->when($request->price_min, fn($q) => $q->where('price','>=',$request->price_min))
                  ->when($request->price_max, fn($q) => $q->where('price','<=',$request->price_max));
        }

        // Persons filter
        if ($request->filled('persons')) {
            $query->where('no_of_person','>=',$request->persons);
        }

        // Days filter
        if ($request->filled('days')) {
            $query->where('no_of_day','>=',$request->days);
        }

        $packages   = $query->latest()->paginate(6)->withQueryString();
        $categories = PackageCategory::orderBy('name')->get();

        return view('frontend.package', compact('packages','categories'));
    }

    public function roomList(Request $request)
    {
        $roomTypes = RoomType::all();

        $query = Room::with('roomType');

        if ($request->has('type') && $request->type !== 'all') {
            $query->whereHas('roomType', function ($q) use ($request) {
                $q->where('slug', $request->type); // use slug or id as you prefer
            });
        }

        $rooms = $query->paginate(6); // Adjust per page

        return view('frontend.room', compact('roomTypes', 'rooms'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $aboutUs =  AboutUs::where('status', 1)->latest()->get()->first();
        return view('frontend.about', compact('aboutUs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'tag1' => 'nullable',
            'tag2' => 'nullable',
            'tag3' => 'nullable',
            'image' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('frontend/aboutUs/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->file('image')) {

            $file = $request->file('image'); 
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/aboutUs'), $fileName);
            $filePath = 'uploads/aboutUs/' .$fileName;
        }else{
            $filePath = NULL;
        }

        $validatedData = $validator->validated();
        $validatedData['image'] = $filePath;
        $validatedData['created_by'] = Auth::id();
        $dataStore = AboutUs::create($validatedData);

        if($dataStore){
            return redirect()->route('aboutUs.index')->with('success', 'Data Store Successful.');
        }else{
            return redirect()->route('aboutUs.create')->with('error', 'Data Store Failed.');
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
        $data = AboutUs::find($id);

        return view('admin.aboutUs.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'tag1' => 'nullable',
            'tag2' => 'nullable',
            'tag3' => 'nullable',
            'image' => 'nullable',
        ]);
 
        if ($validator->fails()) {
            return redirect('frontend/aboutUs/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        if ($request->file('image')) {

            $file = $request->file('image'); 
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/aboutUs'), $fileName);
            $filePath = 'uploads/aboutUs/' .$fileName;
        }else{
            $filePath = AboutUs::find($id)->image;
        }

        $validatedData = $validator->validated();
        $validatedData['image'] = $filePath;
        $validatedData['updated_by'] = Auth::id();
        $dataUpdate = aboutUs::where('id', $id)->update($validatedData);

        if($dataUpdate){
            return redirect()->route('aboutUs.index')->with('info', 'Data Updated Successful.');
        }else{
            return redirect()->route('aboutUs.edit')->with('error', 'Data Update Failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = AboutUs::find($id);
        $data->delete();

        if($data){
            return redirect()->route('aboutUs.index')->with('danger', 'Data Deleted Successful.');
        }else{
            return redirect()->route('aboutUs.index')->with('error', 'Data Delete Failed.');
        }
    }
}
