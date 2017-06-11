<?php 
namespace Sandstorm\UserManagement\Domain\Validator;

use Sandstorm\UserManagement\Domain\Model\RegistrationFlow;
use Sandstorm\UserManagement\Domain\Service\RegistrationFlowValidationServiceInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Error\Messages\Result;
use Neos\Flow\ObjectManagement\ObjectManager;
use Neos\Flow\Security\AccountRepository;
use Neos\Flow\Validation\Error;
use Neos\Flow\Validation\Exception\InvalidValidationOptionsException;
use Neos\Flow\Validation\Validator\AbstractValidator;

/**
 * Validator for ensuring uniqueness of users, ensuring no new registration flows for existing users can be created.
 */
class RegistrationFlowValidator_Original extends AbstractValidator
{

    /**
     * @var AccountRepository
     * @Flow\Inject
     */
    protected $accountRepository;

    /**
     * @var ObjectManager
     * @Flow\Inject
     */
    protected $objectManager;

    /**
     * @param RegistrationFlow $value The value that should be validated
     * @return void
     * @throws InvalidValidationOptionsException
     */
    protected function isValid($value)
    {

        /** @noinspection PhpUndefinedMethodInspection */
        $existingAccount = $this->accountRepository->findOneByAccountIdentifier($value->getEmail());

        if ($existingAccount) {
            // todo: error message translatable
            $this->result->forProperty('email')->addError(
                new Error('Die Email-Adresse %s wird bereits verwendet!',
                    1336499566, [$value->getEmail()]));
        }

        // If a custom validation service is registered, call its validate method to allow custom validations during registration
        if ($this->objectManager->isRegistered(RegistrationFlowValidationServiceInterface::class)) {
            $instance = $this->objectManager->get(RegistrationFlowValidationServiceInterface::class);
            $instance->validateRegistrationFlow($value, $this);
        }
    }

    /**
     * The custom validation service might need to access the result directly, so it is exposed here
     *
     * @return Result
     */
    public function getResult()
    {
        return $this->result;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Sandstorm\UserManagement\Domain\Validator;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Validator for ensuring uniqueness of users, ensuring no new registration flows for existing users can be created.
 */
class RegistrationFlowValidator extends RegistrationFlowValidator_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     * @param array $options Options for the validator
     * @throws InvalidValidationOptionsException if unsupported options are found
     */
    public function __construct()
    {
        $arguments = func_get_args();
        call_user_func_array('parent::__construct', $arguments);
        if ('Sandstorm\UserManagement\Domain\Validator\RegistrationFlowValidator' === get_class($this)) {
            $this->Flow_Proxy_injectProperties();
        }
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
  'accountRepository' => 'Neos\\Flow\\Security\\AccountRepository',
  'objectManager' => 'Neos\\Flow\\ObjectManagement\\ObjectManager',
  'acceptsEmptyValues' => 'boolean',
  'supportedOptions' => 'array',
  'options' => 'array',
  'result' => 'Neos\\Error\\Messages\\Result',
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
        $this->Flow_Proxy_injectProperties();
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Security\AccountRepository', 'Neos\Flow\Security\AccountRepository', 'accountRepository', '8a496e58843e1121631cc3255b1e5e2d', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Security\AccountRepository'); });
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\ObjectManagement\ObjectManager', 'Neos\Flow\ObjectManagement\ObjectManager', 'objectManager', '66d1f3a489d7e20198fd72c8a5ef48ba', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\ObjectManagement\ObjectManager'); });
        $this->Flow_Injected_Properties = array (
  0 => 'accountRepository',
  1 => 'objectManager',
);
    }
}
# PathAndFilename: /var/www/php/Packages/Application/Sandstorm.UserManagement/Classes/Domain/Validator/RegistrationFlowValidator.php
#