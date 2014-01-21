<?php

namespace Knp\RadBundle\Table;

class NodeView implements NodeViewInterface
{
    protected $id;
    protected $config;
    protected $parent;

    public function __construct($id, array $config = array())
    {
       $this->id     = $id;
       $this->config = array_merge($config, $this->getDefaultConfig());
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(NodeViewInterface $parent)
    {
        $this->parent = $parent;
    }

    public function getItem()
    {
        return $this->parent->getItem();
    }

    public function getRenderedBlockNames()
    {
        $suffixes = array(
            sprintf('%s_%s', $this->config['tag'], str_replace('.', '_', strtolower($this->id))),
            $this->config['tag'],
        );

        $names = array();

        foreach ($suffixes as $suffixe) {
            foreach ($this->parent->getRenderedBlockNames() as $name) {
                $names[] = sprintf('%s_%s', $name, $suffixe);
            }
        }

        return $names;
    }

    protected function getDefaultConfig()
    {
        return array(
            'tag' => 'td',
        );
    }
}
