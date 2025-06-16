<?php

namespace Modules\Expenses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Expenses\app\Http\Requests\StoreExpenseRequest;
use Modules\Expenses\app\Http\Requests\UpdateExpenseRequest;
use Modules\Expenses\App\Models\Expense;
use Modules\Expenses\App\Services\ExpenseService;
use Modules\Expenses\App\Traits\ApiResponse;
use Modules\Expenses\Transformers\ExpenseResource;

class ExpenseController extends Controller
{
    public function __construct(protected ExpenseService $service) {}

    use ApiResponse;

    public function index(Request $request)
    {
        return $this->success(ExpenseResource::collection($this->service->getAll($request->all())));
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = $this->service->create($request->validated());
        event(new \Modules\Expenses\Events\ExpenseCreated($expense));

        return $this->success(new ExpenseResource($expense), 'تم إنشاء المصروف بنجاح', Response::HTTP_CREATED);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $updated = $this->service->update($expense, $request->validated());

        return $this->success(new ExpenseResource($updated), 'تم تحديث المصروف بنجاح');
    }

    public function destroy(Expense $expense)
    {
        $this->service->delete($expense);
        return $this->success(null, 'تم حذف المصروف بنجاح', Response::HTTP_NO_CONTENT);
    }
}
