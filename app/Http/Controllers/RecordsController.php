<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\User;

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
        $records = Record::where('user_id', $userid)->paginate(10);
        return view('records.index', ['records' => $records]);
        //$user = User::find($userid);
        //return view('records.index', ['records' => $user->records]);
        
    }

    public function show($id)
    {
        $userid = auth()->user()->id;
        $record = Record::findOrFail($id);
        if ($userid != $record->user_id){
            abort(403);
        }
        return view('records.show', ['record'=> $record]);
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bgl' => 'required|numeric|min:3',
            'notes' => 'required|max:255'
        ], [
            'bgl.required' => 'numberic input is required',
            'bgl.numeric' => 'numberic input is required',
            'bgl.min' => 'min 3.0',
            'notes.required' => 'input is required',
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
            'bgl' => 'required|numeric|min:3',
            'notes' => 'required|max:255'
        ], [
            'bgl.required' => 'numberic input is required',
            'bgl.numeric' => 'numberic input is required',
            'bgl.min' => 'min 3.0',
            'notes.required' => 'input is required',
        ]);
    
        $record = Record::findOrFail($id);
        $record->bgl = $request->input('bgl');
        $record->notes = $request->input('notes');
        $record->save();        
        return redirect('/records')->with('success', 'Record Updated.');    
    }

    public function edit($id)
    {
        $userid = auth()->user()->id;
        $record = Record::findOrFail($id);       
        if ($userid != $record->user_id){
            abort(403);
        }           
        return view('records.edit')->with('record', $record);     
    }

    public function destroy($id)
    {     
        $userid = auth()->user()->id;
        $record = Record::findOrFail($id);
        if ($userid != $record->user_id){
            abort(403);
        }
        $record->delete();
        return redirect('/records')->with('success', 'Record deleted.');        
    }

}
