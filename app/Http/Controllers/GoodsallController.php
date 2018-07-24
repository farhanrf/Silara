<?php

namespace App\Http\Controllers;

use App\Goodsall;
use App\Device;
use App\Location;
use App\Category;
use Illuminate\Http\Request;


class GoodsallController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBarang = Goodsall::all();
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.databarang.index',
        compact('dataBarang', 'devices', 'locations', 'categories'));
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
        $dataBarang = new Goodsall();
        $dataBarang->name = $request->name;
        $dataBarang->device_id = $request->device_id;
        $dataBarang->date = $request->date;
        $dataBarang->location_id = $request->location_id;
        $dataBarang->users_id = $request->users_id;
        $dataBarang->category_id = $request->category_id;
        $dataBarang->save();
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
        $dataBarang = Goodsall::find($id);
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.databarang.edit',
        compact(['dataBarang', 'devices', 'locations', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function edit(Goodsall $goodsall)
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
        $dataBarang = Goodsall::find($id);
        $dataBarang->name = $request->name;
        $dataBarang->device_id = $request->device_id;
        $dataBarang->date = $request->date;
        $dataBarang->location_id = $request->location_id;
        $dataBarang->users_id = $request->users_id;
        $dataBarang->category_id = $request->category_id;
        $dataBarang->save();
		  return redirect()->route('databarang.index')->with('success','Berhasil diperbaharui');
    }

    public function search(Request $request)
    {
        $dataBarang = $request->get('search');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goodsin  $goodsin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBarang = Goodsall::find($id);
        if (!$dataBarang) return $this->response->errorNotFound('Barang tidak ada');
        $dataBarang->delete();
		  return redirect()->route('databarang.index')->with('success','Barang berhasil dihapus');
    }
}

