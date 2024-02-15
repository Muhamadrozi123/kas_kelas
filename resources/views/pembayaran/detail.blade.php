@extends('layout.index')

@section('konten')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel</h3>
                        </div>
                        <div class="card-body border-bottom py-3 row">
                            <div class="d-flex">
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><a href="invoice.html" class="text-reset"
                                                    tabindex="-1">{{ $item->siswa->nama }}</a>
                                            </td>
                                            <td>Rp. {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                                            <td>{{ $item->tgl_bayar }}</td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger mx-2 my-2">
                                            Data kas belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer justify-content-between">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection