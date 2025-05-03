<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    public function run(): void

    {
        $this->call(DistrictsTableSeeder::class);
        $districts = [
            ['name' => 'Bagerhat', 'division' => 'Khulna', 'code' => '01', 'is_active' => true],
            ['name' => 'Bandarban', 'division' => 'Chattogram', 'code' => '02', 'is_active' => true],
            ['name' => 'Barguna', 'division' => 'Barisal', 'code' => '03', 'is_active' => true],
            ['name' => 'Barishal', 'division' => 'Barisal', 'code' => '04', 'is_active' => true],
            ['name' => 'Bhola', 'division' => 'Barisal', 'code' => '05', 'is_active' => true],
            ['name' => 'Bogura', 'division' => 'Rajshahi', 'code' => '06', 'is_active' => true],
            ['name' => 'Brahmanbaria', 'division' => 'Chattogram', 'code' => '07', 'is_active' => true],
            ['name' => 'Chandpur', 'division' => 'Chattogram', 'code' => '08', 'is_active' => true],
            ['name' => 'Chattogram', 'division' => 'Chattogram', 'code' => '09', 'is_active' => true],
            ['name' => 'Chuadanga', 'division' => 'Khulna', 'code' => '10', 'is_active' => true],
            ['name' => 'Cox\'s Bazar', 'division' => 'Chattogram', 'code' => '11', 'is_active' => true],
            ['name' => 'Cumilla', 'division' => 'Chattogram', 'code' => '12', 'is_active' => true],
            ['name' => 'Dhaka', 'division' => 'Dhaka', 'code' => '13', 'is_active' => true],
            ['name' => 'Dinajpur', 'division' => 'Rangpur', 'code' => '14', 'is_active' => true],
            ['name' => 'Faridpur', 'division' => 'Dhaka', 'code' => '15', 'is_active' => true],
            ['name' => 'Feni', 'division' => 'Chattogram', 'code' => '16', 'is_active' => true],
            ['name' => 'Gaibandha', 'division' => 'Rangpur', 'code' => '17', 'is_active' => true],
            ['name' => 'Gazipur', 'division' => 'Dhaka', 'code' => '18', 'is_active' => true],
            ['name' => 'Gopalganj', 'division' => 'Dhaka', 'code' => '19', 'is_active' => true],
            ['name' => 'Habiganj', 'division' => 'Sylhet', 'code' => '20', 'is_active' => true],
            ['name' => 'Jamalpur', 'division' => 'Mymensingh', 'code' => '21', 'is_active' => true],
            ['name' => 'Jashore', 'division' => 'Khulna', 'code' => '22', 'is_active' => true],
            ['name' => 'Jhalokathi', 'division' => 'Barisal', 'code' => '23', 'is_active' => true],
            ['name' => 'Jhenaidah', 'division' => 'Khulna', 'code' => '24', 'is_active' => true],
            ['name' => 'Joypurhat', 'division' => 'Rajshahi', 'code' => '25', 'is_active' => true],
            ['name' => 'Khagrachari', 'division' => 'Chattogram', 'code' => '26', 'is_active' => true],
            ['name' => 'Khulna', 'division' => 'Khulna', 'code' => '27', 'is_active' => true],
            ['name' => 'Kishoreganj', 'division' => 'Dhaka', 'code' => '28', 'is_active' => true],
            ['name' => 'Kurigram', 'division' => 'Rangpur', 'code' => '29', 'is_active' => true],
            ['name' => 'Kushtia', 'division' => 'Khulna', 'code' => '30', 'is_active' => true],
            ['name' => 'Lakshmipur', 'division' => 'Chattogram', 'code' => '31', 'is_active' => true],
            ['name' => 'Lalmonirhat', 'division' => 'Rangpur', 'code' => '32', 'is_active' => true],
            ['name' => 'Madaripur', 'division' => 'Dhaka', 'code' => '33', 'is_active' => true],
            ['name' => 'Magura', 'division' => 'Khulna', 'code' => '34', 'is_active' => true],
            ['name' => 'Manikganj', 'division' => 'Dhaka', 'code' => '35', 'is_active' => true],
            ['name' => 'Meherpur', 'division' => 'Khulna', 'code' => '36', 'is_active' => true],
            ['name' => 'Moulvibazar', 'division' => 'Sylhet', 'code' => '37', 'is_active' => true],
            ['name' => 'Munshiganj', 'division' => 'Dhaka', 'code' => '38', 'is_active' => true],
            ['name' => 'Mymensingh', 'division' => 'Mymensingh', 'code' => '39', 'is_active' => true],
            ['name' => 'Naogaon', 'division' => 'Rajshahi', 'code' => '40', 'is_active' => true],
            ['name' => 'Narail', 'division' => 'Khulna', 'code' => '41', 'is_active' => true],
            ['name' => 'Narayanganj', 'division' => 'Dhaka', 'code' => '42', 'is_active' => true],
            ['name' => 'Narsingdi', 'division' => 'Dhaka', 'code' => '43', 'is_active' => true],
            ['name' => 'Natore', 'division' => 'Rajshahi', 'code' => '44', 'is_active' => true],
            ['name' => 'Netrokona', 'division' => 'Mymensingh', 'code' => '45', 'is_active' => true],
            ['name' => 'Nilphamari', 'division' => 'Rangpur', 'code' => '46', 'is_active' => true],
            ['name' => 'Noakhali', 'division' => 'Chattogram', 'code' => '47', 'is_active' => true],
            ['name' => 'Pabna', 'division' => 'Rajshahi', 'code' => '48', 'is_active' => true],
            ['name' => 'Panchagarh', 'division' => 'Rangpur', 'code' => '49', 'is_active' => true],
            ['name' => 'Patuakhali', 'division' => 'Barisal', 'code' => '50', 'is_active' => true],
            ['name' => 'Pirojpur', 'division' => 'Barisal', 'code' => '51', 'is_active' => true],
            ['name' => 'Rajbari', 'division' => 'Dhaka', 'code' => '52', 'is_active' => true],
            ['name' => 'Rajshahi', 'division' => 'Rajshahi', 'code' => '53', 'is_active' => true],
            ['name' => 'Rangamati', 'division' => 'Chattogram', 'code' => '54', 'is_active' => true],
            ['name' => 'Rangpur', 'division' => 'Rangpur', 'code' => '55', 'is_active' => true],
            ['name' => 'Satkhira', 'division' => 'Khulna', 'code' => '56', 'is_active' => true],
            ['name' => 'Shariatpur', 'division' => 'Dhaka', 'code' => '57', 'is_active' => true],
            ['name' => 'Sherpur', 'division' => 'Mymensingh', 'code' => '58', 'is_active' => true],
            ['name' => 'Sirajganj', 'division' => 'Rajshahi', 'code' => '59', 'is_active' => true],
            ['name' => 'Sunamganj', 'division' => 'Sylhet', 'code' => '60', 'is_active' => true],
            ['name' => 'Sylhet', 'division' => 'Sylhet', 'code' => '61', 'is_active' => true],
            ['name' => 'Tangail', 'division' => 'Dhaka', 'code' => '62', 'is_active' => true],
            ['name' => 'Thakurgaon', 'division' => 'Rangpur', 'code' => '63', 'is_active' => true],
            ['name' => 'Nawabganj', 'division' => 'Rajshahi', 'code' => '64', 'is_active' => true],
        ];


        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
