<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$records = Record::paginate(5);
        $userid = auth()->user()->id;
        $records = Record::where('user_id', $userid)->get();
        return view('records.index', ['records' => $records]);
    }

    public function show($id)
    {
        //$record = Record::where('id', $id)->get();
       //$record = ['test'=>"testing"];
        $record = Record::find($id);
        //dd($record);
        //return view('records.show')->with('record', $record);
        return view('records.show', ['record'=> $record]);
    }

    public function create()
    {
        return view('records.create');
        //return '123';
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bgl' => 'required',
            'notes' => 'required'
        ], [
            'title.required' => 'title is required',
            'body.required' => 'body is required'
        ]);

        Record::create([
            'bgl'=>$request->bgl,
            'user_id'=>auth()->user()->id,
            'notes'=>$request->notes,
        ]);
        
        return redirect('/records')->with('success', 'Record added.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bgl' => 'required',
            'notes' => 'required'
        ], [
            'title.required' => 'title is required',
            'body.required' => 'body is required'
        ]);

        $record = Record::find($id);
        $record->bgl = $request->input('bgl');
        $record->notes = $request->input('notes');
        $record->save();

        return redirect('/records')->with('success', 'Record Updated.');        
    }

    public function edit($id)
    {
        $record = Record::find($id);
        return view('records.edit')->with('record', $record);        
    }

    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();
        return redirect('/records')->with('success', 'Record deleted.');        

    }

}
