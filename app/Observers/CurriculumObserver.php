<?php

namespace App\Observers;

use App\Models\Curriculum;
use Illuminate\{Support\Facades\Mail};
use App\Mail\CurriculumMail;

class CurriculumObserver
{
    /**
     * Handle the Curriculum "created" event.
     */
    public function created(Curriculum $curriculum): void
    {
        //
        Mail::to('fake@gmail.com')->send(new CurriculumMail());
    }

    /**
     * Handle the Curriculum "updated" event.
     */
    public function updated(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "deleted" event.
     */
    public function deleted(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "restored" event.
     */
    public function restored(Curriculum $curriculum): void
    {
        //
    }

    /**
     * Handle the Curriculum "force deleted" event.
     */
    public function forceDeleted(Curriculum $curriculum): void
    {
        //
    }
}
