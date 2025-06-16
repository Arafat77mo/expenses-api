<?php

namespace Modules\Expenses\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Expenses\App\Models\Expense;

class ExpenseCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(public Expense $expense) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'تم إنشاء مصروف جديد بعنوان: ' . $this->expense->title,
            'expense_id' => $this->expense->id,
            'amount' => $this->expense->amount,
            'category' => $this->expense->category,
            'date' => $this->expense->expense_date,
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('مصروف جديد')
            ->line('تم إنشاء مصروف جديد بعنوان: ' . $this->expense->title)
            ->action('عرض المصروف', url('/expenses/' . $this->expense->id));
    }
}
