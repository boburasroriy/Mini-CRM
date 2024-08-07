<?php

namespace Tests\Feature\Employees;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexEmployeesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_all_employees(): void
    {
        $admin  = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $response = $this->get('/employees');
        $response->assertStatus(200);
    }
    public function test_create_page_index(): void{
        $admin  =User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $response = $this->get('/employees/create');
        $response->assertStatus(200);
    }
}
