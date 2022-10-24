<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pembangunan;
use App\Models\Kontraktor;

use Illuminate\Http\Request;

class UserPembangunanController extends Controller
{

    public function create()
    {
        $data = [
            'Kontraktor' => Kontraktor::all() 
        ];

        // dd($data);
        return view('user.addPembangunan', $data);
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
            'file' => 'required | max:10240',
        ]);


        $image = $request->file('file');
            $destinationPath = 'admin-assets/assets/img';
            $profileImage = date('YmdHis') . uniqid()."." . $image->getClientOriginalExtension();
            $namePath=$image->move($destinationPath, $profileImage);

        $input = new Pembangunan();
        $input->nama = $request->nama;
        $input->deskripsi = $request->deskripsi;
        $input->budget = $request->budget;
        $input->wa = $request->wa;
        $input->file = $namePath;
        $input->alamat = $request->alamat;
        $input->kontraktor = $request->kontraktor;
        $input->status = 'diterima';

        $input->save();
        Alert::success('Success', 'Sukses menambahkan Pembangunan');
        return redirect()->route('userDashboard.index');
    }
}