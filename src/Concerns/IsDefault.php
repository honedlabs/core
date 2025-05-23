<?php

declare(strict_types=1);

namespace Honed\Core\Concerns;

trait IsDefault
{
    /**
     * Whether it is the default.
     *
     * @default false
     *
     * @var bool
     */
    protected $default = false;

    /**
     * Set as the default.
     *
     * @param  bool  $default
     * @return $this
     */
    public function default($default = true)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Determine if it is the default.
     *
     * @return bool
     */
    public function isDefault()
    {
        return $this->default;
    }
}
