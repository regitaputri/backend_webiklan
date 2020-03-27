<?php

namespace App\Http\Controllers;
use App\Iklan;
use Auth;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function index()
    {
        $data = Iklan::all();
        return response($data);
    }
    public function show($id)
    {
        $data = Iklan::where('id', $id)->get();
        return response ($data);
    }

    public function store(Request $request)
    {
        try{
            $data = new Iklan();
            $data->title = $request->input('title');
            $data->description = $request->input('description');
            $data->save();
            return response()->json([
                'status' => '1',
                'message' => 'Tambah data iklan berhasil'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => 'Tambah data iklan gagal'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Iklan::where('id', $id)->first();
            $data->title = $request->input('title');
            $data->description = $request->input('description');
            $data->save();

            return response()->json([
                'status' => '1',
                'message' => 'Ubah data iklan berhasil'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => 'Ubah data iklan gagal'
            ]);
        }
    }

    public function destroy($id)
    {
        try{
            $data = Iklan::where('id', $id)->first();
            $data->delete();

            return response()->json([
                'status' => '1',
                'message' => 'Hapus data iklan berhasil'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => '0',
                'message' => 'Hapus data iklan gagal'
            ]);
        }
    }
}