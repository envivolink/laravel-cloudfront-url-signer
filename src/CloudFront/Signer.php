<?php

namespace Dreamonkey\CloudFrontUrlSigner\CloudFront;

use Aws\CloudFront\Signer as BaseSigner;

class Signer extends BaseSigner
{
    protected $keyPairId;
    protected $pkHandle;

    /**
     * A signer for creating the signature values used in CloudFront signed URLs
     * and signed cookies.
     *
     * @param $keyPairId  string ID of the key pair
     * @param $privateKey string Path to the private key used for signing
     *
     * @throws \RuntimeException if the openssl extension is missing
     * @throws \InvalidArgumentException if the private key cannot be found.
     */
    public function __construct($keyPairId, $privateKey)
    {
        if (!extension_loaded('openssl')) {
            //@codeCoverageIgnoreStart
            throw new \RuntimeException('The openssl extension is required to '
                                        . 'sign CloudFront urls.');
            //@codeCoverageIgnoreEnd
        }

        $this->keyPairId = $keyPairId;

        if (!file_exists($privateKey)) {
            throw new \InvalidArgumentException("PK file not found: $privateKey");
        }

        $this->pkHandle = openssl_pkey_get_private("file://$privateKey");

        if (!$this->pkHandle) {
            throw new \InvalidArgumentException(openssl_error_string());
        }
    }
}
