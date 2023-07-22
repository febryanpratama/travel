<?php

namespace App\helpers;

use App\Models\Notifikasi;
use App\Models\Penyewaan;
use App\Models\Rating;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Format
{
    static function formatRupiah($angka)
    {
        $data = strlen($angka);

        if ($data == 6) {
            $hasil = substr($angka, 0, 3);
            return $hasil;
        } else if ($data == 5) {
            $hasil = substr($angka, 0, 2);
            return $hasil;
        } else if ($data == 7) {
            $hasil = substr($angka, 0, 4);
            return $hasil;
        }
        // dd($data);
    }
    static function days($start, $end)
    {

        $to = \Carbon\Carbon::parse($start . " 00:00:00");
        $from = \Carbon\Carbon::parse($end . " 23:59:59");

        $days = $to->diffInDays($from);

        return $days;
    }

    static function CartCount()
    {
        // dd(Auth::user());
        $role = Auth::user()->roles->pluck('name');

        // return $role[0];
        if ($role[0] == 'user') {
            $data = Penyewaan::where('customer_id', Auth::user()->Pelanggan->id)->where('is_status', 'Keranjang')->count();

            return $data;
        }

        return 0;
    }
    static function getNotif()
    {
        $data = Notifikasi::with('receiver', 'receiver.rental', 'receiver.Pelanggan')->where('penerima_id', Auth::user()->id)->get();

        // dd($data);
        return $data;
    }
    static function countRating($car_id)
    {
        $rating = Rating::where('mobil_id', $car_id)->get();

        if ($rating->isEmpty()) {
            # code...
            return 0;
        }

        $cRating = Rating::where('mobil_id', $car_id)->count();

        // dd($cRating);

        $sRating = Rating::where('mobil_id', $car_id)->sum('rating');

        $avgRating = $sRating / $cRating;
        return $avgRating;
    }

    static function sumRating($car_id)
    {
        $rating = Rating::where('mobil_id', $car_id)->get();

        if ($rating->isEmpty()) {
            # code...
            return 0;
        }

        $cRating = Rating::where('mobil_id', $car_id)->count();

        // dd($cRating);

        $sRating = Rating::where('mobil_id', $car_id)->sum('rating');

        $avgRating = $sRating / $cRating;
        return $avgRating;
    }

    static function whatsappMessage($nomor, $message)
    {
        $response = Http::withOptions(['verify' => false])->post('https://whatsva.id/api/sendMessageText', [
            "instance_key" => "dSXsv9hlyJiA",
            "jid" => $nomor,
            "message" => $message
        ]);
        // dd(json_decode($response));
        return [
            'status' => true,
            'message' => 'Berhasil mengirim pesan'
        ];
    }

    static function getalgoritma($rental_id)
    {
        // Konversi ke radian
        // dd(Auth::user()->pelanggan->latitude);

        $rental = Rental::where('id', $rental_id)->first();


        $lat1 = deg2rad($rental->latitude);
        $lon1 = deg2rad($rental->longitude);
        $lat2 = deg2rad(Auth::user()->pelanggan->latitude);
        $lon2 = deg2rad(Auth::user()->pelanggan->longitude);

        // Jari-jari bumi dalam kilometer (default)
        $radius = 6371;

        // Selisih latitud dan longitud
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        // Rumus Haversine
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($lat1) * cos($lat2) * sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;

        // dd();
        return substr($distance, 0, 4);
    }
    static function haversine($latitudeu, $longitudeu, $latituder, $longituder)
    {

        $lat1 = deg2rad($latituder);
        $lon1 = deg2rad($longituder);
        $lat2 = deg2rad($latitudeu);
        $lon2 = deg2rad($longitudeu);

        // Jari-jari bumi dalam kilometer (default)
        $radius = 6371;

        // Selisih latitud dan longitud
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        // Rumus Haversine
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($lat1) * cos($lat2) * sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;

        // dd();
        return substr($distance, 0, 4);
    }
}
