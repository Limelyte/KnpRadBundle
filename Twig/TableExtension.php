<?php

namespace Knp\RadBundle\Twig;

use Knp\RadBundle\Table\TableFactory;

class TableExtension extends \Twig_Extension
{
    public function __construct(TableFactory $tableFactory)
    {
        $this->tableFactory = $tableFactory;
    }

    public function getTokenParsers()
    {
        return array(
            new TableTokenParser,
        );
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
        $table->compute();

        $rows = $table->getRows();
        $nodes = $rows[10]->getNodes();
        $headers = $table->getHeaders()->getNodes();

        var_dump($headers);
        die(var_dump($table->getVars()));
    }

    public function getName()
    {
        return 'knp_table';
    }
}
