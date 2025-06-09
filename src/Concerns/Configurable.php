<?php

declare(strict_types=1);

namespace Honed\Core\Concerns;

use Closure;

/**
 * @phpstan-require-extends \Honed\Core\Primitive
 */
trait Configurable
{
    /**
     * The configuration callback for the instance.
     *
     * @var (Closure(\Honed\Core\Primitive):\Honed\Core\Primitive|void)
     */
    protected static $configuration;

    /**
     * Provide the instance with any necessary setup.
     *
     * @return void
     */
    public function setUp()
    {
        $this->configure();
    }

    /**
     * Set the configuration for the instance.
     *
     * @param  (Closure(\Honed\Core\Primitive):\Honed\Core\Primitive|void)  $configuration
     * @return void
     */
    public static function configureUsing($configuration)
    {
        static::$configuration = $configuration;
    }

    /**
     * Configure the instance.
     *
     * @return void
     */
    public function configure()
    {
        if (static::$configuration) {
            (static::$configuration)($this);
        }
    }
}
