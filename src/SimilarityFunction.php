<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 1.0.0
 */

namespace Flexic\DoctrinePGSimilarity;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\Lexer;

final class SimilarityFunction extends FunctionNode
{
    private Node|string $fieldExpression;

    private Node|string $valueExpression;

    public function parse(
        \Doctrine\ORM\Query\Parser $parser,
    ): void {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->fieldExpression = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->valueExpression = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(
        \Doctrine\ORM\Query\SqlWalker $sqlWalker,
    ): string {
        return \sprintf(
            'SIMILARITY(%s, %s)',
            $this->parseExpression($this->fieldExpression, $sqlWalker),
            $this->parseExpression($this->valueExpression, $sqlWalker),
        );
    }

    private function parseExpression(
        Node|string $expression,
        \Doctrine\ORM\Query\SqlWalker $sqlWalker,
    ): string {
        if (\is_string($expression)) {
            return $expression;
        }

        return $this->fieldExpression->dispatch(
            $sqlWalker,
        );
    }
}
