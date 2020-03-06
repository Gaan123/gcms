<?php


namespace App\Repositories;

interface BaseRepositoriesInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get all By latest order
     * @return mixed
     */
    public function getAllLatest();
    /**
     * Get paginated data
     * @param $limit
     * @return mixed
     */
    public function getPaginate($limit);
    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);
    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);
    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);
    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
