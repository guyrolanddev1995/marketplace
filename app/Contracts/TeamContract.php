<?php
namespace App\Contracts;


interface TeamContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $column
     * @return mixed
     */
    public function teamList(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

     /**
     * @param int $id
     * @return mixed
     */
    public function findTeamById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTeam(array $params);

     /**
     * @param array $params
     * @return mixed
     */
    public function updateTeam(array $params, $id);

     /**
     * @param $id
     * @return bool
     */
    public function deleteTeam($id);
}