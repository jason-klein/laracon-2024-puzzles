<?php

namespace Tests\Unit;

use App\Services\LaraconPuzzle1;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Storage;

class LaraconPuzzleTest extends TestCase
{
    public function test_puzzle_1_output(): void
    {
        $expected = Storage::get('laracon-puzzle-01-output.txt');

        $x = Storage::get('laracon-puzzle-01-input.txt');
        $actual = LaraconPuzzle1::solve($x);

        $this->assertEquals($expected, $actual);
    }
}
