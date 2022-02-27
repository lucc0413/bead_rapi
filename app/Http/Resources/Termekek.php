<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Termekek extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
           "string"=>$this->string,
           "integer"=>$this->integer,
           "string"=>$this->string,
           "timestamp"=>$this->created_at->format("m/d/Y"),


       ];
    }
}
