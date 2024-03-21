<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Menu;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['menus'] = Menu::get();
        $data['menus'] = Menu::pluck('menu_name', 'id');
        // $data['stocks'] = Stock::with('menu ')->get();
        $data['stocks'] = Stock::join('menus', 'stocks.menu_id', '=', 'menus.id')
                                ->select('stocks.*', 'menus.id as idMenu', 'menus.menu_name')
                                ->orderBy('created_at', 'DESC')
                                ->get();
        return view('stock.index', ['title' => 'Stok'])->with($data);
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
    public function store(StoreStockRequest $request)
    {
        $data = Stock::create($request->all());
        dd($data);
        return redirect('stok')->with('success', 'Data Stok Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
