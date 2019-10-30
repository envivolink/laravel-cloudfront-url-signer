<?php

return [
    /*
     * The default expiration time of a URL in days.
     */
    'default_expiration_time_in_days' => 1,

    /*
     * Cache the private key and use an extended AWS Signer.
     */
    'cache_private_key' => true,

    /*
     * The private key used to sign all URLs.
     */
    'private_key_path' => storage_path(env('CLOUDFRONT_PRIVATE_KEY_PATH', 'trusted-signer.pem')),

    /*
     * Identifies the CloudFront key pair associated
     * to the trusted signer which validates signed URLs.
     */
    'key_pair_id' => env('CLOUDFRONT_KEY_PAIR_ID', ''),

    /*
     * CloudFront API version, by default it uses the latest available.
     */
    'version' => env('CLOUDFRONT_API_VERSION', 'latest'),

];
