<?php
namespace ProjectesWeb\Model\Repository;

use ProjectesWeb\Model\Entity\Task;

interface TasksRepository
{
    public function getLastInsertedId();

    public function save(Task $task);

    public function delete(int $id);

    public function update(Task $task);

    public function get(int $id);

    public function getAll();

    public function createTask(int $num, string $dada);
}

