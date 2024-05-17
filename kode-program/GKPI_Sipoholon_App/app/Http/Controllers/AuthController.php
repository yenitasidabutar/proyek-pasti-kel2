<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Client\ConnectionException;

class AuthController extends Controller
{
    //
    function index()
    {
        return view('auth.index');
    }
    function showregister()
    {
        return view('auth.register');
    }

    public function storeregister(Request $request)
    {
        try {
            $response = Http::post('http://localhost:9010/register', [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                // 'nama_lengkap' => $request->input('nama_lengkap'),
            ]);
    
            if ($response->ok()) {
                return redirect()->route('login')->with('success', 'Registration successful! Please login.'); // Redirect ke halaman login setelah registrasi berhasil
            } else {
                return redirect()->back()->getMesaage(); // Redirect kembali ke halaman registrasi dengan pesan kesalahan
            }
        } catch (\Throwable $th) {
            return redirect()->route('auth.index')->with('error','Tidak bisa melakukan register');
        }
    }

    public function logout(Request $request)
    {
        // Send POST request to the Go server to handle logout
        $response = Http::withCookies($request->cookies->all(), 'localhost')
                        ->post('http://localhost:9010/logout');

        // Check the response status
        if ($response->successful()) {
            // Redirect to login page and clear the token cookie
            return redirect()->route('auth.index')
                             ->withCookie(cookie()->forget('token'));
        } else {
            // Handle failed response
            return response()->json(['message' => 'Logout failed'], 500);
        }
    }
    // function login(Request $request)
    // {
    //     try {
    //         $credentials = $request->only('username', 'password');
    
    //         // Send POST request to the Go server
    //         $response = Http::post('http://localhost:9010/login', $credentials);
    
    //         // Check the response status
    //         if ($response->successful()) {
    //             $data = $response->json();
    
    //             if ($data['message'] == 'login berhasil') {
    //                 $token = $data['token'] ?? null;
    
    //                 if ($token) {
    //                     // Set the token as a cookie in the response
    //                     return redirect()->route('pendeta.datajemaat')
    //                                      ->cookie('token', $token, 60, null, null, false, true);
    //                 } else {
    //                     return back()->withErrors(['message' => 'Token not found']);
    //                 }
    //             } else {
    //                 return back()->withErrors(['message' => $data['message']]);
    //             }
    //         } else {
    //             return back()->withErrors(['message' => 'Login failed']);
    //         }
    //     } catch (\Throwable $th) {
    //         return redirect()->route('auth.index')->with('error','Server Login sedang Down');
    //     }
    // }

    function login(Request $request)
{
    try {
        $credentials = $request->only('username', 'password');

        // Send POST request to the Go server
        $response = Http::post('http://localhost:9010/login', $credentials);

        // Check the response status
        if ($response->successful()) {
            $data = $response->json();

            if ($data['message'] == 'login berhasil') {
                $token = $data['token'] ?? null;

                if ($token) {
                    // Set the token as a cookie in the response
                    return redirect()->route('pendeta.datajemaat')
                                     ->cookie('token', $token, 60, null, null, false, true);
                } else {
                    return back()->withErrors(['message' => 'Token not found']);
                }
            } else {
                return back()->withErrors(['message' => $data['message']]);
            }
        } else {
            return back()->withErrors(['message' => 'Login failed']);
        }
    } catch (\Exception $e) {
        return redirect()->route('auth.index')->with('error', 'Layanan login sedang tidak tersedia. Silakan coba lagi nanti.');
    } catch (\Throwable $th) {
        return redirect()->route('auth.index')->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
    }
}

    // function login(Request $request)
    // {
    //     $nik = $request->nik;
    //     $password = $request->password;
    //     $jemaat = Jemaat::where("username", $nik)->first();
    //     if ($jemaat) {
    //         // Will do authentication 
    //         if (password_verify($password, $jemaat->password)) {
    //             if ($jemaat->pelayanGereja) {
    //                 if ($jemaat->pelayanGereja->peran === "Pendeta"){
    //                     StaticVariable::$user = $jemaat;
    //                     session()->put('Auth', $jemaat);
    //                     return redirect()->route('pendeta.index');
    //                 }
    //                 if ($jemaat->pelayanGereja->peran === "Sekretaris" || $jemaat->pelayanGereja->peran === "Bendahara"){
    //                     StaticVariable::$user = $jemaat;
    //                     session()->put('Auth', $jemaat);
    //                     return redirect()->route('pengurusharian.index');
    //                 }
    //                 }
    //         } else {
    //             return redirect()->back()->withErrors(["message" => "Password salah"])->withInput();
    //         }
    //     } else {
    //         return redirect()->back()->withErrors(["message" => "Username Tidak terdaftar"])->withInput();
    //     }
    // }
  
}
