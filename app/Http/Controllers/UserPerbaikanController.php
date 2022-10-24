<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Perbaikan;

use Illuminate\Http\Request;

class UserPerbaikanController extends Controller
{

    public function create()
    {

        return view('user.addPerbaikan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'wa' =>'numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $image = $request->file('foto');
            $destinationPath = 'admin-assets/assets/img';
            $profileImage = date('YmdHis') . uniqid()."." . $image->getClientOriginalExtension();
            $namePath=$image->move($destinationPath, $profileImage);

        $input = new Perbaikan();
        $input->nama = $request->nama;
        $input->keluhan = $request->keluhan;
        $input->wa = $request->wa;
        $input->foto = $namePath;
        $input->alamat = $request->alamat;
        $input->kategori= $request->kategori;
        $input->status= 'diterima';

        $input->save();
        Alert::success('Success', 'Sukses menambahkan Perbaikan');
        return redirect()->route('userDashboard.index');
    }
}