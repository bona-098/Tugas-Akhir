<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Auth\Notifications\ResetPassword;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
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
// 1
    public function testregister()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }
// 2
    public function testlogin()
    {
        $user = User::where('role', 'user')->first();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

       
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
// 3 logout
    public function testLogout()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->post(route('logout'));
        $response->assertStatus(302);
    }

// 4 edit profil
    public function testEditprofil()
    {
        $user = User::where('role', 'su')->first();
        $response = $this->actingAs($user)
            ->put(route('profil.update', '1'), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);
        $response->assertStatus(302);
    }
//5 
    public function testresetpassword()
    {
        Notification::fake();

        $user = User::factory()->create();

        $this->post('/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

// 6kelola user
    public function testKelolauser()
    {
        $user = User::where('role', 'su')->first();
        $response = $this->actingAs($user)
            ->put(route('profil.update', '1'), [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password',
                'role' => 'admin',
            ]);
        $response->assertStatus(302);
    }

// 7
    public function testLihatprestasi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('prestasi.index'));
            $response->assertStatus(302);
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
