<?php

namespace Employees;

use App\Models\Employee;
use App\Models\User;
use Tests\TestCase;

class ShowEmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_employee(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin);
        $employee = Employee::create([
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'company_id' => 1,
            'email'  => 'employee@gmail.com',
            'phone'  =>'231423',
        ]);
        $response  = $this->get('/employees/' . $employee->id);
        $response->assertStatus(200);

    }
}
