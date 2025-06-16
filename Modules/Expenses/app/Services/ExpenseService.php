<?php

namespace Modules\Expenses\App\Services;




use Modules\Expenses\App\Models\Expense;

class ExpenseService
{

    public function getAll(array $filters)
    {
        return Expense::when($filters['category'] ?? null, fn($q, $v) => $q->where('category', $v))
            ->when($filters['from_date'] ?? null, fn($q, $v) => $q->whereDate('expense_date', '>=', $v))
            ->when($filters['to_date'] ?? null, fn($q, $v) => $q->whereDate('expense_date', '<=', $v))
            ->latest()
            ->get();
    }

    public function create(array $data): Expense
    {
        return Expense::create($data);
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    public function delete(Expense $expense): void
    {
        $expense->delete();
    }
}
