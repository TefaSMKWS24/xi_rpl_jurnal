<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nilai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_nilai' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required',
    ]);

    $data = [
        'id_nilai' => $request->id_nilai,
        'mata_pelajaran' => $request->mata_pelajaran,
        'nilai' => $request->nilai,
    ];
    DB::table('nilai')->insert($data);

    return redirect()->view('nilai,index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('nilai')-where('id_nilai',$id)->first();
        return view('nilai.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_nilai' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $data = [
            'id_nilai' => $request->id_jurnal,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
        ];

        DB::table('nilai')->where('id_nilai',$id)->update($data);
        return redirect()->view('nilai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('nilai')->where('id_nilai',$id)->update($data);
        return redirect()->view('nilai.index');
    }
}
