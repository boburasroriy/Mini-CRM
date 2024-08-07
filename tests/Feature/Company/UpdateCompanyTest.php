<?php

namespace Company;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Models\Companies;

class UpdateCompanyTest extends TestCase
{
    public function test_company_can_be_updatable_by_admin_user(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $file = UploadedFile::fake()->image('logo.png');
        $this->testCompany = Companies::create([
            'name' => 'idk',
            'email' => 'Idk@gmail.com',
            'website' => 'Idk',
            'logo' => $file->storeAs('logos', 'logo.png', 'public'),
        ]);

        $updatedFile = UploadedFile::fake()->image('updated.png');

        $response = $this->followingRedirects()->put('/companies/' . $this->testCompany->id, [
            'name' => 'updated Idk',
            'email' => 'updatedIdk@gmail.com',
            'website' => 'updated.idk',
            'logo' => $updatedFile,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('companies', [
            'id' => $this->testCompany->id,
            'name' => 'updated Idk',
            'email' => 'updatedIdk@gmail.com',
            'website' => 'updated.idk',
        ]);
    }
}
