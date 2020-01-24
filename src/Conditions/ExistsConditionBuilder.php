<?php

declare(strict_types=1);

namespace Yiisoft\Db\Conditions;

use Yiisoft\Db\Contracts\ExpressionInterface;
use Yiisoft\Db\Contracts\ExpressionBuilderInterface;
use Yiisoft\Db\ExpressionBuilderTrait;

/**
 * Class ExistsConditionBuilder builds objects of {@see ExistsCondition}.
 */
class ExistsConditionBuilder implements ExpressionBuilderInterface
{
    use ExpressionBuilderTrait;

    /**
     * Method builds the raw SQL from the $expression that will not be additionally escaped or quoted.
     *
     * @param ExpressionInterface|ExistsCondition $expression the expression to be built.
     * @param array $params the binding parameters.
     *
     * @return string the raw SQL that will not be additionally escaped or quoted.
     */
    public function build(ExpressionInterface $expression, array &$params = []): string
    {
        $operator = $expression->getOperator();
        $query = $expression->getQuery();

        $sql = $this->queryBuilder->buildExpression($query, $params);

        return "$operator $sql";
    }
}
