<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBarangRequest;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Barang;
use App\Kategori;
use App\Jenis;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Gate::allows('barang_access'), 403);

        $barangs = Barang::all();
        $jenis = Jenis::all();
        $kategoris = Kategori::all();

        return view('admin.barang.index', compact('barangs','jenis','kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('barang_create'), 403);
        $jenis = Jenis::all();
        $kategoris = Kategori::all();
        $barangs = Barang::all();
return view('admin.barang.create', compact('jenis','kategoris','barangs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {
        abort_unless(\Gate::allows('barang_create'), 403);

            if ($request->hasFile('foto')) {
                        $name= $request->file('foto')->store('public/barang/');
                        $barang = Barang::create([
                        'nama' => $request->nama,
                        'kategori' => $request->kategori,
                        'jenis' => $request->jenis,
                        'deskripsi' => $request->deskripsi,
                        'stok' => $request->stok,
                        'foto' => $name,
                        
                        ]);
                    }                  
         return redirect()->route('admin.barang.index')->with('pesan', 'Data Saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_unless(\Gate::allows('barang_show'), 403);

        return view('admin.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Gate::allows('barang_edit'), 403);
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $jenis = Jenis::all();

        return view('admin.barang.edit', compact('barang','kategoris'.'jenis'))->with('pesan', 'Data Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, $id)
    {
        abort_unless(\Gate::allows('barang_edit'), 403);       
        $file = $request->file('foto');
        if ($request->hasfile('foto')){
            $form_data  = array(
                'kode' => $request->kode,
                'nama' => $request->nama,
                'kategori' => $request->kategori,            
                'jenis' => $request->jenis,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
                'foto' => $file->store('public/barang'),
            );
            Barang::whereId($id)->update($form_data);
            
                

        return redirect()->route('admin.barang.index')->with('pesan', 'Data Updated successfully');
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        abort_unless(\Gate::allows('barang_delete'), 403);

        $barang->delete();

        return back()->with('pesan', 'Data Deleted successfully');
    }

    public function massDestroy(MassDestroyBarangRequest $request)
    {
        Barang::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
