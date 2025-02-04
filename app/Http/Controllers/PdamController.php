<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PdamController extends Controller
{
    public function index()
    {
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token tidak ditemukan. Silakan login terlebih dahulu.');
        }

        $client = new Client();

        try {
            $userResponse = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/user', [
                'form_params' => [
                    'token' => $token,
                ]

            ]);

            $userData = json_decode($userResponse->getBody(), true);

            if (!isset($userData['status']) || $userData['status'] !== 'sukses') {
                return redirect()->route('login')->with('error', 'Gagal mendapatkan data pengguna.');
            }

            $locationResponse = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/get_type_pdam_pascabayar', [
                'form_params' => [
                    'token' => $token,
                ]

            ]);

            $locationData = json_decode($locationResponse->getBody(), true);


            if (!isset($locationData['data']) || !is_array($locationData['data'])) {
                return back()->withErrors(['error' => 'Gagal mendapatkan data lokasi.']);
            }

            $locations = $locationData['data'];

            return view('user.pdam', [
                'userData' => $userData,
                'locations' => $locations,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal mengambil data pengguna: ' . $e->getMessage()]);
        }
    }

    public function Store(Request $request)
    {
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token tidak ditemukan. Silakan login terlebih dahulu.');
        }

        $request->validate([
            'nomor' => 'required',
            'location_code' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/pdam_pascabayar', [
                'form_params' => [
                    'code' => $request->location_code,
                    'nomor' => $request->nomor,
                    'token' => $token,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'sukses') {
                session(['data' => $data['data']]);
                session(['nomor' => $request->nomor]);
                session(['location_code' => $request->location_code]);

                return redirect()->back()->with('success', 'Tagihan PDAM ditemukan.')->with('data', $data['data']);
            }

            return redirect()->back()->with('error', $data['message'] ?? 'Gagal mengambil data tagihan PDAM.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }

    public function transaction(Request $request)
    {
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token tidak ditemukan. Silakan login terlebih dahulu.');
        }

        $request->validate([
            'nomor' => 'required',
            'location_code' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/pdam_pascabayar/data', [
                'form_params' => [
                    'nomor' => $request->nomor,
                    'token' => $token,
                    'code' => $request->location_code,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'Sukses') {
                return redirect()->back()->with('success', 'Transaksi berhasil!');
            }

            // Tangani error jika transaksi gagal
            return redirect()->back()->with('error', 'Transaksi gagal. Silakan coba lagi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }
}
