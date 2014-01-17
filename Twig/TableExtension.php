<?php

namespace Knp\RadBundle\Twig;

use Knp\RadBundle\Table\TableFactory;

class TableExtension extends \Twig_Extension
{
    public function __construct(TableFactory $tableFactory)
    {
        $this->tableFactory = $tableFactory;
    }

    public function getFunctions()
    {
        return array(
            'knp_table' => new \Twig_Function_Method($this, 'renderTable'),
        );
    }

    public function renderTable($items, array $mapping, array $config = array())
    {
        $table = $this->tableFactory->create($items, $mapping, $config);
        die(var_dump($table));
    }

    public function getName()
    {
        return 'knp_table';
    }
}
