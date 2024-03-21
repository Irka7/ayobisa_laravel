<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = Jenis::orderBy('created_at', 'DESC')->get();
        return view('jenis.index', ['title' => 'Jenis',])->with($data);
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
    public function store(StoreJenisRequest $request)
    {
        $data = Jenis::create($request->all());
        return redirect('jenis')->with('success', 'Data Jenis Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jeni)
    {
        $data = $jeni->update($request->all());
        return redirect('jenis')->with('success', 'Data Jenis berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        $data = $jeni->delete();
        return redirect('jenis')->with('success', 'Data Jenis berhasil dihapus!');
    }
}
