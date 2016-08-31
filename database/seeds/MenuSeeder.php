<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //superadmin
        DB::table('menu_items')->insert([
            'nama' => 'Home',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '1',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Pendaftar',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '2',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Siswa',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '3',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Siswa Per Kelas',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '4',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Program Bimbel',
            'url' => 'admin/program',
            'fa_icon' => 'fa-circle',
            'urutan' => '5',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Kelola Kelas',
            'url' => 'admin/program-classes',
            'fa_icon' => 'fa-circle',
            'urutan' => '6',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Siswa',
            'url' => 'admin/students',
            'fa_icon' => 'fa-circle',
            'urutan' => '7',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Halaman Website',
            'url' => 'admin/pages',
            'fa_icon' => 'fa-circle',
            'urutan' => '8',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Kelola User',
            'url' => 'admin/users',
            'fa_icon' => 'fa-circle',
            'urutan' => '9',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Nilai Try Out',
            'url' => 'admin/scores',
            'fa_icon' => 'fa-circle',
            'urutan' => '10',
            'menu_id' => 'menu_superadmin'
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Banner Utama',
            'url' => 'admin/banner-items',
            'fa_icon' => 'fa-circle',
            'urutan' => '11',
            'menu_id' => 'menu_superadmin',
        ]);


        // frontend
        DB::table('menu_items')->insert([
            'nama' => 'Home',
            'url' => '/',
            'fa_icon' => 'fa-circle',
            'urutan' => '1',
            'menu_id' => 'menu_frontend_mainmenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Profil',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '2',
            'menu_id' => 'menu_frontend_mainmenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Visi & Misi',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '3',
            'menu_id' => 'menu_frontend_mainmenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Struktur Organisasi',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '4',
            'menu_id' => 'menu_frontend_mainmenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Program Bimbingan Belajar',
            'url' => '#',
            'fa_icon' => 'fa-circle',
            'urutan' => '5',
            'menu_id' => 'menu_frontend_mainmenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Pendaftaran',
            'url' => 'pendaftaran',
            'fa_icon' => 'fa-circle',
            'urutan' => '1',
            'menu_id' => 'menu_frontend_sidemenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Login',
            'url' => 'login',
            'fa_icon' => 'fa-circle',
            'urutan' => '2',
            'menu_id' => 'menu_frontend_sidemenu',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Pendaftar',
            'url' => 'admin/registrants',
            'fa_icon' => 'fa-circle',
            'urutan' => '1',
            'menu_id' => 'menu_superadmin',
        ]);

        DB::table('menu_items')->insert([
            'nama' => 'Data Siswa Perkelas',
            'url' => 'admin/siswa-perkelas',
            'fa_icon' => 'fa-circle',
            'urutan' => '3',
            'menu_id' => 'menu_superadmin',
        ]);

    }
}
