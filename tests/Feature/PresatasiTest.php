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
            'nama' => $this->faker->name(),
            'nim' => $this->faker->numerify('########'),
            'pencapaian' => $this->faker->randomElement(array('juara 1', 'juara 2', 'juara 3', 'juara harapan', 'peserta', 'guest star', 'dll')),
            'dospem' => $this->faker->name(),
            'kategori' => $this->faker->randomElement(array('lomba', 'webinar', 'peraih penghargaan', 'peraih nominasi', 'dll')),
            'nama_kegiatan' => $this->faker->realText($maxNbChars = 200),
            'penyelenggara' => $this->faker->company(),
            'waktu' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'tempat' => $this->faker->city(),
            'foto' => $this->faker->imageUrl($width = 640, $height = 480),
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
            'nama' => 'sukses',
            'nim' => '11181019',
            'pencapaian' => 'juara 1',
            'dospem' => 'luhut',
            'kategori' => 'lomba',
            'nama_kegiatan' => 'lomba panjat pinang',
            'penyelenggara' => 'uniba',
            'waktu' => '09-06-1907',
            'tempat' => 'West Judge',
            'foto' => 'sukses.jpg'
        ];

        // $response = $this->call('PUT', route('supplier.update'),$request);
        // $this->assertEquals(200, $response->getStatusCode());
        $response = $this->actingAs($admin)
        ->put(route('admin-prestasi.update',3), $request);

        $response->assertStatus(302);
    }

    public function test_hapus_prestasi()
    {
        $role = 'admin';
        $admin = User::where('role', $role)->first();

        $response = $this->actingAs($admin)
        ->delete(route('admin-prestasi.destroy',4));

        $response->assertStatus(302);
    }
}
