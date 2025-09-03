<?php

class Player{
    use Model;

    protected $table = 'players';
    protected $allowedColumns = ['id','name', 'No',];

    protected $primaryKey = 'id';
}