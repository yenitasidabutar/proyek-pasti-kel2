<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />

<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <div class="row col-lg-12 col-md-4 border-bottom">
                <div class="col-10">
                    <h2 class="text">Ubah Data Jemaat</h2>
                    <p class="text">Data Jemaat dapat dengan mudah mengetahui informasi seputar data jemaat</p>
                </div>
            </div>
            <div class="table-responsive col-md-12 col-12">
                <table class="mt-4 table">
                    <form
                        action=""
                        method="POST">
                        @csrf
                        <tr>
                            @if (session()->has('berhasilupdatejemaat'))
                                <div class="alert alert-success" role="alert">
                                    <p>
                                        {{ session('berhasilupdatejemaat') }}
                                    </p>
                                </div>
                            @endif
                        </tr>
                        <tr>
                            <td>No NIK</td>
                            <td><input type="text" name="nik" class="form-control" id="inputJemaat"
                                    value="{{ $jemaat['nik'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama" class="form-control" id="inputJemaat1"
                                    value="{{ $jemaat['nama'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td><input type="text" name="no_telepon" class="form-control" id="inputJemaat2"
                                    value="{{ $jemaat['nomor_telepon'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select name="jenis_kelamin" class="form-control" id="inputJemaat3" required disabled>

                                    <option value="Laki-laki"
                                        {{ $jemaat['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki laki</option>
                                    <option value="Perempuan"
                                        {{ $jemaat['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" class="form-control" id="inputJemaat4"
                                    value="{{ $jemaat['alamat'] }}" required disabled></td>
                        </tr>
                        <tr>
                            <td>Status Gereja</td>
                            <td>
                                <select name="status_gereja" class="form-control" id="inputJemaat5" required disabled>

                                    <option value="Aktif" {{ $jemaat['status_gereja'] == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Meninggal" {{ $jemaat['status_gereja'] == 'Meninggal' ? 'selected' : '' }}>
                                        Meninggal</option>
                                    <option value="Pindah" {{ $jemaat['status_gereja'] == 'Pindah' ? 'selected' : '' }}>Pindah
                                    </option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Pernikahan</td>
                            <td>
                                <select name="status_pernikahan" class="form-control" id="inputJemaat6" required
                                    disabled>
                                    <option value="Menikah"
                                        {{ $jemaat['status_pernikahan'] == 'Menikah' ? 'selected' : '' }}>Menikah
                                    </option>
                                    <option value="Belum Menikah"
                                        {{ $jemaat['status_pernikahan'] == 'Belum Menikah' ? 'selected' : '' }}>Belum
                                        Menikah</option>
                                    <option value="Cerai Mati"
                                        {{ $jemaat['status_pernikahan'] == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" placeholder="" value="{{ $jemaat['tanggal_lahir'] }}" id="inputJemaat7" required disabled></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input type="text" name="tempat_lahir" class="form-control" id="inputJemaat8"
                                    value="{{ $jemaat['tempat_lahir'] }}" required disabled></td>
                        </tr> 
                            <td><button type="button" class="btn btn-warning" onclick="editjemaat()">Ubah
                                    Jemaat</button></td>
                            <td><button type="submit" class="btn btn-success" id="tblSave" disabled>Simpan</button>
                            </td>
                        </tr>

                </table>
            </div>
        </div>

    </div>
</div>
@include('sweetalert::alert')
<script>
    function editjemaat() {
        var elements = document.getElementById("inputJemaat"),
            elements1 = document.getElementById("inputJemaat1"),
            elements2 = document.getElementById("inputJemaat2"),
            elements3 = document.getElementById("inputJemaat3"),
            elements4 = document.getElementById("inputJemaat4"),
            elements5 = document.getElementById("inputJemaat5"),
            elements6 = document.getElementById("inputJemaat6"),
            elements7 = document.getElementById("inputJemaat7"),
            elements8 = document.getElementById("inputJemaat8"),
            tblSave = document.getElementById("tblSave");

        var button = document.querySelector(".btn-warning");

        if (elements.disabled == true) {
            elements.disabled = false;
            elements1.disabled = false;
            elements2.disabled = false;
            elements3.disabled = false;
            elements4.disabled = false;
            elements5.disabled = false;
            elements6.disabled = false;
            elements7.disabled = false;
            elements8.disabled = false;
            tblSave.disabled = false;
            button.innerHTML = "Batal";
        } else {
            elements.disabled = true;
            elements1.disabled = true;
            elements2.disabled = true;
            elements3.disabled = true;
            elements4.disabled = true;
            elements5.disabled = true;
            elements6.disabled = true;
            elements7.disabled = true;
            elements8.disabled = true;
            tblSave.disabled = true;
            button.innerHTML = "Ubah Jemaat";
        }
    }
</script>
