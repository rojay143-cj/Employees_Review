<?php

namespace App\Http\Controllers;

use App\Models\employee_documents;
use Illuminate\Http\Request;

class EmployeeDocumentController extends Controller
{
    public function download($id)
    {
        $document = employee_documents::find($id);

        if (!$document || !file_exists(public_path($document->file_path))) {
            return redirect()->back()->with('error', 'Document not found.');
        }

        return response()->download(public_path($document->file_path), $document->document_name);
    }
}