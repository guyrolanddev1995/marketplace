<?php
namespace App\Contracts;

interface CategoryContract 
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order = "id", string $sort = "desc", array $columns = ['*']);


    /**
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function createCategory(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function updateCategory(array $data);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategory($id);

    /**
    * @param $slug
    * @return mixed
    */
    public function findBySlug($slug);

    /**
     * @return mixed
     */
    public function treeList();


    /**
     * @param string $slug
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function filterCatWithParentID(string $slug);

     /**
     * @param string $slug
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function filterCatWithoutParentID(string $slug);

    /**
     * @return mixed
     */
    public function getFacturedCategories();

    /**
     * @param string $slug
     * @param string $sort
     * @return mixed
     */
    public function filterCategoryProducts($slug, $sort);

    /**
     * @param string $string
     * @param int $min 
     * @param int $max
     * @return mixed
     */
    public function filterProductByPrice($slug, $min, $max);

    /**
     * recuperer la liste des produits d'une categorie à afficher sur la boutique
     * @return mixed
     */
    public function getDisplayedCategories();

    /**
     * Trier les produits par categories et mmarques
     * @param string $cat_slug
     * @param string $brand_slug
     * @return mixed
     */
    public function filterProductsByCatWithBrand(string $cat_slug, string $brand_slug);


    public function getQueryBuilder($slug);
}