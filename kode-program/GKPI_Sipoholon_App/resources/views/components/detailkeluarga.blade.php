<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white shadow-sm p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>NO KK</td>
                        <td>{{ $keluarga['kode_Keluarga'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama Keluarga</td>
                        <td>{{ $keluarga['nama_Keluarga'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $keluarga['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Nikah</td>
                        <td>{{ \Carbon\Carbon::parse($keluarga['tanggal_nikah'])->isoFormat('D MMMM YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $keluarga['status'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <h3 class="fs-3 fw-bold">Lampiran</h3>
            <table class="table">
                @foreach ($lampiran as $l)
                    <tr>
                        <td><a target="_BLANK"
                                href="{{ $l }}">{{ explode('/', $l)[count(explode('/', $l)) - 1] }}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="d-flex flex-column flex-md-row">
            <h3 class="fs-3 fw-bold">Anggota Keluarga</h3>
            @if ($navbars == StaticVariable::$navbarPengurusHarian)
                <a href="/pengurusharian/data/jemaat/add/{{ $keluarga['ID'] }}" class="btn btn-success ms-auto">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Anggota</span>
                </a>
            @elseif($navbars == StaticVariable::$navbarPendeta)
                <a href="/pendeta/data/jemaat/add/{{ $keluarga['ID'] }}" class="btn btn-success ms-auto">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Anggota</span>
                </a>
            @endif
        </div>
       
        <div class="table-responsive mt-4">
            @if ($serverDown)
            <div class="alert alert-danger" role="alert">
                Mohon maaf, server jemaat sedang tidak dapat diakses. Silakan coba lagi nanti.
            </div>
        @else
            <table class="table">
                <thead>
                    <th style="width: 130px;">NIK</th>
                    <th style="min-width: 140px;">Nama</th>
                    <th class="col">Jenis Kelamin</th>
                    <th class="col">Tempat Lahir</th>
                    <th class="col">Tanggal Lahir</th>
                    {{-- <th class="col">Posisi</th>
                    <th class="col">Sektor</th> --}}
                    <th>Pilihan</th>
                </thead>
                <tbody>
                    @foreach ($jemaat as $j)
                        <tr>
                            <td>{{ $j['nik'] }}</td>
                            <td>{{ $j['nama'] }}</a></td>
                            <td>{{ $j['jenis_kelamin'] }}</td>
                            <td>{{ $j['tempat_lahir'] }}</td>
                            <td>{{ $j['tanggal_lahir'] }}</td>
                            {{-- <td>{{ $jemaat->status }}</td>
                            <td>{{ $jemaat->sektor_name }}</td> --}}
                            <td>
                                @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                    <a href="/pengurusharian/data/jemaat/edit/{{ $j['ID'] }}"
                                        data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                    <a href="/pengurusharian/data/jemaat/{{ $j['ID'] }}"
                                        class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                @elseif($navbars == StaticVariable::$navbarPendeta)
                                    <a href="/pendeta/data/jemaat/edit/{{ $j['ID'] }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit Data Jemaat" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>

                                    <a href="/pendeta/data/jemaat/{{ $j['ID'] }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                @elseif($navbars == StaticVariable::$navbarPenatua)
                                    <a href="/penatua/data/jemaat/edit/{{ $j['ID'] }}" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit Data Jemaat" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>

                                    <a href="/penatua/data/jemaat/{{ $j['ID'] }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                @elseif($navbars == StaticVariable::$navbarJemaat)
                                    <a href="/jemaat/data/jemaat/{{ $j['ID'] }}" class="btn btn-secondary"><i
                                            class="fa fa-eye"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@include('sweetalert::alert')
