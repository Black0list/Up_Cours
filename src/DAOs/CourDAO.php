<?php

namespace App\DAOs;


class CourDAO extends GenericDAO
{

    private static $Db;

    public function __construct()
    {
        
    }
    public function TableName(): string
    {
        return "cours";
    }

    public function getAttributes(): array{
        return ['id', 'role_name', 'description'];
    }
    
}




