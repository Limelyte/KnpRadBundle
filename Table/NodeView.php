<?php

namespace Knp\RadBundle\Table;

class NodeView
{
    protected $id;
    protected $item;
    protected $config;
    protected $table;

    public function __construct($id, $item = null, array $config = array())
    {
       $this->id     = $id;
       $this->item   = $item;
       $this->config = $config;
    }

    public function setTable(TableView $table)
    {
        $this->table = $table;
    }
}
