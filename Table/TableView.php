<?php

namespace Knp\RadBundle\Table;

class TableView extends NodeView
{
    protected $name;
    protected $headers;
    protected $rows;
    protected $items;

    public function __construct($name, $items, $mapping)
    {
        parent::__construct('table', array('mapping' => $mapping));

        $this->name    = $name;
        $this->items   = $items;
        $this->headers = new RowView('header');
        $this->rows    = array();

        $this->headers->setParent($this);
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function addHeader(NodeView $header)
    {
        $this->headers->add($header);
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function addRow(RowView $row)
    {
        $row->setParent($this);
        $this->rows[] = $row;
    }

    public function getItem()
    {
        return null;
    }

    public function getParent()
    {
        return null;
    }

    public function getItems()
    {
        return $this->items;
    }

    protected function getBlockSuffixes()
    {
        $names = array();

        if (null !== $this->name) {
            $names[] = $this->name;
        }

        $names[] = $this->config['tag'];

        return $names;
    }

    protected function getDefaultConfig()
    {
        return array(
            'tag' => 'table',
        );
    }
}
