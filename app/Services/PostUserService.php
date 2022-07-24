<?php

namespace App\Services;

use App\Repositories\PostUserRepository;
use InvalidArgumentException;


class PostUserService
{

    public function __construct(protected PostUserRepository $repository)
    {
    }

    public function CreateService($request)
    {

        return $this->repository->store($request);
    }

    public function updateService($request, $id)
    {

        if (auth()->user()->post()->find($id) == null) {
            throw new InvalidArgumentException('Not Found');
        };

        return $this->repository->update($request, $id);
    }

    public function deleteService($id)
    {

        if (auth()->user()->post()->find($id) == null) {
            throw new InvalidArgumentException('Not Found');
        };

        return $this->repository->destroy($id);
    }
}
