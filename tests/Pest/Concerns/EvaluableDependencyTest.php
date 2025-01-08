<?php

declare(strict_types=1);

use Honed\Core\Concerns\Evaluable;
use Honed\Core\Concerns\EvaluableDependency;
use Honed\Core\Concerns\HasDescription;
use Honed\Core\Concerns\HasName;

class EvaluableDependencyTest
{
    use Evaluable;
    use EvaluableDependency;
    use HasDescription;
    use HasName;
}

beforeEach(function () {
    $this->test = new EvaluableDependencyTest;
});

it('evaluates', function () {})->todo();
