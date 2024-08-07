<?php

namespace Tests\Feature\Employees;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateEmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_employee_can_be_updatable_by_admin(): void
    {
        $admin  = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $this->user = Employee::create([
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'company_id' => 1,
            'email'  => 'employee@gmail.com',
            'phone'  =>'23412412',
        ]);
        $response = $this->followingRedirects()->put('/employees/' . $this->user->id , [
            'first_name' => 'updated',
            'last_name' => 'updated',
            'company_id' => 1,
            'email'  => 'updated@gmail.com',
            'phone'  =>'5555',
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('employees', [
            'id' => $this->user->id,
            'first_name' => 'updated',
            'last_name' => 'updated',
            'email'  => 'updated@gmail.com',
            'phone'  =>'5555',
        ] );

    }
}
