<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" />
<div class="col-12 bg-white p-3">
    <div class="row">
        <div class="col-md-7 col-12">
            <h3 class="fs-3 fw-bold">Detail</h3>
            <div class="table-responsive col-md-11 col-12">
                <table class="mt-4 table">
                    <tr>
                        <td>No NIK</td>
                        <td>{{ $jemaat['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $jemaat['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>{{ $jemaat['nomor_telepon'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $jemaat['jenis_kelamin'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $jemaat['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $jemaat['status_gereja'] }}</td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td>{{ $jemaat['status_pernikahan'] }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ \Carbon\Carbon::parse($jemaat['tanggal_lahir'])->isoFormat('D MMMM YYYY')}}</td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>{{ $jemaat['tempat_lahir'] }}</td>
                    </tr>
                </table>
            </div>
        </div>
    
    </div>
</div>
