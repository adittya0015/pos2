<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\JenisImport;
use App\Jenis;
use Excel;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::orderBy('id', 'ASC')->paginate(10);
        return view('jenis.index', compact('jenis'));
    }

    public function store(Request $request)
    {
        //Validasi Form
        $this->validate($request, [
            'kode_jenis' => 'required|string|max:50',
            'nama_jenis' => 'required|string|max:50',
            'merk' => 'string|nullable'
        ]);

        try {
            $jenis = Jenis::firstOrCreate([
                'kode_jenis' => $request->kode_jenis
            ], [
                'nama_jenis' => $request->nama_jenis
            ], [
                'merk' => $request->merk
            ]);
            return redirect()->back()->with(['success' => 'Jenis Barang: ' .$jenis->nama_jenis . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();
        return redirect()->back()->with(['success' => 'Jenis Barang: ' . $jenis->nama_jenis . ' Telah Dihapus']);
    }
    
    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        //Validasi Form
        $this->validate($request, [
            'kode_jenis' => 'required|string|max:50',
            'nama_jenis' => 'required|string|max:50',
            'merk' => 'string'
        ]);

        try {
            //select data berdasarkan id
            $jenis = Jenis::findOrFail($id);
            //update data
            $jenis->update([
            'kode_jenis' => $request->kode_jenis,
            'nama_jenis' => $request->nama_jenis,
            'merk' => $request->merk
        ]);
            return redirect(route('jenis-barang.index'))->with(['success' => 'Jenis Barang: ' .$jenis->nama_jenis . ' Dirubah']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeData(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new JenisImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
