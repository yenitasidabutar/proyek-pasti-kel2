<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js">
</script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />

<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />


    <div class="col-12 shadow-sm rounded mt-3 bg-white p-3">
        <div class="col-12 mt-3">
            @if ($serverDown)
            <div class="alert alert-danger" role="alert">
                Mohon maaf, server jemaat sedang tidak dapat diakses. Silakan coba lagi nanti.
            </div>
        @else
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="list">
                    <thead>
                        <th style="width: 130px;">NIK</th>
                        <th style="min-width: 140px;">Nama</th>
                        {{-- <th class="col-3">Sektor</th> --}}
                        <th class="col-3">Alamat</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($jemaat as $j)
                            <tr>
                                <td>
                                    {{ $j['nik'] }}
                                </td>
                                <td>
                                    {{ $j['nama'] }}</a>
                                </td>
                                {{-- <td>
                                    {{ $j['sektor']->nama }}
                                </td> --}}
                                <td>
                                    {{ $j['alamat'] }}
                                </td>
                                <td>
                                    <div class="d-flex gap-3 flex-column flex-md-row">
                                        @if ($navbars == StaticVariable::$navbarPengurusHarian)
                                            <a href="/pengurusharian/data/jemaat/edit/{{ $j['ID'] }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/pengurusharian/data/jemaat/{{ $j['ID'] }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarPendeta)
                                            <a href="/pendeta/data/jemaat/{{ $j['ID'] }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarPenatua)
                                            <a href="/penatua/data/jemaat/edit/{{ $j['ID'] }}"
                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="/penatua/data/jemaat/{{ $j['ID']}}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
                                        @elseif($navbars == StaticVariable::$navbarJemaat)
                                            <a href="/jemaat/data/jemaat/{{ $j['ID'] }}" data-toggle="tooltip"
                                                data-placement="bottom" title="Lihat Data Jemaat"
                                                class="btn btn-secondary"><i class="fa fa-eye"></i></a>
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
</div>
<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [1, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data jemaat per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada jemaat yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total jemaat)",
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
