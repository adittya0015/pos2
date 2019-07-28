<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UomImport;
use App\UOM;
use Excel;

class UomController extends Controller
{
    public function index()
    {
        $uom = UOM::orderBy('id', 'ASC')->paginate(10);
        return view('jenis.uom', compact('uom'));
    }

    public function store(Request $request)
    {
        //Validasi Form
        $this->validate($request, [
            'kd_uom' => 'required|string|max:50',
            'keterangan' => 'string|nullable'
        ]);

        try {
            $uom = UOM::firstOrCreate([
                'kd_uom' => $request->kd_uom
            ], [
                'keterangan' => $request->keterangan
            ]);
            return redirect()->back()->with(['success' => 'Satuan Barang: ' .$uom->kd_uom . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $uom = UOM::findOrFail($id);
        $uom->delete();
        return redirect()->back()->with(['success' => 'Satuan Barang: ' . $uom->kd_uom . ' Telah Dihapus']);
    }

    public function storeData(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new UomImport, $file); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
