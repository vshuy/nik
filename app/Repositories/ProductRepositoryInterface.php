<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

interface ProductRepositoryInterface
{
    public function index();
    public function indexPaginate(Request $request);
    public function search(Request $request);
    public function store(ProductCreateRequest $request);
    public function show(Request $request);
    public function update(ProductUpdateRequest $request);
    public function destroy(Request $request);
}
