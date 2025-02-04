<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $client = new Client();

        try {
            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/login', [
                'form_params' => [
                    'email' => $request->email,
                    'password' => $request->password,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['status'] === 'sukses') {
                // Simpan token di session
                session(['api_token' => $data['token']]);
                return redirect()->route('home')->with('success', 'Login berhasil!');
            }

            return back()->withErrors(['email' => 'Email atau password salah.']);
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal login: ' . $e->getMessage()]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $client = new Client();

        try {
            $response = $client->post('https://bospulsa.wahyurosamhidayat.xyz/api/register', [
                'form_params' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => $request->password,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['status']) && $data['status'] === 'sukses') {
                return redirect()->route('auth.login')->with('success', 'Registrasi berhasil! Silakan login.');
            }

            return back()->withErrors(['email' => 'Gagal registrasi.']);
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal registrasi: ' . $e->getMessage()]);
        }
    }

    public function dashboard()
    {
        return view('home');
    }

    public function logout()
    {
        session()->forget('api_token');
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
