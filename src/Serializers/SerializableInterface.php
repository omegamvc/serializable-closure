<?php

/**
 * Part of Omega - Serializable Closure Package.
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

namespace Omega\SerializableClosure\Serializers;

/*
 * @use
 */
use Closure;

/**
 * Interface for serializable closures in Omega.
 *
 * The `SerializableInterface` defines methods that should be implemented by classes
 * aiming to serialize closures in Omega.
 *
 * @category    Omega
 * @package     SerializableClosure
 * @subpackage  Serializers
 *
 * @see        https://omegamvc.github.io
 *
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 *
 * @version     1.0.0
 */
interface SerializableInterface
{
    /**
     * Resolve the closure with the given arguments.
     *
     * @return mixed Return the result of the closure invocation.
     */
    public function __invoke(): mixed;

    /**
     * Gets the closure that got serialized/unserialize.
     *
     * @return Closure Return the serialized/unserialize closure.
     */
    public function getClosure(): Closure;
}
