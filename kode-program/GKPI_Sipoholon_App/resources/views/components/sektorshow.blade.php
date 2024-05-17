<!-- Icons -->
<link href="{{ asset('/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
<link href="{{ asset('/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />

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
<section class="mb-5">
    <div class="row">
        <div class="col-md">
            <div class="header-body text-left mb-4">
                <div class="row justify-content">
                    <div class="row col-lg-12 col-md-4 border-bottom">
                        <div class="col-9">
                            <h2 class="text">Daftar Sektor</h2>
                        </div>
                        <div class="col-12 p-3">
                            <div class="col-12 shadow-sm rounded bg-white p-3">
                                <div class="col-12">
                                    @if ($serverDown)
        <div class="alert alert-danger" role="alert">
            Mohon maaf, server sektor sedang tidak dapat diakses. Silakan coba lagi nanti.
        </div>
    @else
                                    <div class="table-responsive-sm">
                                        <table class="table table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as  $item)
                                                    <tr>
                                                        <td class="col-2">{{ $item['nama'] }}</td>
                                                        <td class="col-2">{{ $item['keterangan'] }}</td>
                                                        <td class="col-2">
                                                            {{-- <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editsektor/{{ $item['id'] }}
            @elseif ($navbars == StaticVariable::$navbarPendeta)
                /pendeta/editsektor/{{ $item['id'] }} @endif"
                                                                class="btn btn-sm btn-warning hapus-data col-5"
                                                                title="Edit" style="color: white;">Ubah</a> --}}

                                                                <a href="@if ($navbars == StaticVariable::$navbarPengurusHarian) /pengurusharian/editsektor/{{ $item['id'] }}
                                                                @elseif ($navbars == StaticVariable::$navbarPendeta)
                                                                    /pendeta/editsektor/{{ $item['id'] }} @endif"
                                                                data-toggle="tooltip" data-placement="bottom" title="Edit Data Jemaat"
                                                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
</section>
<script>
    $(document).ready(function() {
        $('#list').DataTable({
            "order": [
                [1, "desc"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ Data Sektor per halaman",
                "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada sektor yang dapat ditampilkan",
                "infoFiltered": "(dari _MAX_ total sektor)",
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
