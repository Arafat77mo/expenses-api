<?php

namespace Modules\Expenses\Tests\Unit;

use Tests\TestCase;

class ExpenseTest extends TestCase
{
    public function test_can_create_expense()
    {
        $data = [
            'title' => 'Test',
            'amount' => 123.45,
            'category' => 'Food',
            'expense_date' => '2024-01-01',
        ];

        $response = $this->postJson('/api/expenses', $data);
        $response->assertCreated()->assertJsonFragment(['title' => 'Test']);
    }

}
