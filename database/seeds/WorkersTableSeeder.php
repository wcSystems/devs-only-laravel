<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $workers = array(
            [
                'photo' => null,
                'rut' =>  123456, 
                'company_id' => 2,
                'first_name' => 'Carlos',
                'second_name' => 'Alberto',
                'first_lastname' => 'Lomeli',
                'second_lastname' => 'Sandia', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Venezolana', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 1234567890123,
                'email' => 'lomelisan@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => 1,
                'bank_account_type' => 'checking',
                'bank_account_number' => 123456789,
                'position_id' => 1,
            ],
            [
                'photo' => null,
                'rut' =>  118733800, 
                'company_id' => 2,
                'first_name' => 'Oscar',
                'second_name' => '',
                'first_lastname' => 'Carvallo',
                'second_lastname' => 'Vasquez', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Chilena', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 1234567890123,
                'email' => 'oscarcar@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => null,
                'bank_account_type' => null,
                'bank_account_number' => null,
                'position_id' => 5,
            ],
            [
                'photo' => null,
                'rut' =>  118733801, 
                'company_id' => 2,
                'first_name' => 'Otro Trabajador',
                'second_name' => '',
                'first_lastname' => 'Carvallo',
                'second_lastname' => 'Vasquez', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Chilena', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 12345678901231,
                'email' => 'otrotraba@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => null,
                'bank_account_type' => null,
                'bank_account_number' => null,
                'position_id' => 1,
            ],
            
            [
                'photo' => null,
                'rut' =>  118733801, 
                'company_id' => 1,
                'first_name' => 'Otro Trabajador',
                'second_name' => '',
                'first_lastname' => 'Mas',
                'second_lastname' => 'Aun', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Argentina', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 12345678901231,
                'email' => 'otrotrabamasaun@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => null,
                'bank_account_type' => null,
                'bank_account_number' => null,
                'position_id' => 5,
            ],

            [
                'photo' => null,
                'rut' => '18.854.279-4', 
                'company_id' => 1,
                'first_name' => 'Miguel',
                'second_name' => 'Segundo',
                'first_lastname' => 'Ahumada',
                'second_lastname' => 'Cabrera', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Chilena', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 12345678901231,
                'email' => 'miguelahumada@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => null,
                'bank_account_type' => null,
                'bank_account_number' => null,
                'position_id' => 1,
            ],

            [
                'photo' => null,
                'rut' => '8.025.013-4', 
                'company_id' => 1,
                'first_name' => 'Juan',
                'second_name' => 'Carlos',
                'first_lastname' => 'Altamirano',
                'second_lastname' => 'Tapia', 
                'dob'   =>  Carbon::createFromDate(1989, 8, 26, 'America/Caracas'),
                'nationality' => 'Chilena', 
                'civil_status' => 'single', 
                'sex' => 'male', 
                'phone_number' => 12345678901231,
                'email' => 'altamiranojc@gmail.com',
                'region_id' => 1,
                'commune_id' => 3,
                'street' => 'Calle', 
                'domestic_number' => '123A',
                'domestic_type' => 'house',
                'apartment_number' => null,
                'bank_id' => null,
                'bank_account_type' => null,
                'bank_account_number' => null,
                'position_id' => 1,
            ],
            

        );
        
        foreach ($workers as $worker) {
            DB::table('workers')->insert([
                'photo' => $worker['photo'],
                'rut' => $worker['rut'],
                'company_id' => $worker['company_id'],
                'first_name' => $worker['first_name'],
                'second_name' => $worker['second_name'],
                'first_lastname' => $worker['first_lastname'],
                'second_lastname' => $worker['second_lastname'],
                'dob' => $worker['dob'],
                'nationality' => $worker['nationality'],
                'civil_status' => $worker['civil_status'],
                'sex' => $worker['sex'],
                'phone_number' => $worker['phone_number'],
                'email' => $worker['email'],
                'region_id' => $worker['region_id'],
                'commune_id' => $worker['commune_id'],
                'street' => $worker['street'],
                'domestic_number' => $worker['domestic_number'],
                'domestic_type' => $worker['domestic_type'],
                'apartment_number' => $worker['apartment_number'],
                'bank_id' => $worker['bank_id'],
                'bank_account_type' => $worker['bank_account_type'],
                'bank_account_number' => $worker['bank_account_number'],
                'position_id' => $worker['position_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);        
        }
    }
}
