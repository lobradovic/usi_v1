<?php

namespace Tests\Unit;
use App\Models\Status;
use PHPUnit\Framework\TestCase;

class statusTest extends TestCase
{
    public function testStatus()
    {
        $status = new Status([
            'naziv_statusa' => 'test',
        ]);

        $this->assertEquals('test', $status->naziv_statusa);
    }
}