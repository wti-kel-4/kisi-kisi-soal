<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'SMA Antartika Sidoarjo',
            'phone' => '-',
            'address' => 'Jl. Raya Siwalanpanji No.6, Siwalan Panji, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252',
            'email' => 'smaantartika.sda@gmail.com',
            'url_logo' => 'https://www.smaantarda.org/media_library/images/ae02d00070919f50b9ca633017ccc12b.png'
        ]);
    }
}
