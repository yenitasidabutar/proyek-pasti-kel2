<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\ConnectException;


class PengurusHarianController extends Controller
{     
    //KELUARGA
    function datakeluarga(Request $request)
{
    $serverDown = false;
    $data = [];

    try {
        $response = Http::get('http://localhost:9011/keluarga/');
        if ($response->successful()) {
            $data = $response->json();
        } else {
            $serverDown = true;
        }
    } catch (\Exception $e) {
        $serverDown = true;
    }

    return view('pengurusharian.datakeluarga', [
        "data" => $data,
        "serverDown" => $serverDown
    ]);
}

    function formkeluarga(Request $request)
    {

        return view("pengurusharian.formkeluarga");
    }

    // function formkeluargaprocess(Request $request)
    // {
    //     try { 
    //         $request->validate([
    //             'no_kk' => ['required', 'string', 'max:255'],
    //             'nama_keluarga' => ['required', 'string', 'max:255'],
    //             'alamat' => ['required', 'string', 'max:255'],
    //             'status' => ['required', 'string', 'max:255', 'in:Aktif,Pindah,Disabled'],
    //             'lampiran' => ['nullable']
    //         ]);
    //         $arrName = [];

    //     if ($request->hasFile("lampiran")) {
    //         $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
    //         $files = $request->file('lampiran');
    //         foreach ($files as $file) {
    //             $extension = $file->getClientOriginalExtension();
    //             if (in_array($extension, $allowedfileExtension)) {
    //                 $str = rand();
    //                 $result = md5($str);
    //                 $name = time() . "-" . $result . '.' . $extension;
    //                 $file->move(public_path() . '/lampiran/keluarga/', $name);
    //                 array_push($arrName, '/lampiran/keluarga/' . $name);
    //             }
    //         }
    //         $fileName = join("#", $arrName);
    //     } else {
    //         $fileName = $request->input('existing_lampiran');
    //     }
    
    //         $response = Http::post('http://localhost:9011/keluarga/', [
    //             'kode_Keluarga' => $request->no_kk,
    //             'nama_Keluarga' => $request->nama_keluarga,
    //             'alamat' => $request->alamat,
    //             'status' => $request->status,
    //             'tanggal_nikah' => $request->tanggal_nikah.'T00:00:00+07:00',
    //             'lampiran' => $fileName
    //         ]);
    
    //         if ($response->successful()) {
    //             return redirect()->route('pengurusharian.datakeluarga')->with('success', 'Data berhasil ditambah');
    //         } else {
    //             return redirect()->route('pengurusharian.datakeluarga')->with('error', 'Terjadi kesalahan saat menambah data');
    //         }
    //     } catch (\Throwable $th) {
    //         return redirect()->route('pengurusharian.datakeluarga')->with('error', $th->getMessage());
    //     }
    // }
    function formkeluargaprocess(Request $request)
    {
        try {
            $request->validate([
                'no_kk' => ['required', 'string', 'max:255'],
                'nama_keluarga' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255', 'in:Aktif,Pindah,Disabled'],
                'lampiran.*' => ['nullable', 'file', 'mimes:pdf,jpg,png,docx']
            ]);
    
            $arrName = [];
    
            if ($request->hasFile("lampiran")) {
                $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
                $files = $request->file('lampiran');
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (in_array($extension, $allowedfileExtension)) {
                        $str = rand();
                        $result = md5($str);
                        $name = time() . "-" . $result . '.' . $extension;
                        $file->move(public_path() . '/lampiran/keluarga/', $name);
                        array_push($arrName, '/lampiran/keluarga/' . $name);
                    }
                }
                $fileName = join("#", $arrName);
            } else {
                $fileName = $request->input('existing_lampiran');
            }
    
            $response = Http::post('http://localhost:9011/keluarga/', [
                'kode_Keluarga' => $request->no_kk,
                'nama_Keluarga' => $request->nama_keluarga,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'tanggal_nikah' => $request->tanggal_nikah . 'T00:00:00+07:00',
                'lampiran' => $fileName
            ]);
    
            if ($response->successful()) {
                return redirect()->route('pengurusharian.datakeluarga')->with('success', 'Data berhasil ditambah');
            } else {
                return redirect()->route('pengurusharian.datakeluarga')->with('error', 'Terjadi kesalahan saat menambah data');
            }
        } catch (\Exception $e) {
            return redirect()->route('pengurusharian.datakeluarga')->with('error', 'Mohon maaf, server keluarga sedang tidak dapat diakses. Silakan coba lagi nanti.');
        } catch (\Throwable $th) {
            return redirect()->route('pengurusharian.datakeluarga')->with('error', $th->getMessage());
        }
    }
    

//     function detailkeluarga($id)
// {
//     // Mendapatkan data keluarga berdasarkan ID
//     $response = Http::get("http://localhost:9011/keluarga/{$id}");

//     if ($response->successful()) {
//         $keluarga = $response->json();
//         // Konversi 'tanggal_nikah' ke format 'YYYY-MM-DD' jika ada
//         if (!empty($keluarga['tanggal_nikah'])) {
//             $date = new \DateTime($keluarga['tanggal_nikah']);
//             $keluarga['tanggal_nikah'] = $date->format('Y-m-d');
//         }
//         $lampiran = explode("#", $keluarga['lampiran']);
//     } else {
//         $keluarga = null;
//         $lampiran = [];
//     }

//     // Mendapatkan data jemaat
//     $response_jemaat = Http::get("http://localhost:9013/jemaat/");
//     if ($response_jemaat->successful()) {
//         $all_jemaat = $response_jemaat->json();
//         // Filter jemaat berdasarkan id_keluarga
//         $jemaat = array_filter($all_jemaat, function($j) use ($id) {
//             return $j['id_keluarga'] == $id;
//         });

//         // Konversi 'tanggal_lahir' ke format 'YYYY-MM-DD' untuk setiap jemaat
//         foreach ($jemaat as &$j) {
//             if (!empty($j['tanggal_lahir'])) {
//                 $date = new \DateTime($j['tanggal_lahir']);
//                 $j['tanggal_lahir'] = $date->format('Y-m-d');
//             }
//         }
//     } else {
//         $jemaat = [];
//     }

//     return view('pengurusharian.detailkeluarga', [
//         "keluarga" => $keluarga,
//         'jemaat' => $jemaat,
//         'lampiran' => $lampiran
//     ]);
// }

function detailkeluarga($id)
{
    try {
        // Mendapatkan data keluarga berdasarkan ID
        $response = Http::get("http://localhost:9011/keluarga/{$id}");

        if ($response->successful()) {
            $keluarga = $response->json();
            // Konversi 'tanggal_nikah' ke format 'YYYY-MM-DD' jika ada
            if (!empty($keluarga['tanggal_nikah'])) {
                $date = new \DateTime($keluarga['tanggal_nikah']);
                $keluarga['tanggal_nikah'] = $date->format('Y-m-d');
            }
            $lampiran = explode("#", $keluarga['lampiran']);
        } else {
            $keluarga = null;
            $lampiran = [];
        }

        // Mendapatkan data jemaat
        $response_jemaat = Http::get("http://localhost:9013/jemaat/");
        if ($response_jemaat->successful()) {
            $all_jemaat = $response_jemaat->json();
            // Filter jemaat berdasarkan id_keluarga
            $jemaat = array_filter($all_jemaat, function($j) use ($id) {
                return $j['id_keluarga'] == $id;
            });

            // Konversi 'tanggal_lahir' ke format 'YYYY-MM-DD' untuk setiap jemaat
            foreach ($jemaat as &$j) {
                if (!empty($j['tanggal_lahir'])) {
                    $date = new \DateTime($j['tanggal_lahir']);
                    $j['tanggal_lahir'] = $date->format('Y-m-d');
                }
            }
        } else {
            $jemaat = [];
            $serverDown = true;
        }

        return view('pengurusharian.detailkeluarga', [
            "keluarga" => $keluarga,
            'jemaat' => $jemaat,
            'lampiran' => $lampiran,
            'serverDown' => $serverDown ?? false
        ]);
    } catch (\Exception $e) {
        return view('pengurusharian.detailkeluarga', ["keluarga" => $keluarga, 'lampiran' => $lampiran,
            'serverDown' => true
        ]);
    }
}


    public function editdatakeluarga($id)
{
    $response = Http::get("http://localhost:9011/keluarga/{$id}");

    if ($response->successful()) {
        $keluarga = $response->json();
         // Convert 'tanggal_nikah' to 'YYYY-MM-DD' format if it exists
         if (!empty($keluarga['tanggal_nikah'])) {
            $date = new \DateTime($keluarga['tanggal_nikah']);
            $keluarga['tanggal_nikah'] = $date->format('Y-m-d');
        }
        $lampiran = explode("#", $keluarga['lampiran']);
    } else {
        $keluarga = null;
    }

    return view('pengurusharian.editdatakeluarga', ["keluarga" => $keluarga, "lampiran" => $lampiran]);
}
    function update(Request $request, $id) {
    try {
        $request->validate([
            'no_kk' => ['required', 'string', 'max:255'],
            'nama_keluarga' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255', 'in:Aktif,Pindah,Disabled'],
            'lampiran' => ['nullable']
        ]);

        $response_get = Http::get("http://localhost:9011/keluarga/{$id}");
    
    if ($response_get->successful()) {
        $data = $response_get->json();

        $arrName = [];
      
        if ($request->hasFile("lampiran")) {

            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('lampiran');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                if (in_array($extension, $allowedfileExtension)) {
                    $str = rand();
                    $result = md5($str);
                    $name = time() . "-" . $result . '.' . $extension;
                    $file->move(public_path() . '/lampiran/keluarga/', $name);
                    array_push($arrName, '/lampiran/keluarga/' . $name);
                }
            }
            $fileName = join("#", $arrName);
        } else{
            $fileName = $data['lampiran'];
        }
        // print_r($data);
    } else {
        $data = [];
    }
        

        $response = Http::put("http://localhost:9011/keluarga/{$id}", [
            'kode_Keluarga' => $request->no_kk,
            'nama_Keluarga' => $request->nama_keluarga,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'tanggal_nikah' => $request->tanggal_nikah.'T00:00:00+07:00',
            'lampiran' => $fileName
        ]);

        if ($response->successful()) {
            return redirect()->route('pengurusharian.datakeluarga')->with('success', 'Data Keluarga Berhasil Diubah!');
        } else {
            return redirect()->route('pengurusharian.datakeluarga')->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    } catch (\Throwable $th) {
        return redirect()->route('pengurusharian.datakeluarga')->with('error', 'Terjadi kesalahan saat memperbarui data');
    }
    }

    // JEMAAT

    // function datajemaat(){
    //     $response_jemaat = Http::get("http://localhost:9013/jemaat/");
    // if ($response_jemaat->successful()) {
    //     $jemaat = $response_jemaat->json();
    //     if (!empty($jemaat['tanggal_lahir'])) {
    //         $date = new \DateTime($jemaat['tanggal_lahir']);
    //         $jemaat['tanggal_lahir'] = $date->format('Y-m-d');
    //     }
    // } else {
    //     $jemaat = [];}
        
    //     return view('pengurusharian.datajemaat', [
    //         "jemaat" => $jemaat
    //     ]);
    // }

    public function datajemaat()
{
    $jemaat = [];
    $serverDown = false;

    try {
        $response = Http::get("http://localhost:9013/jemaat/");

        if ($response->successful()) {
            $jemaat = $response->json();
            
            // If there's a 'tanggal_lahir' field, convert its format
            foreach ($jemaat as &$j) {
                if (!empty($j['tanggal_lahir'])) {
                    $date = new \DateTime($j['tanggal_lahir']);
                    $j['tanggal_lahir'] = $date->format('Y-m-d');
                }
            }
        } else {
            $serverDown = true;
        }
    } catch (\Exception $e) {
        // Handle connection exception if the server is down
        // Log or handle the error as needed
        // For now, let's just set the serverDown flag to true
        $serverDown = true;
    }

    return view('pengurusharian.datajemaat', [
        "jemaat" => $jemaat,
        "serverDown" => $serverDown
    ]);
}



    function formjemaat( $idKeluarga){
    $response = Http::get("http://localhost:9011/keluarga/{$idKeluarga}");
    if ($response->successful()) {
        $keluarga = $response->json();
    } else {
        $keluarga = null;
    }
    return view('pengurusharian.formjemaat', ["keluarga" => $keluarga]);
    }

    function formjemaatprocess(Request $request, $idKeluarga)
    {
        
        try { 
            $request->validate([
                'id_keluarga' => ['required', 'int', 'max:10'],
                'nik' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'status_gereja' => ['required', 'string', 'max:255', 'in:Aktif,Pindah,Meninggal'],
                'status_pernikahan' => ['required', 'string', 'max:255', 'in:Menikah,Belum Menikah'],
                'no_telepon' => ['required', 'string', 'max:255']
            ]);

            $response = Http::post('http://localhost:9013/jemaat/', [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir.'T00:00:00+07:00',
                'tempat_lahir' => $request->tempat_lahir,
                'status_pernikahan' => $request->status_pernikahan,
                'status_gereja' => $request->status_gereja,
                'nomor_telepon' => $request->no_telepon,
                'id_keluarga' => intval($request->id_keluarga),
            ]);
    
            if ($response->successful()) {
                return redirect('/pengurusharian/data/keluarga/' . $idKeluarga)->with('success', 'Data berhasil ditambah');
            } else {
                return redirect('/pengurusharian/data/keluarga/' . $idKeluarga)->with('error', 'Terjadi kesalahan saat menambah data');
            }
        } catch (\Throwable $th) {
            return redirect('/pengurusharian/data/keluarga/' . $idKeluarga)->with('error', $th->getMessage());
        }

    }

    function detailjemaat($id){
        $response_jemaat = Http::get("http://localhost:9013/jemaat/{$id}");
        if ($response_jemaat->successful()) {
            $jemaat = $response_jemaat->json();
            if (!empty($jemaat['tanggal_lahir'])) {
                $date = new \DateTime($jemaat['tanggal_lahir']);
                $jemaat['tanggal_lahir'] = $date->format('Y-m-d');
            }
        } else {
            $jemaat = NULL;}
        return view('pengurusharian.detailjemaat', ['jemaat'=> $jemaat]);
    }
    
    function editdetailjemaat($id){
        $response_jemaat = Http::get("http://localhost:9013/jemaat/{$id}");
        if ($response_jemaat->successful()) {
            $jemaat = $response_jemaat->json();
            if (!empty($jemaat['tanggal_lahir'])) {
                $date = new \DateTime($jemaat['tanggal_lahir']);
                $jemaat['tanggal_lahir'] = $date->format('Y-m-d');
            }
        } else {
            $jemaat = NULL;}
        return view('pengurusharian.editdatajemaat', ['jemaat'=> $jemaat]);
    }

    function updateJemaat(Request $request, $id) {
        try { 
            $request->validate([
                'nik' => ['required', 'string', 'max:255'],
                'nama' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'status_gereja' => ['required', 'string', 'max:255', 'in:Aktif,Pindah,Meninggal'],
                'status_pernikahan' => ['required', 'string', 'max:255', 'in:Menikah,Belum Menikah'],
                'no_telepon' => ['required', 'string', 'max:255']
            ]);

            $response = Http::put("http://localhost:9013/jemaat/{$id}", [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir.'T00:00:00+07:00',
                'tempat_lahir' => $request->tempat_lahir,
                'status_pernikahan' => $request->status_pernikahan,
                'status_gereja' => $request->status_gereja,
                'nomor_telepon' => $request->no_telepon
            ]);
    
            if ($response->successful()) {
                return redirect('/pengurusharian/data/jemaat/')->with('success', 'Data berhasil diubah');
            } else {
                return redirect('/pengurusharian/data/jemaat/')->with('error', 'Terjadi kesalahan saat menambah data');
            }
        } catch (\Throwable $th) {
            return redirect('/pengurusharian/data/jemaat/'  )->with('error', $th->getMessage());
        }
    }
    
public function createsektor(){
    return view('pengurusharian.createsektor');
}

// public function storesektor(Request $request){
//     try {
//         $request->validate([
//             'nama' => ['required', 'string', 'max:255'],
//             'keterangan' => ['required', 'string', 'max:255']
//         ]);
//         $response = Http::post('http://127.0.0.1:9012/api/postsektor/', [
//             'nama' => $request->nama,
//             'keterangan' => $request->keterangan
//         ]);
//         if ($response->successful()) {
//             return redirect()->route('pengurusharian.sektor')->with('success', 'Data berhasil ditambah');
//         } else {
//             return redirect()->route('pengurusharian.sektor')->with('error', 'Terjadi kesalahan saat menambah data');
//         }
//     } catch (\Throwable $th) {
//         return redirect()->route('pengurusharian.sektor')->with('error', $th->getMessage());
//     }
// }

public function storesektor(Request $request){
    $serverDown = false;

    try {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'keterangan' => ['required', 'string', 'max:255']
        ]);

        $response = Http::post('http://127.0.0.1:9012/api/postsektor/', [
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        if ($response->successful()) {
            return redirect()->route('pengurusharian.sektor')->with('success', 'Data berhasil ditambah');
        } else {
            return redirect()->route('pengurusharian.sektor')->with('error', 'Terjadi kesalahan saat menambah data');
        }
    } catch (\Exception $e) {
        $serverDown = true;
    } catch (\Throwable $th) {
        return redirect()->route('pengurusharian.sektor')->with('error', 'Terjadi kesalahan saat menambah data');
    }

    if ($serverDown) {
        return redirect()->route('pengurusharian.sektor')->with('error', 'Mohon maaf, server sektor sedang tidak dapat diakses. Silakan coba lagi nanti.');
    }
}


// public function showsektor()
//     {
//         $response = Http::get('http://127.0.0.1:9012/api/sektor/');
    
//     if ($response->successful()) {
//         $data = $response->json();
        
//     } 
//     else {
//         $data = [];
//     }
//         return view('pengurusharian.sektorshow', ["data" => $data['data']
//     ]);
//     }

public function showsektor()
{
    $serverDown = false;
    $data = [];

    try {
        $response = Http::get('http://127.0.0.1:9012/api/sektor/');

        if ($response->successful()) {
            $data = $response->json();
        } else {
            $serverDown = true;
        }
    } catch (\Exception $e) {
        $serverDown = true;
    }

    return view('pengurusharian.sektorshow', [
        "data" => $data['data'] ?? [],
        "serverDown" => $serverDown
    ]);
}


    public function editsektor($id){
        $response = Http::get("http://127.0.0.1:9012/api/sektor/{$id}");

    if ($response->successful()) {
        $sektor = $response->json();
    } else {
        $sektor = null;
    }
    return view('pengurusharian.editsektor', ['sektor'=>$sektor]);
    }

    function updatesektor(Request $request, $id) {
        try {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'keterangan' => ['required', 'string', 'max:255']
            ]);
            $response = Http::patch("http://127.0.0.1:9012/api/updatesektor/{$id}", [
                'nama' => $request->input('nama'),
                'keterangan' => $request->input('keterangan')
            ]);
            if ($response->successful()) {
                return redirect()->route('pengurusharian.sektor')->with('success', 'Data Sektor Berhasil Diubah!');
            } else {
                return redirect()->route('pengurusharian.sektor')->with('error', 'Terjadi kesalahan saat memperbarui data');
            }
        } catch (\Throwable $th) {
            return redirect()->route('pengurusharian.sektor')->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    
    }

}