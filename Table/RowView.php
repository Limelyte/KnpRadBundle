<?php

namespace Knp\RadBundle\Table;

class RowView extends NodeView
{
    protected $nodes;
    protected $item;

    public function __construct($id, $item = null, array $config = array())
    {
        parent::__construct($id, $config);

        $this->item  = $item;
        $this->nodes = array();
    }

    public function add(NodeView $node)
    {
        $node->setParent($this);
        $this->nodes[] = $node;
    }

    public function getNodes()
    {
        return $this->nodes;
    }

    public function getItem()
    {
        return $this->item;
    }

    protected function getDefaultConfig()
    {
        return array(
            'tag' => 'tr',
        );
    }
}
