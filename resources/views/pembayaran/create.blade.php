@extends('layout.index')

@section('konten')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('pembayaran.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4 class="card-title">Form elements</h4>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="siswa" class="form-label">Nama</label>
                                <select class="form-control" id="siswa" name="id_siswa" required>
                                    <option value="" selected disabled>Pilih Siswa</option>
                                    @foreach ($datasiswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                    @endforeach
                                </select>
                                

                                @error('id_siswa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- <div class="col-md-3 mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" class="form-control" id="nominal" name="jumlah_bayar" placeholder="$">

                                    @error('nominal')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div> --}}
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Pilih Tanggal</label>
                                        <input type="date" id="tanggal" name="tgl_bayar" pattern="\d{4}-\d{2}-\d{2}" value="<?= date('Y-m-d'); ?>" class="form-control me-6">
                                    </div>
                                </div>   

                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" value="5000" disabled>
                                    <input type="hidden" name="jumlah_bayar" value="5000">
                                </div>          
    
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection