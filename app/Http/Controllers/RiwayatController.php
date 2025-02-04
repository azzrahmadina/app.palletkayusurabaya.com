<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RiwayatController extends Controller
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

            $riwayatResponse = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/riwayat', [
                'form_params' => [
                    'token' => $token,
                ]

            ]);

            $riwayatData = json_decode($riwayatResponse->getBody(), true);


            if (!isset($riwayatData['transaksi']) || !is_array($riwayatData['transaksi'])) {
                return back()->withErrors(['error' => 'Gagal mendapatkan data riwayat.']);
            }

            $riwayats = $riwayatData['transaksi'];

            return view('user.riwayat', [
                'userData' => $userData,
                'riwayats' => $riwayats,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Gagal mengambil data pengguna: ' . $e->getMessage()]);
        }
    }

    public function detail(Request $request)
    {
        $token = session('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Token tidak ditemukan. Silakan login terlebih dahulu.');
        }

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/riwayat/detail', [
                'form_params' => [
                    'token' => $token,
                    'id' => $request->id,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'sukses') {
                return redirect()->back()->with('success', 'Pulsa ditemukan.')->with('data', $data['data']);
            }

            return redirect()->back()->with('error', $data['message'] ?? 'Gagal mengambil data pulsa.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }
}
