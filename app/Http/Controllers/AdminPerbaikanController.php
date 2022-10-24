<?php

namespace App\Http\Controllers;
use App\Models\Perbaikan;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class adminPerbaikanController extends Controller
{
    public function index()
    {
        $data = [
            'Perbaikan' => Perbaikan::all()     
        ];
        return view('admin.Perbaikan.index', $data);
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
        $input = Perbaikan::find($id);

        if(isset($request->status)){
            $input->status = $request->status;
        }     
        $input->update();
        Alert::success('Success', 'Sukses edit Perbaikan ');
        return redirect()->route('adminPerbaikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = Perbaikan::find($id);
        $input->delete();
        Alert::success('Success', 'Sukses hapus Perbaikan');
        return redirect()->back();
    }
}
