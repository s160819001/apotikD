<?php

use Illuminate\Database\Seeder;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'description' => 
            'a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
            b) patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
            - Tidak untuk nyeri akut.',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'restriction_formula' => '5 amp/kasus.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'description' => 
            'a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
            b) patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
            - Tidak untuk nyeri akut.',
            'form' => 'patch 12,5 mcg/jam',
            'restriction_formula' => '10 patch/bulan.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'fentanil',
            'description' => 
            'a) inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.
            b) patch: - Untuk nyeri kronik pada pasien kanker yang tidak terkendali.
            - Tidak untuk nyeri akut.',
            'form' => 'patch 25 mcg/jam',
            'restriction_formula' => '10 patch/bulan.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'hidromorfon',
            'description' => '',
            'form' => 'tab lepas lambat 8 mg',
            'restriction_formula' => '30 tab/bulan.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'hidromorfon',
            'description' => '',
            'form' => 'tab lepas lambat 16 mg',
            'restriction_formula' => '30 tab/bulan.',
            'faskes_tk1' => 0,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 3,
        ]);


        DB::table('medicines')->insert([
            'generic_name' => 'asam mefenamat',
            'description' => '',
            'form' => 'kaps 250 mg',
            'restriction_formula' => '30 kaps/bulan.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'asam mefenamat',
            'description' => '',
            'form' => 'tab 500 mg',
            'restriction_formula' => '30 tab/bulan.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen',
            'description' => '',
            'form' => 'tab 200 mg',
            'restriction_formula' => '30 tab/bulan.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen',
            'description' => '',
            'form' => 'tab 400 mg',
            'restriction_formula' => '30 tab/bulan.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen',
            'description' => '',
            'form' => 'susp 100 mg/5 mL',
            'restriction_formula' => '1 btl/kasus.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);

        DB::table('medicines')->insert([
            'generic_name' => 'ibuprofen',
            'description' => '',
            'form' => 'susp 200 mg/5 mL',
            'restriction_formula' => '1 btl/kasus.',
            'faskes_tk1' => 1,
            'faskes_tk2' => 1,
            'faskes_tk3' => 1,
            'category_id' => 4,
        ]);
    }
}
