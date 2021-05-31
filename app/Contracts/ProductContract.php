<?php
namespace App\Contracts;

interface ProductContract 
{
    /**
     * @param string $orderù
     * @param string $sort
     * @param array $column
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

     /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProduct(array $params);

     /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params);

     /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug);

    /**
     * @param array $data
     * @param string $sort
     * @param string $order 
     * @return mixed
     */
    public function filterProducts(array $data, string $sort = 'id', String $order = "asc", $limit=null);


     
}