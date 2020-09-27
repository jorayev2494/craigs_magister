<?php


namespace App\Jobs\Interfaces;


interface IQueueNames {
    public const DEFAULT = 'default';

    public const EMAILS = 'emails';

    public const DEVICES = 'devices';

    public const JOBS = 'jobs'; // Default laravel queues
}