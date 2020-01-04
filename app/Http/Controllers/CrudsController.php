<?php

namespace App\Http\Controllers;

use App\Crud;
use Illuminate\Http\Request;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Crud::paginate(5);
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'firstname'=>'required',
            'lastname'=>'required',

            'image'=>'required|image|max:2048',
        ];
        $message=[
            'firstname.required'=>'firstname is required',
            'lastname.required'=>'lastname is required',

            'image.required'=>'img is required',

        ];
        $this->validate($request,$rules,$message);
        $image=$request->file('image');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads'),$new_name);
        $formdata=array(
            'firstname'=>$request->input('firstname'),
        'lastname'=>$request->input('lastname'),
            'image'=>$new_name

        );
        Crud::create($formdata);
        return redirect('crud')->with('success','created successsfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Crud::findorfail($id);
       return view('view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Crud::findorfail($id);
        return view('edit',compact('data'));
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
        $image_name=$request->input('hidden_image');
        $image=$request->file('image');
        if($image !=''){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'image'=>'image|max:2048'
        ]);
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads'),$new_name);
        }
        else{
            $request->validate([
                'firstname'=>'required',
                'lastname'=>'required']);

        }
        $form_data=array(

                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
               'image'=>$new_name,
        );
        Crud::whereId($id)->update($form_data);
        return redirect('crud')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Crud::findorfail($id);
        $data->delete();
        return redirect('crud')->with('success','deleted successfully');
    }
}
