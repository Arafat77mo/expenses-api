<?php

namespace Tests\Feature;

use Modules\Expenses\App\Models\Expense;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_filter_expenses_by_category_and_date_range()
    {
        // Arrange: create test data
        Expense::factory()->create([
            'category' => 'food',
            'expense_date' => '2024-01-10',
        ]);

        Expense::factory()->create([
            'category' => 'transport',
            'expense_date' => '2024-01-20',
        ]);

        Expense::factory()->create([
            'category' => 'food',
            'expense_date' => '2023-12-25',
        ]);

        // Act: call API with filters
        $response = $this->getJson('/api/v1/expenses?category=food&from_date=2024-01-01&to_date=2024-01-31');

        // Assert: API returns only one expense
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data');

        $response->assertJsonFragment([
            'category' => 'food',
        ]);
    }
}
