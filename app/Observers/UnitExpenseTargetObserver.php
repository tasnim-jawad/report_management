<?php

namespace App\Observers;

use App\Models\Bm\Expense\UnitExpenseTarget;
use App\Models\Bm\Expense\UnitExpenseTargetLog;
use Carbon\Carbon;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class UnitExpenseTargetObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the UnitExpenseTarget "created" event.
     */
    public function created(UnitExpenseTarget $unitExpenseTarget): void
    {
        $this->logEvent($unitExpenseTarget, 'create');
    }
    /**
     * Handle the UnitExpenseTarget "updated" event.
     */
    public function updated(UnitExpenseTarget $unitExpenseTarget): void
    {
        $this->logEvent($unitExpenseTarget, 'update');
    }

    /**
     * Handle the UnitExpenseTarget "deleted" event.
     */
    public function deleted(UnitExpenseTarget $unitExpenseTarget): void
    {
        $this->logEvent($unitExpenseTarget, 'delete');
    }

    /**
     * Handle the UnitExpenseTarget "restored" event.
     */
    public function restored(UnitExpenseTarget $unitExpenseTarget): void
    {
        //
    }

    /**
     * Handle the UnitExpenseTarget "force deleted" event.
     */
    public function forceDeleted(UnitExpenseTarget $unitExpenseTarget): void
    {
        //
    }




    private function logEvent(UnitExpenseTarget $unitExpenseTarget, string $action): void
    {
        $current_date = Carbon::now();

        $data = new UnitExpenseTargetLog();
        $data->unit_expense_targets_id = $unitExpenseTarget->id;
        $data->created_date = $current_date;
        $data->action = $action; // Action type: create, update, delete
        $data->model = UnitExpenseTarget::class; // Name of the model
        $data->model_id = $unitExpenseTarget->id; // ID of the affected model
        $data->payload = json_encode($unitExpenseTarget->toArray()); // Data changes or details

        $data->creator = auth()->check() ? auth()->id() : null;
        $data->save();
    }
}
