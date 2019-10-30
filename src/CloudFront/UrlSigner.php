<?php

namespace Dreamonkey\CloudFrontUrlSigner\CloudFront;

use Aws\CloudFront\UrlSigner as BaseUrlSigner;

/**
 * Creates signed URLs for Amazon CloudFront resources.
 */
class UrlSigner extends BaseUrlSigner
{
    protected $signer;

    /**
     * @param $keyPairId  string ID of the key pair
     * @param $privateKey string Path to the private key used for signing
     *
     * @throws \RuntimeException if the openssl extension is missing
     * @throws \InvalidArgumentException if the private key cannot be found.
     */
    public function __construct($keyPairId, $privateKey)
    {
        $this->signer = new Signer($keyPairId, $privateKey);
    }
}
