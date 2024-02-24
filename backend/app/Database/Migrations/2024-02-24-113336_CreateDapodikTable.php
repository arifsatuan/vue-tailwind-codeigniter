<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDapodikTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ta' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => '4',
            ],
            'peserta_didik_id' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'nipd' => [
                'type' => 'VARCHAR',
                'constraint' => '5',
            ],
            'nisn' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '1',
            ],
            'agama_id_str' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '16',
                'null' => true,
            ],
            'nomor_telepon_seluler' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'nama_rombel' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tingkat_pendidikan_id' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'angkatan' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
            ],
            'alamat_jalan' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'alamat_jalan_dom' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'rt' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ],
            'rt_dom' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ],
            'rw_dom' => [
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ],
            'desa_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'desa_kelurahan_dom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'nama_ibu' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'jenis_pendaftaran_id_str' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'is_kjp' => [
                'type' => 'TINYINT',
                'constraint' => '4',
                'null' => true,
            ],
            'update_data_kjp' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('peserta_didik_id', true);
        $this->forge->createTable('dapodik');
    }

    public function down()
    {
        $this->forge->dropTable('dapodik');
    }
}
.