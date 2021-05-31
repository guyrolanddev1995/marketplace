<?php
namespace App\Contract;

/**
 * Interface BaseContract
 * @package App\contracts
 */

 interface BaseContract 
 {
    /**
     * Créer une instance de model
     * @param array $attruibutes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Mettre à jour une instanece de model
     * @param int $id
     * @param array $attributes
     */
    public function update(array $attributes, int $id);

    /**
     * Retourne toutes les  colonnes du model
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = ['*'], string $orderBy = 'id', $sortBy='desc');

    /**
     * rechercher par ID
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * rechercher par ID; sinon renvoi un exeception
     * @param int $id
     */
    public function findOrFail(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);

    /**
     * rechercher d'une element basé sur plusieurs colonnnes
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data);

    /**
    * rechercher d'une element basé sur plusieurs colonnnes ou renvoi une exception
    * @param array $id
    * @return mixed
    */
    public function findOneByOrFail(array $data);

   

    /**
     * supprime un element par son ID
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);
 }