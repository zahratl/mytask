<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Strorage;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    //
    public function index()
    {
        $bukus=Buku::latest()->paginate(10);
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'judulbuku'=>'required',
            'penerbit'=>'required',
            'jumlah'=>'required'
        ]);
        DB::table('bukus')->insert([
            'judulbuku'=>$request->judulbuku,
            'penerbit'=>$request->penerbit,
            'jumlah'=>$request->jumlah,
        ]);

        if(DB::table('bukus')){
            return redirect()->route('buku.index')->with(['success'=>'Data berhasil disimpan']);
            }else{
                return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
      }
    }
    public function edit(Buku $buku)
    {
       return view('buku.edit', compact('buku'));
    }
    
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
        'judulbuku' => 'required',
        'penerbit' => 'required',
        'jumlah' => 'required'
         ]);
         //get data buku by ID

        $buku=Buku::findOrFail($buku->id);
        $buku->update([
        'judulbuku'=>$request->judulbuku,
        'penerbit'=>$request->penerbit,
        'jumlah'=>$request->jumlah
        ]);
        if($buku){
            //redirect dengan pesan sukses
         return redirect()->route('buku.index')->with(['success'=>'Data berhasi disimpan']);
        }else{
            return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function destroy($id)
    {
    $buku = Buku::findOrFail($id);

    $buku->delete();

    if($buku){
    //redirect dengan pesan sukses
    return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
    //redirect dengan pesan error
    return redirect()->route('buku.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
