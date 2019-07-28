<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\User;
use App\Penerimaan;
use App\Barang;

class PenerimaanController extends Controller
{
    public function create()
    {
        $supplier = Supplier::orderBy('id', 'ASC')->get();
        $user = User::orderBy('id', 'ASC')->get();
        return view('penerimaan.create', compact('supplier', 'user'));
    }

    public function save(Request $request)
    {
        //Validasi
        $this->validate($request, [
            'tgl_penerimaan' => 'required|date',
            'id_supplier' => 'required|exists:supplier,id',
            'id_user' => 'required|exists:users,id'
        ]);

        try {
            $invoice = Penerimaan::create([
                'tgl_penerimaan' => $request->tgl_penerimaan,
                'id_supplier' => $request->id_supplier,
                'id_user' => $request->id_user,
                'grand_total' => 0
            ]);

            //REDIRECT KE ROUTE invoice.edit DENGAN MENGIRIMKAN PARAMETER ID
            return redirect(route('penerimaan.edit', ['id' => $invoice->id]));
        } catch (\Exception $e) {
            //JIKA GAGAL REDIRECT BACK KE FORM, DAN MENAMPILKAN ERROR MESSAGE
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $invoice = Penerimaan::with(['supplier', 'detail', 'detail.barang'])->find($id);
        $barang = Barang::orderBy('nama_barang', 'ASC')->get();
        return view('penerimaan.edit', compact('invoice', 'barang'));
    }
}
