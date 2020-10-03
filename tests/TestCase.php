<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Test\Unit\Traits\AttachJwtToken;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    // use AttachJwtToken;
}
