@extends('template')
@section('judul_halaman','')
@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                   <label class="font-weight-bold">NIS</label>

                <input type="number" class="form-control @error('nis') is-invalid @enderror" name="nis"
                value="{{ old('nis') }}" placeholder="Masukkan Nis">

                 <!-- error message untuk title -->
                 @error('nis')
                    <div class="alert alert-danger mt-2">
                    {{ $message }}
                 </div>
                 @enderror
                  </div>

                 <div class="form-group">
                  <label class="font-weight-bold">NAMA</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama') }}" placeholder="Masukkan nama ">
                 
                   <!-- error message untuk title -->
                    @error('nama')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                   </div>
             @enderror
          </div>

          <div class="form-group">
                  <label class="font-weight-bold">JENIS KELAMIN</label>
                  <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{old('jk') }}" placeholder="Masukkan jenis kelamin">
                 
                   <!-- error message untuk title -->
                    @error('jk')
                    <div class="alert alert-danger mt-2">
                      {{ $message }}
                   </div>
             @enderror
          </div>

          <div class="form-group">
                  <label class="font-weight-bold">KELAS</label>
                  <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{old('kelas') }}" placeholder="Masukkan kelas">
                 
                   <!-- error message untuk title -->
                    @error('kelas')
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