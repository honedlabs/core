<?php

declare(strict_types=1);

namespace Honed\Core\Concerns;

use Closure;
use Illuminate\Database\Eloquent\Builder;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model = \Illuminate\Database\Eloquent\Model
 * @template TBuilder of \Illuminate\Database\Eloquent\Builder<TModel> = \Illuminate\Database\Eloquent\Builder<TModel>
 */
trait CanQuery
{
    /**
     * The query closure to modify the Eloquent builder.
     *
     * @var (Closure():mixed)|null
     */
    protected $query;

    /**
     * Set a callback to modify the Eloquent builder.
     *
     * @param  (Closure():mixed)|null  $callback
     * @return $this
     */
    public function query(?Closure $callback): static
    {
        $this->query = $callback;

        return $this;
    }

    /**
     * Get the callback to modify the Eloquent builder.
     *
     * @return (Closure():mixed)|null
     *
     * @internal
     */
    public function queryCallback(): ?Closure
    {
        return $this->query;
    }

    /**
     * Call the callback to modify the Eloquent builder.
     *
     * @param  array<string, mixed>  $named
     * @param  array<class-string, mixed>  $typed
     */
    public function callQuery(array $named = [], array $typed = []): mixed
    {
        return $this->evaluate($this->queryCallback(), $named, $typed);
    }
}
