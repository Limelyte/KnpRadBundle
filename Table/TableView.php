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
        $this->headers = new RowView('head');
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

    public function getRenderedBlockNames()
    {
        $names = array(
            sprintf('_%s', $this->config['tag']),
        );

        if (null !== $this->name) {
            $names[] = sprintf('_%s_%s', $this->config['tag'], $this->name);
        }

        return $names;
    }

    protected function getDefaultConfig()
    {
        return array(
            'tag' => 'table',
        );
    }
}
