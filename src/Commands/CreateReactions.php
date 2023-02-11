<?php

namespace Elviro\Reactable\Commands;

use Elviro\Reactable\Models\Reaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CreateReactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reactable:create-reactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create reactions';


    public function handle()
    {
        Reaction::insert(config('reactable.reactions'));

        $this->info('Reactions created!');
    }
}
