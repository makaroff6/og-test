<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Services\GoodService;
use App\Requests\GoodRequest;
use Illuminate\Routing\Controller as BaseController;

class GoodController extends BaseController
{
    private $storeService;

    private function __construct(GoodService $storeService) 
    {
        $this->storeService = $storeService;
    }

    public function index()
    {
        return Good::all();
    }


    public function show(int $id): Good
    {
        return Good::findOrFail($id);
    }
    

    public function create(GoodRequest $request): Good
    {
        return $this->storeService->create($request->validated());
    }
    

    public function update(int $id, GoodRequest $request): Good
    {
        return $this->storeService->update($id, $request->validated());
    }
    
    public function delete(int $id)
    {
        return $this->storeService->delete($id);
    }
}
