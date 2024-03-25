<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Strorage;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    //
    public function index()
    {
        $jurusans=Jurusan::latest()->paginate(10);
        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'namajurusan'=>'required',
            'namakajur'=>'required',
            'jumlahsiswa'=>'required'
        ]);
        DB::table('jurusans')->insert([
            'namajurusan'=>$request->namajurusan,
            'namakajur'=>$request->namakajur,
            'jumlahsiswa'=>$request->jumlahsiswa,
        ]);

        if(DB::table('jurusans')){
            return redirect()->route('jurusan.index')->with(['success'=>'Data berhasil disimpan']);
            }else{
                return redirect()->route('jurusan.index')->with(['error'=>'Data gagal disimpan']);
      }
    }
    public function edit(Jurusan $jurusan)
    {
       return view('jurusan.edit', compact('jurusan'));
    }
    
    public function update(Request $request, Jurusan $jurusan)
    {
        $this->validate($request, [
        'namajurusan' => 'required',
        'namakajur' => 'required',
        'jumlahsiswa' => 'required'
         ]);
         //get data jurusan by ID

        $jurusan=Jurusan::findOrFail($jurusan->id);
        $jurusan->update([
        'namajurusan'=>$request->namajurusan,
        'namakajur'=>$request->namakajur,
        'jumlahsiswa'=>$request->jumlahsiswa
        ]);
        if($jurusan){
            //redirect dengan pesan sukses
         return redirect()->route('jurusan.index')->with(['success'=>'Data berhasi disimpan']);
        }else{
            return redirect()->route('jurusan.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function destroy($id)
    {
    $jurusan = Jurusan::findOrFail($id);

    $jurusan->delete();

    if($jurusan){
    //redirect dengan pesan sukses
    return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
    //redirect dengan pesan error
    return redirect()->route('jurusan.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
