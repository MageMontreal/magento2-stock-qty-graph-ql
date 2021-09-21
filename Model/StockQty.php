<?php
/*
 *  @author Magemontreal <support@magemontreal.com>
 *  @copyright 2021 Magemontreal. All Rights Reserved.
 */

namespace MageMontreal\StockQtyGraphQl\Model;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;

/**
 * Stock Qty Model
 */
class StockQty implements ResolverInterface
{
    private GetSalableQuantityDataBySku $getSalableQuantityDataBySku;

    private ValueFactory $valueFactory;

    /**
     * StockQty constructor.
     * @param GetSalableQuantityDataBySku $getSalableQuantityDataBySku
     * @param ValueFactory $valueFactory
     */
    public function __construct(GetSalableQuantityDataBySku $getSalableQuantityDataBySku, ValueFactory $valueFactory)
    {
        $this->getSalableQuantityDataBySku = $getSalableQuantityDataBySku;
        $this->valueFactory = $valueFactory;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return int
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null): int
    {
        if (!isset($value['model'])) {
            throw new LocalizedException(__('"model" value should be specified'));
        }
        return $this->getStockBySku($value['sku']);
    }

    /**
     * @param string $sku
     * @return int
     */
    protected function getStockBySku(string $sku): int
    {
        $qty = 0;
        $stockData = $this->getSalableQuantityDataBySku->execute($sku);
        foreach ($stockData as $stockInfo) {
            $qty += $stockInfo['qty'];
        }
        return $qty;
    }
}
