<?php

namespace Tests\Feature\Company;
use App\Models\User;
use Tests\TestCase;

class IndexCompaniesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_all_companies(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $response = $this->get('/companies');
        $response->assertStatus(200);
    }
    public function test_create_companies_form(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $response = $this->get('/companies/create');
        $response->assertStatus(200);
    }
}
