<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guru.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_guru' => 'required',
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
    ]);

    $data = [
        'id_guru' => $request->id_guru,
        'nama_guru' => $request->nama_guru,
        'mata_pekajaran' => $request->mata_pelajaran,
    ];
    DB::table('jurnal')->insert($data);

    return redirect()->view('jurnal,index');
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
        $data = DB::table('guru')-where('id_guru',$id)->first();
        return view('guru.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'id_guru' => 'required',
        'nama_guru' => 'required',
        'mata_pelajaran' => 'required',
    ]);

    $data = [
        'id_guru' => $request->id_guru,
        'nama_guru' => $request->nama_guru,
        'mata_pelajaran' => $request->mata_pelajaran,
    ];

    DB::table('guru')->where('id_guru',$id)->update($data);
    return redirect()->view('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    DB::table('guru')->where('id_guru',$id)->update($data);
    return redirect()->view('guru.index');
    }
}
