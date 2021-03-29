<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer as ManufacturerModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Manufacturer as ManufacturerResource;

class ManufacturerController extends BaseController
{
    public function index()
    {
        $manufacturers = ManufacturerModel::all();

        return $this->sendResponse(ManufacturerResource::collection($manufacturers), 'Manufacturers retrieved successfully');
    
    }

    public function show($id)
    {
        $manufacturer = ManufacturerModel::find($id);
        if(is_null($manufacturer)){
            return $this->sendError('Manufacturer not found.');
        }
        return $this->sendResponse(new ManufacturerResource($manufacturer), 'Manufacturer retrievd successfully');

    }
}
