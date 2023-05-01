<?php

namespace App\helpers;

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

        // dd($days);

        return $days;
    }
}
