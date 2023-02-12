<?php

namespace Elviro\Reactable\Traits;

use App\Models\User;
use Elviro\Reactable\Models\Reactable as ModelsReactable;
use Elviro\Reactable\Models\Reaction;
use Exception;
use Illuminate\Support\Facades\DB;

trait Reactable
{

    public function reactions()
    {
        return $this->morphToMany(Reaction::class, 'reactable');
    }

    public function react($reaction, $reactor)
    {
        if (!$this->ensureReactionExists($reaction)) {
            throw new Exception('Reaction does not exists');
        }

        if (!$this->ensureReactorExists($reactor)) {
            throw new Exception('Reactor does not exists');
        }

        return DB::table($this->reactions()->getTable())
            ->updateOrInsert(
                [
                    'reactor_id' => $reactor,
                    'reactable_id' => $this->id
                ],
                [
                    'reactable_type' => self::class,
                    'reaction_id' => $reaction
                ]
            );
    }

    private function ensureReactionExists($reaction): bool
    {
        return Reaction::find($reaction) ? true : false;
    }

    private function ensureReactorExists($reactor): bool
    {
        return User::find($reactor) ? true : false;
    }
}
