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

namespace Omega\SerializableClosure\Signers;

/**
 * Hmac class.
 *
 * The `Hmac` class implements the SignerInterface for signing and verifying serialized
 * closures using HMAC.
 *
 * @category    Omega
 * @package     SerializableClosure
 * @subpackage  Signers
 *
 * @see        https://omegamvc.github.io
 *
 * @author      Adriano Giovannini <agisoftt@gmail.com>
 * @copyright   Copyright (c) 2024 Adriano Giovannini. (https://omegamvc.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 *
 * @version     1.0.0
 */
class Hmac implements SignerInterface
{
    /**
     * The secret key.
     *
     * @var string Holds the secret string.
     */
    protected string $secret;

    /**
     * Creates a new signer instance.
     *
     * @param string $secret Holds the secret key to use for HMAC.
     *
     * @return void
     */
    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * {@inheritdoc}
     *
     * @param string $serialized Holds the serializable data to be signed.
     *
     * @return array Return an array containing the signature.
     */
    public function sign(string $serialized): array
    {
        return [
            'serializable' => $serialized,
            'hash'         => base64_encode(hash_hmac('sha256', $serialized, $this->secret, true)),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param array $signature Holds the signature to be verified.
     *
     * @return bool Return true if the signature is valid, false otherwise.
     */
    public function verify(array $signature): bool
    {
        return hash_equals(base64_encode(
            hash_hmac('sha256', $signature['serializable'], $this->secret, true)
        ), $signature['hash']);
    }
}
