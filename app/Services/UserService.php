<?php

namespace App\Services;

use App\Repositories\UserRepository;
use InvalidArgumentException;


class UserService
{

    public function __construct(protected UserRepository $repository)
    {
    }

   

    public function updateService($request)
    {
        return $this->repository->update($request);
    }

    public function deleteService()
    {
        return $this->repository->destroy();
    }
}
