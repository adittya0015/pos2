<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Jenis;
use App\UOM;
use App\Imports\BarangImport;
use Excel;
use App\Exports\BarangExport;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('jenis', 'uom')->orderBy('created_at', 'ASC')->paginate(100);
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        $jenis = Jenis::orderBy('kode_jenis', 'ASC')->get();
        $uom = UOM::orderBy('kd_uom', 'ASC')->get();
        return view('barang.create', compact('jenis', 'uom'));
    }

    public function store(Request $request)
    {
        //Validasi Data
        $this->validate($request, [
            'kode_barang' => 'required|string|max:20|unique:barang',
            'nama_barang' => 'required|string|max:100',
            'pkp' => 'required|string|max:100',
            'stok_min' => 'required|integer',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'jumlah_stok' => 'required|integer',
            'id_jenis' => 'required|exists:jenis,id',
            'id_uom' => 'required|exists:uom,id',
            'keterangan' => 'nullable|string|max:100',
            
        ]);
        try {

        //Simpan Data
            $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'pkp' => $request->pkp,
            'stok_min' => $request->stok_min,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'jumlah_stok' => $request->jumlah_stok,
            'id_jenis' => $request->id_jenis,
            'id_uom' => $request->id_uom,
            'keterangan' => $request->keterangan
        ]);

            //Jika Berhasil
            return redirect(route('barang.index'))
            ->with(['success' => '<strong>' . $barang->nama_barang . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()
            ->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //query select berdasarkan id
        $barang = Barang::findOrFail($id);
        //hapus data dari table
        $barang->delete();
        return redirect()->back()->with(['success' => '<strong>' . $barang->nama_barang . '</strong> Telah Dihapus!']);
    }

    public function edit($id)
    {
        //query select berdasarkan id
        $barang = Barang::findOrFail($id);
        $jenis = Jenis::orderBy('kode_jenis', 'ASC')->get();
        $uom = UOM::orderBy('kd_uom', 'ASC')->get();
        return view('barang.edit', compact('barang', 'jenis', 'uom'));
    }

    public function update(Request $request, $id)
    {
        //Validasi Data
        $this->validate($request, [
            'kode_barang' => 'required|string|max:20|unique:barang',
            'nama_barang' => 'required|string|max:100',
            'pkp' => 'required|string|max:100',
            'stok_min' => 'required|integer',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'jumlah_stok' => 'required|integer',
            'id_jenis' => 'required|exists:jenis,id',
            'id_uom' => 'required|exists:uom,id',
            'keterangan' => 'nullable|string|max:100',
            
        ]);
        try {
            $barang = Barang::findOrFail($id);

            //Simpan Data
            $barang = Barang::update([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'pkp' => $request->pkp,
                'stok_min' => $request->stok_min,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'jumlah_stok' => $request->jumlah_stok,
                'id_jenis' => $request->id_jenis,
                'id_uom' => $request->id_uom,
                'keterangan' => $request->keterangan
            ]);

             //Jika Berhasil
             return redirect(route('barang.index'))
             ->with(['success' => '<strong>' . $barang->nama_barang . '</strong> Dirubah']);
         } catch (\Exception $e) {
             return redirect()->back()
             ->with(['error' => $e->getMessage()]);
         }
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function import_excel(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);



        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new BarangImport, $file); //IMPORT FILE
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }

    public function export_excel()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
}
