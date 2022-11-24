<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
class iterasi2 extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use WithoutMiddleware;

    public function testLihatdokumentasi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','Admin')->first();
            $response = $this->actingAs($user)
                ->get(route('admin.dokumentasi.dokumentasi'));
            $response->assertStatus(200)
            ->assertSee('dokumentasi');
            
    }

    public function testCreatedokumentasi()
    {
        $user = User::where('role', 'Admin')->first();
            $response = $this->actingAs($user)
                ->post(route('dokumentasi.store'), [
                    'nama' => $this->faker->name(),
                    'waktu' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                    'deskripsi' =>  $this->faker->company(),
                    'media' =>  $this->faker->imageUrl($width = 640, $height = 480),
                ]);
            $response->assertStatus(302);
    }

    public function testEditdokumentasi()
    {
        $user = User::where('role', 'Admin')->first();
        $response = $this->actingAs($user)
            ->put(route('dokumentasi.update', '1'), [
                'nama' => $this->faker->name(),
                'waktu' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'deskripsi' =>  $this->faker->company(),
                'media' =>  $this->faker->imageUrl($width = 640, $height = 480),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusdokumentasi()
    {
        $user = User::where('role','Admin')->first();
        $response = $this->actingAs($user)->delete(route('dokumentasi.destroy',13));
        $response->assertStatus(302);
    }

}
