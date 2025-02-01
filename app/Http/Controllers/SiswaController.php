<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_siswa' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'nis' => 'required',
            'siswa_tidak_hadir' => 'required',
    ]);

    $data = [
        'id_siswa' => $request->id_siswa,
        'nama_siswa' => $request->nama_siswa,
        'kelas' => $request->kelas,
        'nis' => $request->nis,
        'siswa_tidak_hadir' => $request->siswa_tidak_hadir,
    ];

    DB::table('siswa')->insert($data);

    return redirect()->view('siswa,index');
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
        $data = DB::table('siswa')-where('id_siswa',$id)->first();
        return view('siswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_siswa' => 'required',
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'nis' => 'required',
            'siswa_tidak_hadir' => 'required',
        ]);

        $data = [
            'id_siswa' => $request->id_siswa,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'siswa_tidak_hadir' => $request->siswa_tidak_hadir,
        ];

        DB::table('siswa')->where('id_siswa',$id)->update($data);
        return redirect()->view('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('siswa')->where('id_siswa',$id)->update($data);
        return redirect()->view('siswa.index');
    }
}
