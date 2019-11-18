<?php

namespace App\Http\Controllers;

use App\Document_types;
use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\PDF;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $documents = Documents::all();
        return view('document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doc_types = Document_types::all();
        return view('document.create', compact('doc_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = "";
        if($request->doctype == "Announcement")
            $type = "An";
        elseif ($request->doctype == "Memorandum")
            $type = "Memo";
        elseif($request->doctype == "Special Order")
            $type = "SO";

        $filename = $type.' '.$request->filename.'.'.$request->file('file')->getClientOriginalExtension();
        $request->file->storeAs('pdf', $filename);
        Documents::create([
            'title'         => $request->filename,
            'file_name'     => $filename,
            'type_id'       => $request->doctype,
            'employee_id'   => $request->employee_id,
            'status'        => 'Approved'
        ]);
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $document)
    {
        //
        $document = Documents::where('id',$document->id)->first();
        return response()->file(storage_path('app\pdf\\' . $document->file_name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $documents)
    {
        //
    }

    public function revise(Request $request){

        $doc_types = Document_types::all();
        return view('document.revise',compact('doc_types'));
    }

    public function download(Documents $document){
        $document = Documents::where('id',$document->id)->first();

        return $document->download($document->title.'.pdf');
    }
}
