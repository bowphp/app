<?php
namespace App\Controllers;

class UsersController extends Controller
{
    /**
     * Action permettant d'afficher la page d'index
     *
     * @return mixed
     */
    public function index()
    {
        // do something here
        return json(['message' => 'Merci d\'utiliser bow']);
    }

    /**
     * Action permettant d'ajouter un utilisateur
     *
     * @return mixed
     */
    public function add()
    {
        // do something here
    }

    /**
     * Action permettant de récupérer un utilisateur dans la base de donnée
     *
     * @param mixed $id
     * @return mixed
     */
    public function get($id)
    {
        // do something here.
    }

    /**
     * Action permettant de mettre à jour un utilisateur
     *
     * @param mixed $id
     * @return mixed
     */
    public function update($id)
    {
        // do something here
    }

    /**
     * Action permettant de supprimer un utilisateur
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        // do something here
    }
}