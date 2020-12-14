<?php

namespace App\Console\Commands;

use App\Console\Commands\Base\ICommands;
use App\Events\Broadcast\Debug\TestEvent;
use Illuminate\Console\Command;

class PushDebugSocketsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = ICommands::SEND_TEST_SOCKETS;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info('PushDebugSocketsCommand: ', [__METHOD__]);
        // TestEvent::broadcast();
        broadcast(new TestEvent('schedule-command'));
        return 0;
    }
}
