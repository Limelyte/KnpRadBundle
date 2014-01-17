<?php

namespace Knp\RadBundle\Table;

class TableFactory
{
    public function create($items, array $mapping, array $config = array())
    {
        $config = array_merge($this->getDefaultConfig(), $config);

        $table = new TableView($config['name'], $items, $mapping);

        foreach ($mapping as $key => $label) {
            $node = new NodeView($key, null, array_merge($config, array('label' => $label)));

            $table->addHeader($node);
        }

        foreach ($items as $item) {
            $row = array();

            foreach ($mapping as $key => $label) {
                $node = new NodeView($key, $item, array_merge($config, array('label' => $label)));

                $row[] = $node;
            }

            $table->addRow($row);
        }

        return $table;
    }

    protected function getDefaultConfig()
    {
        return array(
            'name' => '',
        );
    }
}
