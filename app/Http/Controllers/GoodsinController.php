<?php

namespace App\Http\Controllers;

use App\Goodsin;
use App\Goodsall;
use App\Device;
use App\Location;
use App\Category;
use Illuminate\Http\Request;
use Response;

class GoodsinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = Goodsin::all();
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.barangmasuk.index',
        compact('barangMasuk', 'devices', 'locations', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barangMasuk = new Goodsin();
        $barangMasuk->name = $request->name;
        $barangMasuk->device_id = $request->device_id;
        $barangMasuk->date = $request->date;
        $barangMasuk->location_id = $request->location_id;
        $barangMasuk->users_id = $request->users_id;
        $barangMasuk->category_id = $request->category_id;
        $dataBarang = new Goodsall();
        $dataBarang->name = $request->name;
        $dataBarang->device_id = $request->device_id;
        $dataBarang->date = $request->date;
        $dataBarang->location_id = $request->location_id;
        $dataBarang->users_id = $request->users_id;
        $dataBarang->category_id = $request->category_id;
        $dataBarang->save();
        $barangMasuk->save();
          return redirect()->route('barangmasuk.index')->with('success','Barang berhasil ditambahkan');
          return redirect()->route('databarang.index')->with('success','Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangMasuk = Goodsin::find($id);
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.barangmasuk.edit',
        compact(['barangMasuk', 'devices', 'locations', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function edit(Goodsin $goodsin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangMasuk = Goodsin::find($id);
        $barangMasuk->name = $request->name;
        $barangMasuk->device_id = $request->device_id;
        $barangMasuk->date = $request->date;
        $barangMasuk->location_id = $request->location_id;
        $barangMasuk->users_id = $request->users_id;
        $barangMasuk->category_id = $request->category_id;
        $barangMasuk->save();
		  return redirect()->route('barangmasuk.index')->with('success','Berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangMasuk = Goodsin::find($id);
        if (!$barangMasuk) return $this->response->errorNotFound('Barang tidak ada');
        $barangMasuk->delete();
		  return redirect()->route('barangmasuk.index')->with('success','Barang berhasil dihapus');
    }
}
