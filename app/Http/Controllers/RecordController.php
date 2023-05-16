<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::orderBy('start_date','desc')->get();
        $category_array = ["中級山", "高山", "溯溪"];
        return view('record.record', compact('records', 'category_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->image;
        $folder_name = "uploads/images/";
        $upload_path = public_path() . '/' . $folder_name;
        $extension  =  $file->extension();
        $filename = $request->input('name') . '.' . $extension;
        $file->move($upload_path, $filename);

        $record = New Record();
        $record->name = $request->input('name');
        $record->description = $request->input('description');
        $record->category = $request->input('category');
        $record->start_date = $request->input('start_date');
        $record->end_date = $request->input('end_date');
        $record->image = $folder_name . '/' . $filename;
        $record->content = $request->input('content');
        $record->save();

        return redirect()->route('record.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);
        $category_array = ["中級山", "高山", "溯溪"];
        return view('record.show', ['record' => Record::findOrFail($id), 'category_array' => $category_array]);
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
        //
    }
}
