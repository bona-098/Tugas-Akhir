<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class iterasi3Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    public function testLihatkepengurusan()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('kepengurusan.index'));
            $response->assertStatus(302);
            // ->assertSee('kepengurusan');
            
    }

    public function testCreatekepengurusan()
    {
        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('kepengurusan.store'), [
                    'nama' => $this->faker->name(),
                    'tahun' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                    'pembina' => $this->faker->name(),
                    'ketua' =>  $this->faker->company(),
                    'internal' =>  $this->faker->company(),
                    'external' =>  $this->faker->company(),
                    'sekretaris' => $this->faker->name(),
                ]);
            $response->assertStatus(302);
    }

    public function testEditkepengurusan()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('kepengurusan.update', '1'), [
                'nama' => $this->faker->name(),
                    'tahun' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                    'pembina' => $this->faker->name(),
                    'ketua' =>  $this->faker->company(),
                    'internal' =>  $this->faker->company(),
                    'external' =>  $this->faker->company(),
                    'sekretaris' => $this->faker->name(),
            ]);
        $response->assertStatus(302);
    }

    public function testHapuskepengurusan()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('kepengurusan.destroy',1));
        $response->assertStatus(302);
    }
    public function testLihatdivisi()
    {
        $this->withoutExceptionHandling();
        $user = User::where('role','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('divisi.index'));
            $response->assertStatus(302);
            // ->assertSee('kepengurusan');
            
    }

    public function testCreatedivisi()
    {
        $user = User::where('role', 'admin')->first();
            $response = $this->actingAs($user)
                ->post(route('divisi.store'), [
                    'nama' => $this->faker->company(),
                    'kadiv' => $this->faker->name(),
                    'visi' => $this->faker->name(),
                    'misi' => $this->faker->name(),
                    
                ]);
            $response->assertStatus(302);
    }

    public function testEditdivisi()
    {
        $user = User::where('role', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('divisi.update', '1'), [
                'nama' => $this->faker->company(),
                'kadiv' => $this->faker->name(),
                'visi' => $this->faker->name(),
                'misi' => $this->faker->name(),
            ]);
        $response->assertStatus(302);
    }

    public function testHapusdivisi()
    {
        $user = User::where('role','admin')->first();
        $response = $this->actingAs($user)->delete(route('divisi.destroy',1));
        $response->assertStatus(404);
    }
}
