@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                   <label class="font-weight-bold">NAMA JURUSAN</label>

                <input type="text" class="form-control @error('namajurusan') is-invalid @enderror" name="namajurusan"
                value="{{ old('namajurusan') }}" placeholder="Masukkan Nama Jurusan">

                 <!-- error message untuk title -->
                 @error('namajurusan')
                    <div class="alert alert-danger mt-2">
                    {{ $message }}
                 </div>
                 @enderror
                  </div>

                 <div class="form-group">
                  <label class="font-weight-bold">NAMA KAJUR</label>
                  <input type="text" class="form-control @error('namakajur') is-invalid @enderror" name="namakajur" 
                  value="{{old('namakajur') }}" placeholder="Masukkan nama kajur">
                 
                   <!-- error message untuk title -->
                    @error('namakajur')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                   </div>
             @enderror
          </div>

          <div class="form-group">
                  <label class="font-weight-bold">JUMLAH SISWA</label>
                  <input type="number" class="form-control @error('jumlahsiswa') is-invalid @enderror" name="jumlahsiswa" 
                  value="{{old('jumlahsiswa') }}" placeholder="Masukkan jumlah siswa">
                 
                   <!-- error message untuk title -->
                    @error('jumlahsiswa')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                   </div>
             @enderror
          </div>

         <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
         <button type="reset" class="btn btn-md btn-warning">RESET</button>

                     </form>
                 </div>
            </div>
         </div>
      </div>
   </div>
   
@endsection