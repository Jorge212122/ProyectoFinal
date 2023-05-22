<?php

namespace App\Observers;

use App\Models\Chapter;
use App\Models\Season;

class ChapterObserver
{
    /**
     * Handle the Chapter "created" event.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function created(Chapter $chapter)
    {        
        $season = Season::find($chapter->season_id);
        $season->chapters++;
        $season->save();
    }

    /**
     * Handle the Chapter "updated" event.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function updated(Chapter $chapter)
    {
        //
    }

    /**
     * Handle the Chapter "deleted" event.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function deleted(Chapter $chapter)
    {
        $season = Season::find($chapter->season_id);
        $season->chapters--;
        $season->save();
    }

    /**
     * Handle the Chapter "restored" event.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function restored(Chapter $chapter)
    {
        //
    }

    /**
     * Handle the Chapter "force deleted" event.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return void
     */
    public function forceDeleted(Chapter $chapter)
    {
        //
    }
}
