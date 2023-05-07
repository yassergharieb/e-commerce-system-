<?php
namespace App\Repositories;
use App\Http\Interfaces\RepositoryInterface;



class Repository implements RepositoryInterface  {



    protected $model;


    public function __construct($model)
    {
          $this->model =  $model;
    }



    public function all() {

        $this->model->all();

    }


    public function  create($data) {
        $this->model->create($data);
    }

    public function update($data, $id) {

         $record =  $this->model->find($id);
         return $record->update($data);

    }

    public function delete($id) {
        $record =  $this->model->find($id);
        return $record->delete();
    }

    public function show($id) {
        $record =  $this->model->findOrfail($id);
        return $record;
    }

    public function getModel() {
          return $this->model;

    }


    public function setModel($model) {
        return $this->model = $model;

   }


   public function with($relations) {
    return $this->model->with($relations);

}





}
