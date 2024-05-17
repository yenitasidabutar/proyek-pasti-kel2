{{-- 
@extends('layouts.home')

@section('title', 'Sistem Informasi Berbasis Web GKPI TArutung Kota - Beranda') --}}

@section('content')
    <link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mt-4 mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-10">
                            <h2 class="text">Ubah Data Pelayan</h2>
                            <p class="text">Data pelayan dapat dengan mudah mengetahui informasi seputar data pelayan
                                gereja.</p>
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{ route('pendeta.datapelayan') }}" class="btn btn-success p-2 ms-auto">
                                <i class="fa fa-arrow-left"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card  shadow h-100">

                <div class="card-body">
                    <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="nik">NIK</label>
                                <select name="nik" id="nik" class="form-control" required disabled>
                                    {{-- <option disabled selected>Silahkan Pilih NIK</option> --}}
                                    @foreach ($jemaatData as $id => $item )
                                    <option value= "{{ $id }}">{{ $item['nik'] }}</option selected >
                                    {{-- @endforeach   --}}
                                </select>
                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#nik').select2();
                                    });
                                </script>
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="nama">Nama Pelayan</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control" value="{{ $item['nama'] }}" required disabled>
                                    @endforeach 
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="peran">Peran</label>
                                <select name="peran" class="form-control" id="inputJemaat4">
                                    <option value="Pendeta" {{ $pelayanas['peran'] == 'Pendeta' ? 'selected' : '' }}>Pendeta
                                    </option>
                                    <option value="Sekretaris" {{ $pelayanas['peran'] == 'Sekretaris' ? 'selected' : '' }}>
                                        Sekretaris
                                    </option>
                                    <option value="Bendahara" {{ $pelayanas['peran'] == 'Bendahara' ? 'selected' : '' }}>
                                        Bendahara
                                    </option>
                                    <option value="Penatua" {{ $pelayanas['peran'] == 'Penatua' ? 'selected' : '' }}>Penatua
                                    </option>
                                    <option value="Pelayan Ibadah"
                                        {{ $pelayanas['peran'] == 'Pelayan Ibadah' ? 'selected' : '' }}>Pelayan Ibadah
                                    </option>
                                    <option value="Seksi Pelayanan Rohani"
                                        {{ $pelayanas['peran'] == 'Seksi Pelayanan Rohani' ? 'selected' : '' }}>Seksi
                                        Pelayanan Rohani
                                    </option>
                                    <option value="Seksi Pekabaran Injil"
                                        {{ $pelayanas['peran'] == 'Seksi Pekabaran Injil' ? 'selected' : '' }}>Seksi Pekabaran
                                        Injil
                                    </option>
                                    <option value="Seksi Diakoni"
                                        {{ $pelayanas['peran'] == 'Seksi Diakoni' ? 'selected' : '' }}>Seksi Diakoni
                                    </option>
                                    <option value="Seksi Musik/Nyanyian/Koor"
                                        {{ $pelayanas['peran'] == 'Seksi Musik/Nyanyian/Koor' ? 'selected' : '' }}>Seksi
                                        Musik/Nyanyian/Koor
                                    </option>
                                    <option value="Seksi Sekolah Minggu"
                                        {{ $pelayanas['peran'] == 'Seksi Sekolah Minggu' ? 'selected' : '' }}>Seksi Sekolah
                                        Minggu
                                    </option>
                                    <option value="Seksi Pemuda/i (PP)"
                                        {{ $pelayanas['peran'] == 'Seksi Pemuda/i (PP)' ? 'selected' : '' }}>Seksi Pemuda/i
                                        (PP)
                                    </option>
                                    <option value="Pengawas Harta Benda"
                                        {{ $pelayanas['peran'] == 'Pengawas Harta Benda' ? 'selected' : '' }}>Pengawas Harta
                                        Benda
                                    </option>
                                    <option value="Penasehat Jemaat"
                                        {{ $pelayanas['peran'] == 'Penasehat Jemaat' ? 'selected' : '' }}>Penasehat Jemaat
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="tanggal_terima_jabatan">Tanggal terima jabatan</label>
                                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan"
                                    class="form-control" value="{{ $pelayanas['tanggal_terima_jabatan'] ?? '' }}">
                            </div>
                            <div class="form-group col-12 col-md-6 mt-3">
                                <label for="tanggal_akhir_jabatan">Tanggal akhir jabatan</label>
                                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan" class="form-control" value="{{ $pelayanas['tanggal_akhir_jabatan'] !== '0001-01-01' ? $pelayanas['tanggal_akhir_jabatan'] : '' }}">

                            </div>
                            <div class="form-group col-12 col-md-6 mt-3"></div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-warning" id="simpan">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
