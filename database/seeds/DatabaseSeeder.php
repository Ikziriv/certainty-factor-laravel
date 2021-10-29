<?php

use Illuminate\Database\Seeder;
use App\User;
use App\BobotNilai;
use App\Gejala;
use App\Solusi;
use App\Diagnose;
use App\GejalaSolusi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->admin();
        $this->bobot_nilai();
        $this->gejala();
        $this->solusi();
        // $this->call(UsersTableSeeder::class);
    }

    public function admin()
    {
        $admin = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }

    public function bobot_nilai()
    {
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1001',
            'nama' => 'Tidak',
            'nilai' => 0,
        ]);
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1002',
            'nama' => 'Tidak Tahu',
            'nilai' => 0.2,
        ]);
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1003',
            'nama' => 'Sedikit Yakin',
            'nilai' => 0.4,
        ]);
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1004',
            'nama' => 'Cukup Yakin',
            'nilai' => 0.6,
        ]);
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1005',
            'nama' => 'Yakin',
            'nilai' => 0.8,
        ]);
        $bobot = App\BobotNilai::create([
        	'kode_bobot' => 'BN1006',
            'nama' => 'Sangat Yakin',
            'nilai' => 1,
        ]);
    }

    public function gejala()
    {
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1001',
            'nama' => 'Tidak Bisa Start Engine',
            // 'nilai' => 0.2,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1002',
            'nama' => 'Lampu Speedometer Mati',
            // 'nilai' => 0.3,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1003',
            'nama' => 'Klakson Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1004',
            'nama' => 'Lampu Utama Dekat Mati',
            // 'nilai' => 0.5,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1005',
            'nama' => 'Lampu Utama Redup',
            // 'nilai' => 0.6,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1006',
            'nama' => 'Lampu Utama Jauh Mati',
            // 'nilai' => 0.7,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1007',
            'nama' => 'Lampu Sein Depan Kanan Mati',
            // 'nilai' => 0.8,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1008',
            'nama' => 'Lampu Sein Depan Kiri Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1009',
            'nama' => 'Lampu Sein Belakang Kanan Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1010',
            'nama' => 'Lampu Sein Belakang Kiri Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1011',
            'nama' => 'Lampu Rem Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1012',
            'nama' => 'Lampu Sein Sepion Kanan Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1013',
            'nama' => 'Lampu Sein Sepion Kiri Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1014',
            'nama' => 'Lampu Belakang Mati',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1015',
            'nama' => 'Lampu Sein Tidak Berkedip',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1016',
            'nama' => 'Indikator Panel d Speedometer Aktif',
            // 'nilai' => 0.4,
        ]);
        $gejala = App\Gejala::create([
        	'kode_gejala' => 'KR1017',
            'nama' => 'Tidak Bisa Stop Engine',
            // 'nilai' => 0.4,
        ]);
    }

    public function solusi()
    {
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1001',
            'nama' => 'BCU Rusak, Di Reparasi, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1002',
            'nama' => 'ACC Melemah, Di isi ulang (Charge) / Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1003',
            'nama' => 'Sekring Putus, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1004',
            'nama' => 'RELAY Melemah, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1005',
            'nama' => 'FLASHER Melemah, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1006',
            'nama' => 'Kabel Putus, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1007',
            'nama' => 'Bohlam Mati, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1008',
            'nama' => 'Saklar Kanan Rusak, Ganti',
        ]);
        $solusi = App\Solusi::create([
        	'kode_solusi' => 'SLS1009',
            'nama' => 'Saklar Kiri Rusak, Ganti',
        ]);

    }
}
