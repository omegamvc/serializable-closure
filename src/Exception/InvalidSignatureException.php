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

namespace Omega\SerializableClosure\Exception;

/*
 * @use
 */
use Exception;

/**
 * Invalid signature exception class.
 *
 * THe `InvalidSignaturesException` class thrown when the signature of a serialized closure
 * is invalid or modified.
 *
 * @category    Omega
 * @package     SerializableClosure
 * @subpackage  Exception
 *
 * @see        https://omegamvc.github.io
 *
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 *
 * @version     1.0.0
 */
class InvalidSignatureException extends Exception
{
    /**
     * InvalidSignatureException constructor.
     *
     * @param string $message Holds the exception message to throw.
     *
     * @return void
     */
    public function __construct(
        string $message = 'Your serialized closure might have been modified or it\'s unsafe to be unserialize.'
    ) {
        parent::__construct($message);
    }
}
