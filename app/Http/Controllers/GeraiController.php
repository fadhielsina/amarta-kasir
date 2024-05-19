<?php

namespace App\Http\Controllers;

use App\Models\Gerai;
use Illuminate\Http\Request;

class GeraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gerai.index');
    }

    public function data()
    {
        $gerai = Gerai::orderBy('id_gerai', 'desc')->get();

        return datatables()
            ->of($gerai)
            ->addIndexColumn()
            ->addColumn('aksi', function ($gerai) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`' . route('gerai.update', $gerai->id_gerai) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`' . route('gerai.destroy', $gerai->id_gerai) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
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
        $gerai = new Gerai();
        $gerai->nama_gerai = $request->nama_gerai;
        $gerai->alamat = $request->alamat;
        $gerai->no_tlp = $request->no_tlp;
        $gerai->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gerai = Gerai::find($id);

        return response()->json($gerai);
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
        $gerai = Gerai::find($id);
        $gerai->nama_gerai = $request->nama_gerai;
        $gerai->alamat = $request->alamat;
        $gerai->no_tlp = $request->no_tlp;
        $gerai->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gerai = Gerai::find($id);
        $gerai->delete();

        return response(null, 204);
    }
}
