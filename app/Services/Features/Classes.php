<?php

namespace App\Services\Features;

use App\Services\Service;

class Classes extends Service
{

    public function index()
    {
        $response = $this->get('/classes');

        return $this->showResponse($response);
    }

    public function store(array $data)
    {
        $response = $this->post('/classes', $data);

        return $this->showResponse($response);
    }

    public function show($id)
    {
        $response = $this->get("/classes/$id");

        return $this->showResponse($response);
    }

    public function storeUpdate($id, array $data)
    {
        $response = $this->patch("/classes/$id", $data);

        return $this->showResponse($response);
    }

}
