<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Prestasi;

class PresatasiTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_prestasi()
    {
        $role = 'admin';

        $admin = User::where('role', $role)->first();

        Prestasi::create([
            'nama_kegiatan' => $this->faker->name(),
            'jenis_kegiatan' => $this->faker->name(),
            'partisipasi' => $this->faker->name(),
            'deskripsi' => $this->faker->name(),
            'sertifikat' => $this->faker->file(),
            'penyelenggara' => $this->faker->company(),
            'waktu' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tempat' => $this->faker->city(),
        ]);
        $response = $this->actingAs($admin)->get(route('admin-prestasi.store'));

        $response->assertStatus(302);
    }

    public function test_lihat_prestasi()
    {
        $role = 'admin';
        $admin = User::where('role', $role)->first();

        $response = $this->actingAs($admin)->get(route('admin-prestasi.index'));
        $response->assertStatus(302);
        // $response->assertSee('daftar prestasi');
    }

    public function test_update_prestasi()
    {
        $role = 'admin';
        $admin = User::where('role', $role)->first();

        $request = [
            'nama_kegiatan' => 'sukses',
            'jeniskegiatan' => 'sukses',
            'partisipasi' => 'sukses',
            'deskripsi' => 'sukses',
            'sertifikat' => 'sukses.pdf',
            'penyelenggara' => 'uniba',
            'waktu' => '09-06-1907',
            'tempat' => 'West Judge',
        ];

        $response = $this->actingAs($admin)
        ->put(route('admin-prestasi.update',9), $request);

        $response->assertStatus(302);
    }

    public function test_hapus_prestasi()
    {
        $role = 'admin';
        $admin = User::where('role', $role)->first();

        $response = $this->actingAs($admin)
        ->delete(route('admin-prestasi.destroy',));

        $response->assertStatus(302);
    }
}
