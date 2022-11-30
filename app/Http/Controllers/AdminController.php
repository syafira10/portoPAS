<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Room = Room::all();
        return $Room;
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
        $table= Room::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "harga"=>$request->harga,
            "status"=>$request->status,
            "pemesan"=>$request->pemesan,
            "No_hp"=>$request->No_hp,
            "email"=>$request->email,
            "tgl_chek_in"=>$request->tgl_chek_in,
            "tgl_check_out"=>$request->tgl_check_out,
        ]);

        return response()->json([
            'succes' => 201,
            'message' => 'Berhasil',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Room=Room::find($id);
        if($Room){
            return response()->json([
                'status' => 200,
                'data' => $Room
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas' .$id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $Room = Room::find($id);
        if($Room){
            $Room->name = $request->name ? $request->name : $Room->name;
            $Room->description = $request->description ? $request->description : $Room->description;
            $Room->harga = $request->harga ? $request->harga : $Room->harga;
            $Room->status = $request->status ? $request->status : $Room->status;
            $Room->pemesan = $request->pemesan ? $request->pemesan : $Room->pemesan;
            $Room->No_hp = $request->No_hp ? $request->No_hp : $Room->No_hp;
            $Room->email = $request->email ? $request->email : $Room->email;
            $Room->tgl_chek_in = $request->tgl_chek_in ? $request->tgl_chek_in : $Room->tgl_chek_in;
            $Room->tgl_check_out = $request->tgl_check_out ? $request->tgl_check_out : $Room->tgl_check_out;
            $Room->save();
            return response()->json([
                'status' => 200,
                'data' => $Room
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id. 'Tidak diketahui'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Room = Room::where('id', $id)->first();
        if($Room){
            $Room->delete();
            return response()->json([
                'status' => 200,
                'message' => $id. 'Berhasil dihapus'
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'gagal hapus'
            ],404);
        }
    }
}
