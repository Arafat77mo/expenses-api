<?php

namespace Modules\Expenses\App\Observers;



use App\Models\User;
use Modules\Expenses\App\Models\Expense;
use Modules\Expenses\Notifications\ExpenseCreatedNotification;

class ExpenseObserver
{
    /**
     * Handle the ExpenseObserver "created" event.
     */
    public function created(Expense $expense): void {


       //User::query()->findOrFail(1)?->notify(new ExpenseCreatedNotification($expense));

    }

    /**
     * Handle the ExpenseObserver "updated" event.
     */
    public function updated(Expense $expenseobserver): void {}

    /**
     * Handle the ExpenseObserver "deleted" event.
     */
    public function deleted(Expense $expenseobserver): void {}

    /**
     * Handle the ExpenseObserver "restored" event.
     */
    public function restored(Expense $expenseobserver): void {}

    /**
     * Handle the ExpenseObserver "force deleted" event.
     */
    public function forceDeleted(Expense $expenseobserver): void {}
}
