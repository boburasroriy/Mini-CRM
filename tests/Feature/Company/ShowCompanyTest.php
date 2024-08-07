<?php

namespace Company;

use App\Models\Companies;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowCompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_view_company(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $file = UploadedFile::fake()->image('logo.png');
        $company = Companies::create([
            'name' => 'idk',
            'email' => 'Idk@gmail.com',
            'website' => 'Idk',
            'logo' => $file->storeAs('logos', 'logo.png', 'public'),
        ]);

        $response = $this->get('/companies/' . $company->id);
        $response->assertStatus(200);


    }
}
