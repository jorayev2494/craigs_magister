<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Traits\AttachJwtToken;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use AttachJwtToken;
}
