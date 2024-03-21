<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Barryvdh\DomPDF\PDF;
use App\Exports\KategoriExport;
use App\Imports\KategoriImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\PDF as DomPDFPDF;;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategoris'] = Kategori::orderBy('created_at', 'DESC')->get();
        return view('kategori.index', [ 'title' => 'Kategori' ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        $data = Kategori::create($request->all());
        return redirect('kategori')->with('success', 'Data Kategori Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $data = $kategori->update($request->all());
        return redirect('kategori')->with('success', 'Data Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $data = $kategori->delete();
        return redirect('kategori')->with('success', 'Data Kategori berhasil dihapus!');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KategoriExport, $date.'_Kategori.xlsx');
    }

    public function importData()
    {
        Excel::import(new KategoriImport, request()->file('import'));

        return redirect()->back()->with('success', 'Import Data Berhasil!');
    }

    public function exportPDF()
    {
        $data = Kategori::all();

        $pdf = PDF::loadView('kategori_pdf', ['data' => $data]);

        return $pdf->stream();
    }
}
