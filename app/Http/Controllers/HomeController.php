<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil token dari session
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token tidak ditemukan. Silakan login terlebih dahulu.');
        }

        $client = new Client();

        try {
            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/user', [
                'form_params' => [
                    'token' => $token,  // Mengirimkan token di body request
                ]

            ]);

            // Mendapatkan data dari respons API
            $data = json_decode($response->getBody(), true);

            // Pastikan data user ada
            if (isset($data['status']) && $data['status'] === 'sukses') {
                return view('home', compact('data'));
            }

            return redirect()->route('login')->with('error', 'Gagal mendapatkan data pengguna.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal mengambil data pengguna: ' . $e->getMessage()]);
        }
    }
}
