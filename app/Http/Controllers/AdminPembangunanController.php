<?php

namespace App\Http\Controllers;
use App\Models\Pembangunan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class adminPembangunanController extends Controller
{
    public function index()
    {
        $data = [
            'Pembangunan' => Pembangunan::all()     
        ];
        return view('admin.Pembangunan.index', $data);
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
        $input = Pembangunan::find($id);

        if(isset($request->status)){
            $input->status = $request->status;
        }     
        $input->update();
        Alert::success('Success', 'Sukses edit Pembangunan ');
        return redirect()->route('adminPembangunan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Pembangunan::find($id);
        $input->delete();
        Alert::success('Success', 'Sukses hapus Pembangunan');
        return redirect()->back();
    }
}
