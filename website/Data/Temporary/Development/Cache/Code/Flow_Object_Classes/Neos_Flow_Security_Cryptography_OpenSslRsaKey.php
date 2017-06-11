<?php 
namespace Neos\Flow\Security\Cryptography;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */


/**
 * An RSA key
 *
 */
class OpenSslRsaKey_Original
{
    /**
     * @var string
     */
    protected $modulus;

    /**
     * @var string
     */
    protected $keyString;

    /**
     * Constructor
     *
     * @param string $modulus The HEX modulus
     * @param string $keyString The private key string
     */
    public function __construct($modulus, $keyString)
    {
        $this->modulus = $modulus;
        $this->keyString = $keyString;
    }

    /**
     * Returns the modulus in HEX representation
     *
     * @return string The modulus
     */
    public function getModulus()
    {
        return $this->modulus;
    }

    /**
     * Returns the key string
     *
     * @return string The key string
     */
    public function getKeyString()
    {
        return $this->keyString;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Security\Cryptography;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * An RSA key
 */
class OpenSslRsaKey extends OpenSslRsaKey_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param string $modulus The HEX modulus
     * @param string $keyString The private key string
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $modulus in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $keyString in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        call_user_func_array('parent::__construct', $arguments);
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __sleep()
    {
            $result = NULL;
        $this->Flow_Object_PropertiesToSerialize = array();

        $transientProperties = array (
);
        $propertyVarTags = array (
  'modulus' => 'string',
  'keyString' => 'string',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/php/Packages/Framework/Neos.Flow/Classes/Security/Cryptography/OpenSslRsaKey.php
#