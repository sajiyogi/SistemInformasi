<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBukuRequest;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use DB;

use App\Buku;
use App\Kategori;



class BukuController extends Controller
{
    
    public function index()
    {
        abort_unless(\Gate::allows('buku_access'), 403);

        $bukus = Buku::all();
        $kategori = Kategori::all();

        return view('admin.buku.index', compact('bukus','kategori'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('buku_create'), 403); 

        $kategoris = Kategori::all();
        // dd($kategori);

        return view('admin.buku.create', compact('kategoris'));
    }


public function store(StoreBukuRequest $request)
    {
        abort_unless(\Gate::allows('buku_create'), 403);
     

        if ($request->hasFile('foto')) {
            $name= $request->file('foto')->store('public/images');
            $buku = Buku::create([
            'judul' => $request->judul,
            'foto' => $name,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'jumlah' => $request->jumlah,
            'kategori_id' => $request->kategori_id
            ]);

        }

        return redirect()->route('admin.buku.index');
    }
    /*
    private function uploadcover(StoreBukuRequest $request){
        $name = $request->file('image')->store('images')
        $size = $request->file('image')->getClientSize();
        $ext = $request->file('image')->getClientOriginalExtension();
        if ($request->file('image')->isValid()) {

        $imagename =md5(date('YmdHis')).".$ext";
        $uploadpath = 'asset/uploadcover/';
        $request->file('image')->store(public_path().$uploadpath, $imagename);

        return $imagename;
        }
        return false;

    }*/ 
   
    public function edit( $id)
    {
        abort_unless(\Gate::allows('buku_edit'), 403);
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();


        return view('admin.buku.edit', compact('buku','kategoris'));
    }

    public function update(Request $request,$id)
    {
       $Buku = Buku::findOrFail($id);
       $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $buku = Buku::findOrFail($id);
        $request->validate([
                'judul' => 'required',
                'penerbit' => 'required',
                'pengarang' => 'required',
                'jumlah' => 'required',
                'kategori_id' => 'sometimes'
                ]);
        
        $file = $request->file('image');
        if ($request->hasfile('image')){
            $form_data  = array(
                'judul' => $request->judul,
                'image' => $file->store('public/images'),
                'pengarang' => $request->pengarang ,
                'penerbit' => $request->penerbit,            
                'jumlah' => $request->jumlah,
                'kategori_id' => $request->kategori_id
            );
            Buku::whereId($id)->update($form_data);
            } else {
                 $form_data  = array(
                'judul' => $request->judul,
                'pengarang' => $request->pengarang ,
                'penerbit' => $request->penerbit,            
                'jumlah' => $request->jumlah,
                'kategori_id' => $request->kategori_id
                 );
            Buku::whereId($id)->update($form_data);
           
             }
                      

          
        return redirect()->route('admin.buku.index')->with('pesan', 'Buku telah berhasil diperbarui');
    }

    public function show(buku $buku)
    {
        abort_unless(\Gate::allows('buku_show'), 403);

        return view('admin.buku.show', compact('buku'));
    }

    public function destroy(Buku $buku)
    {
        abort_unless(\Gate::allows('buku_delete'), 403);

        $buku->delete();

        return back();
    }

    public function massDestroy(MassDestroybukuRequest $request)
    {
        Buku::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

}
