<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rapor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rapor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([

            'id_rapor' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required',
    ]);

    $data = [
        'id_rapor' => $request->id_rapor,
        'semester' => $request->semester,
        'tahun_ajaran' => $request->tahun_ajaran,
        'mata_pelajaran' => $request->mata_pelajaran,
        'nilai' => $request->nilai,
    ];
    DB::table('rapor')->insert($data);

    return redirect()->view('rapor,index');
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
        $data = DB::table('rapor')-where('id_rapor',$id)->first();
        return view('rapor.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_rapor' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required',
        ]);

        $data = [
            'id_rapor' => $request->id_rapor,
            'semester' => $request->semester,
            'semester' => $request->tahun_ajaran,
            'mata_pelajaran' => $request->mata_pelajaran,
            'nilai' => $request->nilai,
        ];

        DB::table('rapor')->where('id_rapor',$id)->update($data);
        return redirect()->view('rapor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('rapor')->where('id_rapor',$id)->update($data);
        return redirect()->view('rapor.index');
    }
}
