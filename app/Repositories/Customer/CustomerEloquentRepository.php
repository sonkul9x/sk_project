<?php
namespace App\Repositories\Customer;

use App\Repositories\EloquentRepository;

class CustomerEloquentRepository extends EloquentRepository implements CustomerRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Customer::class;
    }        

}