<?php

namespace Company;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Models\Companies;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateCompanyTest extends TestCase
{
    public function test_company_can_be_updatable_by_admin_user(): void
    {
        // Create an admin user and act as that user
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        // Create a company with an initial logo
        $file = UploadedFile::fake()->image('logo.png');
        $this->testCompany = Companies::create([
            'name' => 'idk',
            'email' => 'Idk@gmail.com',
            'website' => 'Idk',
            'logo' => $file->storeAs('logos', 'logo.png', 'public'),
        ]);

        // Prepare new data for the update
        $updatedFile = UploadedFile::fake()->image('updated.png');

        // Send PUT request to update the company
        $response = $this->followingRedirects()->put('/companies/' . $this->testCompany->id, [
            'name' => 'updated Idk',
            'email' => 'updatedIdk@gmail.com',
            'website' => 'updated.idk',
            'logo' => $updatedFile,
        ]);

        // Assert response status
        $response->assertStatus(200);

        // Verify that the company has been updated in the database
        $this->assertDatabaseHas('companies', [
            'id' => $this->testCompany->id,
            'name' => 'updated Idk',
            'email' => 'updatedIdk@gmail.com',
            'website' => 'updated.idk',
        ]);
    }
}
