<?php

namespace Elviro\Reactable\Models;

use App\Models\User;
use Elviro\Reactable\Contracts\Reactable;
use Elviro\Reactable\Models\ModelReaction;
use Elviro\Reactable\Traits\Reactable as ReactableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function reactor()
    {
        return $this->belongsToMany(User::class, 'reactables', 'reaction_id', 'reactor_id');
    }
}
