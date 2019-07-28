<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Excel;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'ASC')->paginate(10);
        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        //Validasi Form
        $this->validate($request, [
            'kode_supplier' => 'required|string|max:50|unique:supplier',
            'nama_supplier' => 'required|string|max:50',
            'alamat' => 'string',
            'kota' => 'string',
            'telp' => 'string',
            'npwp' => 'string',
        ]);

        try {
            $supplier = Supplier::firstOrCreate([
            'kode_supplier' => $request->kode_supplier,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'npwp' => $request->npwp,
            ]);
            return redirect(route('supplier.index'))
            ->with(['success' => 'Supplier: ' .$supplier->nama_supplier . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //query select berdasarkan id
        $supplier = Supplier::findOrFail($id);
        //hapus data dari table
        $supplier->delete();
        return redirect()->back()->with(['success' => '<strong>' . $supplier->nama_supplier . '</strong> Telah Dihapus!']);
    }

    
}
