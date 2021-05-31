<?php 
namespace App\Contracts;

interface OrderContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array  $column
     * @return mixed
     */
    public function listOrders(string $order = 'id', string $sort = 'desc', array $column = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrderById(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneOrderBy(array $data);
}