<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jurnal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_jurnal' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'jam_ke' => 'required',
    ]);

    $data = [
        'id_jurnal' => $request->id_jurnal,
        'tanggal' => $request->tanggal,
        'kegiatan' => $request->kegiatan,
        'jam_ke' => $request->jam_ke,
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
        $data = DB::table('jurnal')-where('id_jurnal',$id)->first();
        return view('jurnal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_jurnal' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
            'jam_ke' => 'required',
        ]);

        $data = [
            'id_jurnal' => $request->id_jurnal,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'jam_ke' => $request->jam_ke,
        ];

        DB::table('jurnal')->where('id_jurnal',$id)->update($data);
        return redirect()->view('jurnal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jurnal')->where('id_jurnal',$id)->update($data);
        return redirect()->view('jurnal.index');
    }
}
