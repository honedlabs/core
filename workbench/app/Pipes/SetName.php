<?php

declare(strict_types=1);

namespace Workbench\App\Pipes;

use Honed\Core\Pipe;

/**
 * @extends Pipe<\Workbench\App\Classes\Component>
 */
class SetName extends Pipe
{
    /**
     * Run the pipe logic.
     */
    public function run(): void
    {
        $this->instance->name('Executed');
    }
}
