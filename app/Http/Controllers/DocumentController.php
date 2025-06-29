<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Patient;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = null;

        if (auth()->user()->patient)
        {
            $documents = Document::with('patient')->where('patient_id', auth()->user()->patient->id)->get();
        } else
        {
            $documents = Document::with('patient')->get();
        }

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('documents.create', compact('patients'));
    }

    public function store(DocumentRequest $request)
    {
        $validated = $request->validated();

        Document::create($validated);
        return redirect()->route('documents.index');
    }

    public function edit(Document $document)
    {
        $patients = Patient::all();
        return view('documents.edit', compact('document', 'patients'));
    }

    public function update(DocumentRequest $request, Document $document)
    {
        $validated = $request->validated();

        $document->update($validated);
        return redirect()->route('documents.index');
    }

    public function delete(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index');
    }
}
