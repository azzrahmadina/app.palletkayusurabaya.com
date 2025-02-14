<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WalletController extends Controller
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

            $walletResponse = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/get_type_emoney', [
                'form_params' => [
                    'token' => $token,
                ]

            ]);

            $walletData = json_decode($walletResponse->getBody(), true);


            if (!isset($walletData['data']) || !is_array($walletData['data'])) {
                return back()->withErrors(['error' => 'Gagal mendapatkan data e-wallet.']);
            }

            $wallets = $walletData['data'];

            return view('user.wallet', [
                'userData' => $userData,
                'wallets' => $wallets,
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
            'code' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/emoney', [
                'form_params' => [
                    'emoney' => $request->code,
                    'token' => $token,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'sukses') {
                session(['data' => $data['data']]);
                session(['nomor' => $request->nomor]);
                session(['code' => $request->code]);

                return redirect()->back()->with('success', 'E-Wallet ditemukan.')->with('data', $data['data']);
            }

            return redirect()->back()->with('error', $data['message'] ?? 'Gagal mengambil data wallet.');
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
            'code' => 'required',
        ]);

        try {
            $client = new Client();

            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/emoney/data', [
                'form_params' => [
                    'nomor' => $request->nomor,
                    'token' => $token,
                    'code' => $request->code,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'Pending') {
                return redirect()->back()->with('success', 'Transaksi berhasil!');
            }

            // Tangani error jika transaksi gagal
            return redirect()->back()->with('error', 'Transaksi gagal. Saldo tidak mencukupi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }
}
