<?php

namespace App\Http\Controllers;

use App\Goodsout;
use App\Device;
use App\Location;
use App\Category;
use Illuminate\Http\Request;
use Response;

class GoodsoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangKeluar = Goodsout::all();
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.barangkeluar.index',
        compact('barangKeluar', 'devices', 'locations', 'categories'));
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
        $barangKeluar = new Goodsout();
        $barangKeluar->name = $request->name;
        $barangKeluar->device_id = $request->device_id;
        $barangKeluar->date = $request->date;
        $barangKeluar->location_id = $request->location_id;
        $barangKeluar->users_id = $request->users_id;
        $barangKeluar->status = $request->status;
        $barangKeluar->category_id = $request->category_id;

        $barangKeluar->save();
          return redirect()->route('barangkeluar.index')->with('success','Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goodsout  $goodsout
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangKeluar = Goodsout::find($id);
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.barangkeluar.edit',
        compact(['barangKeluar', 'devices', 'locations', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goodsout  $goodsout
     * @return \Illuminate\Http\Response
     */
    public function edit(Goodsout $goodsout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goodsout  $goodsout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangKeluar = Goodsout::find($id);
        $barangKeluar->name = $request->name;
        $barangKeluar->device_id = $request->device_id;
        $barangKeluar->date = $request->date;
        $barangKeluar->location_id = $request->location_id;
        $barangKeluar->users_id = $request->users_id;
        $barangKeluar->status = $request->status;
        $barangKeluar->category_id = $request->category_id;
        $barangKeluar->save();
          return redirect()->route('barangkeluar.index')->with('success','Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goodsout  $goodsout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangKeluar = Goodsout::find($id);
        if (!$barangKeluar) return $this->response->errorNotFound('Barang Tidak Ada');
        $barangKeluar->delete();
          return redirect()->route('barangkeluar.index')->with('success','Barang Berhasil Dihapus');
    }
}
