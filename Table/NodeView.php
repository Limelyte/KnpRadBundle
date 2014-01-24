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
       $this->config = array_merge($this->getDefaultConfig(), $config);
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
        $names = array();

        foreach ($this->getBlockSuffixes() as $suffixe) {
            if (null !== $this->parent) {
                foreach ($this->parent->getRenderedBlockNames() as $name) {
                    $names[] = sprintf('%s_%s', $name, $suffixe);
                }
            } else {
                $names[] = sprintf('_%s', $suffixe);
            }
        }

        return $names;
    }

    protected function getBlockSuffixes()
    {
        return array(
            str_replace('.', '_', strtolower($this->id)),
            $this->config['tag'],
        );
    }

    protected function getDefaultConfig()
    {
        return array(
            'tag' => 'td',
        );
    }
}
