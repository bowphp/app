<?php
namespace Bow\Validation;

use Bow\Http\Request;
use BadMethodCallException;

abstract class ValidationRequest
{
    /**
     * Règle
     *
     * @var array
     */
    protected $rules = [];

    /**
     * @var array
     */
    protected $keys = ['*'];

    /**
     * @var Validate
     */
    private $validate;

    /**
     * @var array
     */
    private $data;

    /**
     * @var Request
     */
    private $request;

    /**
     * TodoValidation constructor.
     *
     * @return void
     */
    public function __construct()
    {
        if (!$this->authorized()) {
            return $this->authorizationFailAction();
        }

        $this->request = new Request();

        if ((count($this->keys) == 1 && $this->keys[0] === '*') || count($this->keys) == 0) {
            $this->data = $this->request->input()->all();
        } else {
            $this->data = $this->request->input()->excepts($this->keys);
        }

        $this->validate = Validator::make($this->data, $this->rules);

        if ($this->validate->fails()) {
            return $this->validationFailAction();
        }
    }

    /**
     * @return bool
     */
    protected function authorized()
    {
        return true;
    }

    /**
     * Quand l'utilisateur n'a pas l'authorization de lance cette requête
     * C'est la methode qui est lancer pour bloquer l'utilisateur
     */
    protected function authorizationFailAction()
    {
        abort(500);
    }

    /**
     * Quand l'utilisateur n'a pas l'authorization de lance cette requête
     * C'est la methode qui est lancer pour bloquer l'utilisateur
     */
    protected function validationFailAction()
    {
        abort(500);
    }

    /**
     * Permet de verifier si la réquete
     */
    protected function fails()
    {
        return $this->validate->fails();
    }

    /**
     * Permet de récupérer le validateur
     *
     * @return Validate
     */
    protected function getValidation()
    {
        return $this->validate;
    }

    /**
     * Permet de récupérer le message du de la dernier erreur
     *
     * @return string
     */
    protected function getMessage()
    {
        return $this->validate->getLastMessage();
    }

    /**
     * Permet de récupérer tout les messages d'erreur
     *
     * @return array
     */
    protected function getMessages()
    {
        return $this->validate->getMessages();
    }

    /**
     * Permet de récupérer les données de la validation
     *
     * @return array
     */
    protected function getValidationData()
    {
        return $this->data;
    }

    /**
     * Permet de lancer une exception
     *
     * @throws \Bow\Validation\Exception\ValidationException;
     */
    protected function throwError()
    {
        $this->validate->throwError();
    }

    /**
     * __call
     *
     * @param string $name
     * @param array $arguments
     * @return Request
     */
    public function __call($name, array $arguments)
    {
        if (method_exists($this->request, $name)) {
            return call_user_func_array([$this->request, $name], $arguments);
        }

        throw new BadMethodCallException('La methode '. $name.' n\'est pas défini.');
    }

    /**
     * __get
     *
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
        return $this->request->$name;
    }
}