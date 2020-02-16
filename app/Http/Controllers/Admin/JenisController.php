<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJenisRequest;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Jenis;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Gate::allows('jenis_access'), 403);

        $jenis = Jenis::all();

        return view('admin.jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('jenis_create'), 403);

        $jenis = Jenis::all();
        
        return view('admin.jenis.create',compact('jenis'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisRequest $request)
    {
        abort_unless(\Gate::allows('jenis_create'), 403);

        $jenis = Jenis::create($request->all());

        return redirect()->route('admin.jenis.index')->with('pesan', 'Data Saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_unless(\Gate::allows('jenis_show'), 403);

        return view('admin.jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(\Gate::allows('jenis_edit'), 403);
        $jenis=Jenis::findOrFail($id);


        return view('admin.jenis.edit', compact('jenis'))->with('pesan', 'Data Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisRequest $request, $id)
    {
        abort_unless(\Gate::allows('jenis_edit'), 403);
        $jenis =Jenis::findOrFail($id);

        $jenis->update($request->all());

        return redirect()->route('admin.jenis.index')->with('pesan', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jenis)
    {
        abort_unless(\Gate::allows('jenis_delete'), 403);

        $jenis->delete();

        return back()->with('pesan', 'Data Deleted successfully');
    }

    public function massDestroy(MassDestroyjenisRequest $request)
    {
        Jenis::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
