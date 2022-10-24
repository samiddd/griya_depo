<?php

namespace App\Http\Controllers;
use App\Models\Mitra;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class adminMitraController extends Controller
{
    public function index()
    {
        $data = [
            'Mitra' => Mitra::all()     
        ];
        return view('admin.Mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.Mitra.add');
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
            'username'=> 'unique:mitras',
            'wa' =>'numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('foto');
        // dd($image);
        $destinationPath = 'admin-assets/assets/img';
        $profileImage = date('YmdHis') . uniqid()."." . $image->getClientOriginalExtension();
        $namePath=$image->move($destinationPath, $profileImage);

        $input = new Mitra();
        $input->nama = $request->nama;
        $input->username = $request->username;
        $input->penanggung_jawab = $request->penanggung_jawab;
        $input->wa = $request->wa;
        $input->foto = $request->foto;
        $input->alamat = $request->alamat;
        $input->kategori= $request->kategori;

        $input->save();
        Alert::success('Success', 'Sukses menambahkan Mitra');
        return redirect()->route('adminMitra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
        {   $data = [
            'Mitra' => Mitra::find($id)
        ];
        return view('admin.Mitra.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Mitra::find($id);
        if(isset($request->nama)){
            $input->nama = $request->nama;
        }        
        if(isset($request->username)){
            $input->username =$request->username;
        }        
        if(isset($request->wa)){
            $input->wa=$request->wa;
        }
        if(isset($request->alamat)){
            $input->alamat=$request->alamat;
        }
        if(isset($request->penanggung_jawab)){
            $input->penanggung_jawab=$request->penanggung_jawab;
        }
        if(isset($request->kategori)){
            $input->kategori=$request->kategori;
        }
    
        if ($request->file('foto')) {
            $image = $request->file('foto');
            $destinationPath = 'admin-assets/assets/img';
            $profileImage = date('YmdHis') . uniqid()."." . $image->getClientOriginalExtension();
            $namePath=$image->move($destinationPath, $profileImage);
            $input->foto = $namePath;
        }
        $input->update();
        Alert::success('Success', 'Sukses edit Mitra ');
        return redirect()->route('adminMitra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Mitra::find($id);
        $input->delete();
        Alert::success('Success', 'Sukses hapus Mitra');
        return redirect()->back();
    }
}
