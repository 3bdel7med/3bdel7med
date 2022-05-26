<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialy;
use Illuminate\Http\Request;

class SpecialyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.specialies.index')->with('specialies',Specialy::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.specialies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/specialy',$image_new_name);
        $specialy=Specialy::create([
            "specialy"=>$request->specialy,
        "image"=>"uploads/specialy".$image_new_name
        ]);
        $specialy->save();
        return redirect()->back()->with('success','specialy aded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $specialy=Specialy::find($id);
     return view('admin.specialies.edit')->with('specialy',Specialy::all());
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
        $specialy=Specialy::find($id);
        if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/specialy/',$image_new_name);
            $specialy->image = 'uploads/specialy/'.$image_new_name;
        }
        $specialy->specialy=$request->specialy;
        $specialy->save();
        return redirect()->back()->with('success','specialy updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialy=Specialy::find($id);
        $specialy->delete();
        return redirect()->back()->with('success','specialy deleted successfully!');
    }
}
