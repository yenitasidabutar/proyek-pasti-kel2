@section('title', '')
<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<div class="row">
    <div class="col-md">
        <div class="header-body text-left mt-2 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                    <div class="col-10">
                        <h2 class="">Tambah Data Pelayan</h2>
                        <p class="text">Tambahkan data pelayan dengan mudah dengan klik tambah data pelayan dibawah.
                        </p>
                    </div>
                    {{-- <div class="col-2">
                        <a href="{{ route('Pendeta.datapelayan') }}" class="btn btn-success p-2 ms-auto">
                            <i class="fa fa-arrow-left"></i>
                            <span>Kembali</span>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-3 bg-white shadow rounded">

    {{-- TODO: Controller not ready yet --}}
    <form class="mt-3" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- <div class="form-group col-12 col-md-6 mt-3">
                <label for="nik">No NIK</label>
                <input type="text" name="nik" id="nik" class="form-control">
            </div> --}}
            @if ($serverDown)
            <div class="form-group col-12 col-md-6 mt-3">
            <div class="alert alert-danger" role="alert">
                Mohon maaf, server jemaat sedang tidak dapat diakses. Silakan coba lagi nanti.
            </div>
            </div>
        @else
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="nik">NIK</label>
                <select name="nik" id="nik" class="form-control">
                    <option disabled selected>Silahkan Pilih NIK</option>
                    @foreach ($jemaat as $item )
                    <option value= "{{ $item['ID'] }}">{{ $item['nik'] }}</option>
                    @endforeach  
                </select>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#nik').select2();
                    });
                </script>
            </div>
            @endif
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="peran">Peran</label>
                <select name="peran" id="peran" class="form-control" required>
                    <option disabled selected>Pilih Peran</option>
                    <option value="Pendeta">Pendeta</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Penatua">Penatua</option>
                    <option value="Pelayan Ibadah">Pelayan Ibadah</option>
                    <option value="Seksi Pelayanan Rohani">Seksi Pelayanan Rohani</option>
                    <option value="Seksi Pekabaran Injil">Seksi Pekabaran Injil</option>
                    <option value="Seksi Diakoni">Seksi Diakoni</option>
                    <option value="Seksi Musik/Nyanyian/Koor">Seksi Musik/Nyanyian/Koor</option>
                    <option value="Seksi Sekolah Minggu">Seksi Sekolah Minggu</option>
                    <option value="Seksi Pemuda/i (PP)">Seksi Pemuda/i (PP)</option>
                    <option value="Pengawas Harta Benda">Pengawas Harta Benda</option>
                    <option value="Penasehat Jemaat">Penasehat Jemaat</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_terima_jabatan" required>Tanggal Terima Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_terima_jabatan" id="tanggal_terima_jabatan" class="form-control">
            </div>
            <div class="form-group col-12 col-md-6 mt-3">
                <label for="tanggal_akhir_jabatan">Tanggal Akhir Jabatan</label>
                {{-- TODO: Make date format 'YYYY-MM-DD' --}}
                <input type="date" name="tanggal_akhir_jabatan" id="tanggal_akhir_jabatan" class="form-control">
            </div>
            <div class="col-12 col-md-6 mt-4">
                <button type="submit" class="btn btn-success">
                    Tambahkan Data Pelayan
                </button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </form>
</div>

@include('sweetalert::alert')
