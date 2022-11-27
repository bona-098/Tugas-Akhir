<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Models\Dokumentasi;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;
class iterasi1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    // use WithoutMiddleware;

    public function testLihatprestasi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('prestasi.index'));
            $response->assertStatus(200);
            // ->assertSee('pengumuman');
            
    }

    public function testCreateprestasi()
    {
        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('prestasi.store'), [
                    'nama_kegiatan' => $this->faker->name(),
                    'jenis_kegiatan' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                    'partisipasi' =>  $this->faker->company(),
                    'deskripsi' =>  $this->faker->word(),
                    'penyelenggara' =>  $this->faker->company(),
                    'waktu' =>  $this->faker->date($format = 'Y-m-d', $max = 'now'),
                    'tempat' =>  $this->faker->address(),
                    'kepengurusan_id' =>  '1',
                    'sertifikat' =>  UploadedFile::fake()->create('test4.jpg', 1024),
                ]);
            $response->assertStatus(302);
    }

    public function testEditprestasi()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('prestasi.update', '1'), [
                'nama_kegiatan' => $this->faker->name(),
                'jenis_kegiatan' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'partisipasi' =>  $this->faker->company(),
                'deskripsi' =>  $this->faker->word(),
                'penyelenggara' =>  $this->faker->company(),
                'waktu' =>  $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'tempat' =>  $this->faker->address(),
                'kepengurusan_id' =>  '1',
                'sertifikat' =>  UploadedFile::fake()->create('test4.jpg', 1024),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusprestasi()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('prestasi.destroy',1));
        $response->assertStatus(302);
    }

}
