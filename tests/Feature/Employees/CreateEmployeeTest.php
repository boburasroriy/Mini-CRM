<?php

namespace Tests\Feature\Employees;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Tests\TestCase;

class CreateEmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_employees_by_admin(): void
    {
        $admin  = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);

        $response = $this->post('/employees', [
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'company_id' => 1,
            'email'  => 'employee@gmail.com',
            'phone'  =>'234234',
        ]);
        $this->assertDatabaseHas( 'employees', [
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'email'  => 'employee@gmail.com',
            'phone'  =>'234234',
        ]);
        $response->assertRedirect(route('employees.index'));
    }
}
