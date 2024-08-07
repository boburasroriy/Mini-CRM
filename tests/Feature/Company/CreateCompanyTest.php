<?php

namespace Company;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
class CreateCompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     */
    public function test_admin_can_create_company(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $file = UploadedFile::fake()->image('logo.png');

        $response = $this->post('/companies', [
            'name' => 'idk',
            'email' => 'Idk@gmail.com',
            'website' => 'Idk',
            'logo' => $file,
        ]);
        $this->assertDatabaseHas('companies', [
            'name' => 'idk',
            'email' => 'Idk@gmail.com',
            'website' => 'Idk',
        ]);
        $response->assertRedirect(route('companies.index'));
    }
}
