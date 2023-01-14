<?php

namespace App\Observers;

use App\Models\consultation;
use App\Models\work;

class ConsultationObserver
{
    /**
     * Handle the consultation "created" event.
     *
     * @param  \App\Models\consultation  $consultation
     * @return void
     */
    public function created(consultation $consultation)
    {
        // 
    
        $id_product=$consultation->works_id;
        $work=work::find($id_product);
        $work->viewCounter++;
        $work->update();
        
    }

    /**
     * Handle the consultation "updated" event.
     *
     * @param  \App\Models\consultation  $consultation
     * @return void
     */
    public function updated(consultation $consultation)
    {
        //
       
    }

    /**
     * Handle the consultation "deleted" event.
     *
     * @param  \App\Models\consultation  $consultation
     * @return void
     */
    public function deleted(consultation $consultation)
    {
        //
    }

    /**
     * Handle the consultation "restored" event.
     *
     * @param  \App\Models\consultation  $consultation
     * @return void
     */
    public function restored(consultation $consultation)
    {
        //
    }

    /**
     * Handle the consultation "force deleted" event.
     *
     * @param  \App\Models\consultation  $consultation
     * @return void
     */
    public function forceDeleted(consultation $consultation)
    {
        //
    }
}
