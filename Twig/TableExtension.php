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

        $rows = $table->getRows();
        $nodes = $rows[10]->getNodes();
        $headers = $table->getHeaders()->getNodes();

        var_dump($headers[0]->getRenderedBlockNames());
        var_dump($nodes[1]->getRenderedBlockNames());
    }

    public function getName()
    {
        return 'knp_table';
    }
}
