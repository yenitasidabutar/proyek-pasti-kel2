<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
</script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />

<div class="row">
    <div class="col-md">
        <div class="header-body text-left mt-3 mb-4">
            <div class="row justify-content">
                <div class="row col-lg-12 col-md-4 border-bottom">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 p-3">
        <div class="col-12 shadow-sm rounded bg-white p-3">
            <div class="col-12">
                @if ($serverDown)
                <div class="alert alert-danger" role="alert">
                    Mohon maaf, server pelayan sedang tidak dapat diakses. Silakan coba lagi nanti.
                </div>
            @else
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="list">
                        <thead>
                            <tr>
                                <th scope="col">No NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Peran</th>
                                <th scope="col">Terima Jabatan</th>
                                <th scope="col">Akhir Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelayan as $item)
                                @php
                                    $jemaat = $jemaatData[$item['id_jemaat']] ?? null;
                                @endphp
                                <tr>
                                    @if ($jemaat)
                                        <td>{{ $jemaat['nik'] }}</td>
                                        <td>{{ $jemaat['nama'] }}</td>
                                    @else
                                        <td colspan="2">Data jemaat tidak ditemukan</td>
                                    @endif
                                    <td>{{ $item['peran'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item['tanggal_terima_jabatan'])->isoFormat('D MMMM YYYY') }}</td>
                                    <td>
                                        @if ($item['tanggal_akhir_jabatan'] !== '0001-01-01')
                                            {{ \Carbon\Carbon::parse($item['tanggal_akhir_jabatan'])->isoFormat('D MMMM YYYY') }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 flex-column flex-md-row">
                                            @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                                <a href="/pengurusharian/data/pelayan/edit/{{ $item['ID'] }}"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Edit Data Pelayan" class="btn btn-warning"><i
                                                        class="fa fa-edit"></i></a>
                                            @elseif($navbars == StaticVariable::$navbarPendeta)
                                                <a href="/pendeta/data/pelayan/edit/{{ $item['ID'] }}"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    title="Edit Data Pelayan" class="btn btn-warning"><i
                                                        class="fa fa-edit"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [1, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data pelayan per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada pelayan yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total pelayan)",
                "search": "Cari :",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "",
                    "previous": ""
                },
            }
        });
    });
</script>
@include('sweetalert::alert')
