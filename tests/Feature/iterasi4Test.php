<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
class iterasi4Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    public function testLihatstaff()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('anggota.index'));
            $response->assertStatus(302);
            // ->assertSee('staff');
            
    }
    public function testSeleksiBerkas()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)
        ->get(route('anggota.berkas'));
        $response->assertStatus(302);
        // ->assertSee('staff');
        
    }
    public function testSeleksiWawancara()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('anggota.wawancari'));
            $response->assertStatus(302);
            // ->assertSee('staff');
            
    }

    public function testCreatestaff()
    {

        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('anggota.store'), [
                    'nama' => $this->faker->name(),
                    'nim' => $this->faker->phoneNumber(),
                    'divisi_id' => '1',
                    'kepengurusan_id' => '1',
                    'alasan_satu' =>  $this->faker->name(),
                    'pilihan_dua' =>  $this->faker->name(),
                    'alasan_dua' =>  $this->faker->name(),
                    'pindah_programkerja' =>  $this->faker->name(),
                    'motivasi' =>  $this->faker->name(),
                    'komitmen' =>  $this->faker->name(),
                    'user_id' =>  '1',
                    'cv' =>  UploadedFile::fake()->create('test4.pdf', 1024),
                    'porto' =>  UploadedFile::fake()->create('test4.pdf', 1024),
                ]);
            $response->assertStatus(302);
    }

    public function testEditstaff()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('anggota.update', '1'), [
                'nama' => $this->faker->name(),
                'nim' => $this->faker->phoneNumber(),
                'divisi_id' => '2',
                // 'kepengurusan_id' => $this->faker->randomNumber(),
                // 'alasan_satu' =>  $this->faker->name(),
                // 'pilihan_dua' =>  $this->faker->name(),
                // 'alasan_dua' =>  $this->faker->name(),
                // 'pindah_programkerja' =>  $this->faker->name(),
                // 'motivasi' =>  $this->faker->name(),
                // 'komitmen' =>  $this->faker->name(),
                // 'user_id' =>  $this->faker->randomNumber(),
                // 'cv' =>  $this->faker->file(),
                // 'porto' =>  $this->faker->file(),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusstaff()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('anggota.destroy',1));
        $response->assertStatus(302);
    }
    
    
    public function testPlanningprogramkerja()
    {
        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('proker.store'), [
                    'nama' => $this->faker->name(),
                    'penanggung_jawab' => $this->faker->name(),
                    'pengurus' => $this->faker->name(),
                    'landasan_kegiatan' => $this->faker->name(),
                    'tujuan_kegiatan' => $this->faker->name(),
                    'objek_segmentasi' => $this->faker->name(),
                    'deskripsi' => $this->faker->name(),
                    'parameter_keberhasilan' => $this->faker->name(),
                    'kebutuhan_dana' => $this->faker->randomNumber(),
                    'sumber_dana' => $this->faker->name(),
                    'jumlah_sdm' => $this->faker->randomNumber(),
                    'kebutuhan_lain' => $this->faker->name(),
                    'divisi_id' => '2',
                    'kepengurusan_id' => '2',                    
                ]);
            $response->assertStatus(302);
    }

    public function testLihatMonitoring()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('proker.monitoring'));
            $response->assertStatus(302);
            // ->assertSee('staff');
            
    }
    public function testLihatriwayatprogramkerja()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('proker.riwayatkerja'));
            $response->assertStatus(302);
            // ->assertSee('staff');
            
    }

    public function testEditprogramkerja()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('proker.update', '1'), [
                'nama' => $this->faker->name(),
                'penanggung_jawab' => $this->faker->name(),
                'pengurus' => $this->faker->name(),
                'landasan_kegiatan' => $this->faker->name(),
                'tujuan_kegiatan' => $this->faker->name(),
                'objek_segmentasi' => $this->faker->name(),
                'deskripsi' => $this->faker->name(),
                'parameter_keberhasilan' => $this->faker->name(),
                'kebutuhan_dana' => $this->faker->randomNumber(),
                'sumber_dana' => $this->faker->name(),
                'jumlah_sdm' => $this->faker->randomNumber(),
                'kebutuhan_lain' => $this->faker->name(),
                'divisi_id' => '2',
                'kepengurusan_id' => '2',
            ]);
        $response->assertStatus(302);
    }

    public function testHapusprogramkerja()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('proker.destroy',1));
        $response->assertStatus(404);
    }
}
