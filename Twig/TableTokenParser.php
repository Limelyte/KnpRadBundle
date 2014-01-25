<?php

namespace Knp\RadBundle\Twig;

use Twig_Token;
use Twig_TokenParser;

class TableTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $stream     = $this->parser->getStream();
        $exprParser = $this->parser->getExpressionParser();

        $expr = $this->parser->getExpressionParser()->parseExpression();
        die(var_dump($expr));
        return null;
    }

    public function getTag()
    {
        return 'table_theme';
    }
}
