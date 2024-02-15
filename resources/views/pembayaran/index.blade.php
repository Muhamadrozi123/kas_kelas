@extends('layout.index')

@section('konten')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pembayaran</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="col-auto ms-auto d-print-none mb-3">
                            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah
                            </a>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembayaran as $key => $item)
                                    <tr>
                                        <td><span class="text-muted">{{$key + 1}}</span></td>
                                        <td><a href="invoice.html" class="text-reset" tabindex="-1">{{ $item->siswa->nama }}</a></td>
                                        <td>{{ $item->jumlah_bayar }}</td>
                                        <td>{{ $item->tgl_bayar }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary d-sm-inline-block" href='{{route('pembayaran.show', $item->id)}}' >
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-info-circle me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="white"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <!-- Tambahkan margin-right di sini -->
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M12 9h.01" />
                                                    <path d="M11 12h1v4h1" />
                                                </svg>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-danger mx-2 my-2">
                                                Data siswa belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer justify-content-between">
                        {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
