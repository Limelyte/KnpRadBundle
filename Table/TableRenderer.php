<?php

namespace Knp\RadBundle\Table;

class TableRenderer
{
    const SIDE_INNER  = 'inner';
    const SIDE_OUTTER = 'outter';

    public function renderNode(NodeViewInterface $node, $themes, $side = TableRenderer::SIDE_OUTTER)
    {
        $vars = $node->getVars();
        $rendering = null;

        if (!empty($vars['name']) && isset($themes[$vars['name']])) {
            $theme = $themes[$vars['name']];

            $rendering = $this->buildRendering($node, $theme, $side);
        }

        if (null === $rendering && isset($themes[''])) {
            $theme = $themes[''];

            $rendering = $this->buildRendering($node, $theme, $side);
        }

        return $rendering;
    }

    public function buildRendering(NodeViewInterface $node, $theme, $side = TableRenderer::SIDE_OUTTER)
    {
        $vars = $node->getVars();

        foreach ($vars['blocks'] as $block) {
            $blockName = sprintf('%s_%s', $block, $side);
            $current = $theme;

            while (false !== $current) {
                if ($current->hasBlock($blockName)) {

                    return $current->renderBlock($blockName, array('node' => $node));
                }
                $current = $current->getParent(array());
            }
        }
    }
}
