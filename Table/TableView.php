<?php

namespace Knp\RadBundle\Table;

class TableView
{
    protected $name;
    protected $headers;
    protected $rows;

    public function __construct($name, $items, $mapping)
    {
        $this->name    = $name;
        $this->items   = $items;
        $this->headers = array();
        $this->rows    = array();
    }

    public function addHeader(NodeView $header)
    {
        $this->headers[] = $header;
        $header->setTable($this);
    }

    public function addRow(array $row)
    {
        foreach ($row as $cell) {
            if (!($cell instanceof NodeView)) {
                throw new \Exception(sprintf('TableView expect NodeView as row element, "%s" given', get_class($cell)));
            }
            $cell->setTable($this);
        }
        $this->rows[] = $row;
    }
}
