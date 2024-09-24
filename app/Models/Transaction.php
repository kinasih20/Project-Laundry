<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_masuk',
        'nama_pelanggan',
        'jenis_layanan',
        'jenis_laundry',
        'berat',
        'metode_pembayaran',
        'total_harga',
    ];

    public static function calculatePrice($jenisLayanan, $jenisLaundry, $berat)
    {
        $layananPrices = [
            'Cuci setrika' => 5000,
            'Cuci lipat' => 4000,
            'Setrika saja' => 3000,
        ];

        $laundryPrices = [
            'Express' => 5000,
            '3 hari' => 3000,
            '2 hari' => 4000,
        ];

        $pricePerService = $layananPrices[$jenisLayanan];
        $pricePerLaundry = $laundryPrices[$jenisLaundry];
        return ($pricePerService + $pricePerLaundry) * $berat;
    }
}
