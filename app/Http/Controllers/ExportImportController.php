<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Imports\ResidentImport;
use App\Exports\ResidentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    public function index(){
        return view('import',[
            'active' => 'import'
        ]);
    }
    public function exportPDF($id)
    {
        $data = Resident::find($id);

        view()->share('data', $data);
        $pdf = PDF::loadview('export');

        History::create([
            'activity' => 'Mengeksport data PDF',
            'user_id' => Auth::user()->id,
        ]);
        return $pdf->download('Resident_'. $id .'.pdf');
    }
    public function exportCSV($id){
        $resident = Resident::find($id);

        if (!$resident) {
            return redirect()->back()->with('error', 'Resident not found');
        }

        History::create([
            'activity' => 'Mengeksport data CSV',
            'user_id' => Auth::user()->id,
        ]);
        return Excel::download(new ResidentsExport($id), 'resident_' . $id . '.csv');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if ($request->hasFile('file')) {
            Excel::import(new ResidentImport, $request->file('file'));
            History::create([
                'activity' => 'Mengimport data CSV',
                'user_id' => Auth::user()->id,
            ]);
            return redirect('/home')->with('success', 'Data berhasil diimport!');
        } else {
            return redirect('/activity')->back()->with('error', 'Silahkan upload file .csv.');
        }
    }
}
