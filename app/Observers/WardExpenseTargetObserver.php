<?php

namespace App\Observers;

use App\Models\Bm\Ward\Expense\WardExpenseTarget;
use App\Models\Bm\Ward\Expense\WardExpenseTargetLog;
use Carbon\Carbon;

class WardExpenseTargetObserver
{
    /**
     * Handle the WardExpenseTarget "created" event.
     */
    public function created(WardExpenseTarget $ward_expense_target): void
    {
        $this->logEvent($ward_expense_target, 'create');
    }
    /**
     * Handle the WardExpenseTarget "updated" event.
     */
    public function updated(WardExpenseTarget $ward_expense_target): void
    {
        $this->logEvent($ward_expense_target, 'update');
    }

    /**
     * Handle the WardExpenseTarget "deleted" event.
     */
    public function deleted(WardExpenseTarget $ward_expense_target): void
    {
        $this->logEvent($ward_expense_target, 'delete');
    }

    /**
     * Handle the WardExpenseTarget "restored" event.
     */
    public function restored(WardExpenseTarget $ward_expense_target): void
    {
        //
    }

    /**
     * Handle the WardExpenseTarget "force deleted" event.
     */
    public function forceDeleted(WardExpenseTarget $ward_expense_target): void
    {
        //
    }




    private function logEvent(WardExpenseTarget $ward_expense_target, string $action): void
    {
        $current_date = Carbon::now();

        $data = new WardExpenseTargetLog();
        $data->ward_expense_targets_id = $ward_expense_target->id;
        $data->created_date = $current_date;
        $data->action = $action; // Action type: create, update, delete
        $data->model = WardExpenseTarget::class; // Name of the model
        $data->model_id = $ward_expense_target->id; // ID of the affected model
        $data->payload = json_encode($ward_expense_target->toArray()); // Data changes or details

        $data->creator = auth()->check() ? auth()->id() : null;
        $data->save();
    }
}
