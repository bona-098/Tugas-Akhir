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

class iterasi5Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    // use WithoutMiddleware;
    public function testLihatteknisi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('teknisi.index'));
            $response->assertStatus(200);
            // ->assertSee('teknisi');
            
    }

    public function testCreateteknisi()
    {
        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('teknisi.store'), [
                    'nim' => $this->faker->randomNumber(),
                    'hari' => 'rabu',
                    'user_id' =>  '15',
                    'no_hp' => $this->faker->phoneNumber(),
                    'foto' => $this->faker->imageUrl($width = 640, $height = 480),
                ]);
            $response->assertStatus(302);
    }

    public function testEditteknisi()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('teknisi.update', '14'), [
                'nim' => $this->faker->randomNumber(),
                'hari' => 'selasa',
                'user_id' =>  '15',
                'no_hp' => $this->faker->phoneNumber(),
                'foto' => $this->faker->imageUrl($width = 640, $height = 480),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusteknisi()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('teknisi.destroy',14));
        $response->assertStatus(302);
    }

    public function testKelolaservice()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('service.index'));
            $response->assertStatus(200);
            // ->assertSee('service');
            
    }
    
    public function testCreateservice()
    {
        $user = User::where('role', 'user')->first();
            $response = $this->actingAs($user)
                ->post(route('service.store'), [
                    'nama' => $this->faker->name(),
                    'hari' => $this->faker->dayOfWeek(),
                    'sesi' => 'sesi1',
                    'no_hp' =>  $this->faker->phoneNumber(),
                    'pesan' =>  $this->faker->word(),
                    'status' =>  '1',
                    'teknisi_id' =>  '14',
                    'user_id' =>  '15',
                ]);
            $response->assertStatus(302);
    }

    public function testHapusservice()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('service.destroy',12));
        $response->assertStatus(302);
    }
    public function testLihatriwayat()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('riwayat'));
            $response->assertStatus(200);
            // ->assertSee('service');
            
    }
}
