<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKategoriRequest;
use App\Http\Requests\StoreKategoriRequest;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateKategoriRequest;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Gate::allows('kategori_access'), 403);

        $kategoris = Kategori::all();

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('kategori_create'), 403);
        
        return view('admin.kategori.create')->with('pesan', 'Data Added successfully');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriRequest $request)
    {
        abort_unless(\Gate::allows('kategori_create'), 403);

        $kategoris = Kategori::create($request->all());

        return redirect()->route('admin.kategori.index')->with('pesan', 'Data Saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_unless(\Gate::allows('kategori_show'), 403);

        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Gate::allows('kategori_edit'), 403);
        $kategori=Kategori::findOrFail($id);

        return view('admin.kategori.edit', compact('kategori'))->with('pesan', 'Data Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriRequest $request, $id)
    {
        abort_unless(\Gate::allows('kategori_edit'), 403);
        $kategoris =Kategori::findOrFail($id);
        
        $kategoris->update($request->all());

        return redirect()->route('admin.kategori.index')->with('pesan', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        abort_unless(\Gate::allows('kategori_delete'), 403);

        $kategori->delete();

        return back()->with('pesan', 'Data Deleted successfully');
    }

    public function massDestroy(MassDestroyKategoriRequest $request)
    {
        Kategori::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
    public function KategoriNotif(){
        echo "ini adalah notif";
    }
}
