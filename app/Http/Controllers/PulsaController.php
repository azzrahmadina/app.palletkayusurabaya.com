<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PulsaController extends Controller
{
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
                    'token' => $token,
                ]

            ]);

            // Mendapatkan data dari respons API
            $data = json_decode($response->getBody(), true);

            // Pastikan data user ada
            if (isset($data['status']) && $data['status'] === 'sukses') {
                return view('user.pulsa', compact('data'));
            }

            return redirect()->route('login')->with('error', 'Gagal mendapatkan data pengguna.');
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
            'phone' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/pulsa_reguler', [
                'form_params' => [
                    'nomor' => $request->phone,
                    'token' => $token,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'sukses') {
                session(['phone' => $request->phone]);
                return redirect()->back()->with('success', 'Pulsa ditemukan.')->with('data', $data['data']);
            }

            return redirect()->back()->with('error', $data['message'] ?? 'Gagal mengambil data pulsa.');
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
            'kode_produk' => 'required',
            'phone' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/pulsa_reguler/data', [
                'form_params' => [
                    'code' => $request->kode_produk,
                    'nomor' => $request->phone,
                    'token' => $token,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'Pending') {
                return redirect()->back()->with('success', 'Transaksi berhasil!');
            }

            if (isset($data['status']) && $data['status'] === 'gagal') {
                return redirect()->back()->with('success', 'Saldo tidak mencukupi');
            }
            // Tangani error jika transaksi gagal
            return redirect()->back()->with('error', 'Transaksi gagal. Silakan coba lagi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }
}
