<?php

/**
 * Part of Omega CMS - Serializable Closure Package.
 *
 * @see       https://omegamvc.github.io
 *
 * @author     Adriano Giovannini <agisoftt@gmail.com>
 * @copyright  Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/*
 * @declare
 */
declare(strict_types=1);

/**
 * @namespace
 */

namespace Omega\SerializableClosure;

/*
 * @use
 */
use function call_user_func_array;
use function func_get_args;
use Closure;
use Omega\SerializableClosure\Serializers\SerializableInterface;
use Omega\SerializableClosure\Serializers\Native;

/**
 * Unsigned serializable closure class.
 *
 * The `UnsignedSerializableClosure` class implements an unsigned serializable closure, allowing
 * closures to be serialized without cryptographic signatures. This class provides methods to create,
 * resolve, and serialize closures.
 *
 * @category    Omega
 * @package     SerializableClosure
 *
 * @see        https://omegamvc.github.io
 *
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 *
 * @version     1.0.0
 */
class UnsignedSerializableClosure
{
    /**
     * The closure's serializable.
     *
     * @var SerializableInterface Holds the closure's serializable.
     */
    protected SerializableInterface $serializable;

    /**
     * Creates a new serializable closure instance.
     *
     * @param Closure $closure Holds the current Closure object.
     *
     * @return void
     */
    public function __construct(Closure $closure)
    {
        $this->serializable = new Native($closure);
    }

    /**
     * Resolve the closure with the given arguments.
     *
     * @return mixed
     */
    public function __invoke(): mixed
    {
        return call_user_func_array($this->serializable, func_get_args());
    }

    /**
     * Gets the closure.
     *
     * @return Closure Return the original closure.
     */
    public function getClosure(): Closure
    {
        return $this->serializable->getClosure();
    }

    /**
     * Get the serializable representation of the closure.
     *
     * @return array Return an array of serializable representation of the closure.
     */
    public function __serialize(): array
    {
        return [
            'serializable' => $this->serializable,
        ];
    }

    /**
     * Restore the closure after serialization.
     *
     * @param array $data Holds an array of the closure data for restore.
     *
     * @return void
     */
    public function __unserialize(array $data): void
    {
        $this->serializable = $data['serializable'];
    }
}
