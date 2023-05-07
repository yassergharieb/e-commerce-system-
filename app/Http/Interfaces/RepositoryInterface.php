<?php

namespace App\Http\Interfaces;
interface RepositoryInterface {

    public function all();
    public function create($date);

    public function update($date , $id);

    public function delete($id);

    public function show($id);







}
