<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\select;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategoris'] = Kategori::get();
        $data['menus'] = Menu::join('kategoris', 'menus.kategori_id', '=', 'kategoris.id')
                                ->select('menus.*', 'kategoris.id as idKategori', 'kategoris.name')
                                ->orderBy('created_at', 'DESC')
                                ->get();
        return view('menu.index', ['title' => 'Menu'])->with($data);
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
    public function store(StoreMenuRequest $request)
    {
        $image = $request->file('image');
        $filename = date('Y-m-d'). $image->getClientOriginalName();
        $path = 'image/'. $filename;
        Storage::disk('public')->put($path, file_get_contents($image));

        $data['menu_name'] = $request->menu_name;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        $data['image'] = $filename;
        $data['kategori_id'] = $request->kategori_id;


        Menu::create($data);
        return redirect('menu')->with('success', 'Data Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
