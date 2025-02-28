<?php

declare(strict_types=1);

namespace Honed\Core\Concerns;

trait Transformable
{
    /**
     * @var \Closure|null
     */
    protected $transformer = null;

    /**
     * Set the transformer function for the instance.
     *
     * @param  \Closure  $transformer
     * @return $this
     */
    public function transformer($transformer)
    {
        $this->transformer = $transformer;

        return $this;
    }

    /**
     * Determine if the instance has a transformer function set.
     *
     * @return bool
     */
    public function transforms()
    {
        return ! \is_null($this->transformer);
    }

    /**
     * Transform the argument using the transformer function.
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function transform($value)
    {
        return $this->transforms()
            ? \call_user_func($this->transformer, $value)
            : $value;
    }
}
