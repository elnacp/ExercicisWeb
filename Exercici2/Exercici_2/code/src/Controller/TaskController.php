<?php

namespace ProjectesWeb\Controller;

use ProjectesWeb\Model\Repository\TasksRepository;
use ProjectesWeb\View\ViewHelper;
use Zend\Diactoros\Response;
use ProjectesWeb\Model\Entity\Task;

/**
 * Class TaskController
 * @package ProjectesWeb\lib\Controller
 */
class TaskController
{
    private $request;

    /**
     * @var TasksRepository
     */
    private $repository;

    /**
     * @var ViewHelper
     */
    private $viewHelper;





    /**
     * TaskController constructor.
     * @param $request
     * @param ViewHelper $viewHelper
     * @param TasksRepository $repository
     */
    public function __construct($request, TasksRepository $repository, ViewHelper $viewHelper)
    {
        $this->request = $request;
        $this->viewHelper = $viewHelper;
        $this->repository = $repository;
    }


    public function indexAction()
    {
        $tasks = $this->repository->getAll();
        $responseBody = $this->viewHelper->render('home', ['tasks' => $tasks]);
        $response = new Response();
        $response->getBody()->write($responseBody);
        return $response;
    }

    public function getAddTaskAction(){
        $responseBody = $this->viewHelper->renderAdd();
        $response = new Response();
        $response->getBody()->write($responseBody);
        return $response;
    }

    public function postAddTaskAction($dada){

        $last = $this->repository->getLastInsertedId();
        $num = $last +1;
        $task = $this->repository->createTask($num, $dada);
        $this->repository->save($task);
        header('Location: /');


    }

    public function removeTaskAction($id){
        $this->repository->delete($id);
        header('Location: /');
    }




}