<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialy;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view ('admin.doctors.index')->with('doctors',Doctor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.add')->with('specialies',Specialy::all());
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
        $image->move('uploads/doctors',$image_new_name);
        $doctors=Doctor::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'image'=>"uploads/doctors".$image_new_name,
            'specialty'=>$request->specialy,
            'room'=>$request->room

        ]);
      //  Session::flash('message', 'This is a message!'); ;
        return redirect()->back()->with('success','doctor aded successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('doctors')->with('doctors',Doctor::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.doctors.edit')->with('doctors',Doctor::all())->with('specialies',Specialy::all());
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

        $doctor=Doctor::find($id);
        if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/doctors/', $image_new_name);
        }
            $doctor->image = 'uploads/doctors/'.$image_new_name;
            $doctor->phone=$request->phone;
            $doctor->name=$doctor->name;
            $doctor->specialy=$request->specialy;
            $doctor->save();



        $doctor->save();
        return redirect()->back()->with('success','doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back()->with('success','doctor deleted successfully!');
    }
}
