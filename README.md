# MageMontreal Add Stock Qty to GraphQl

    `composer require magemontreal/stock-qty-graph-ql`

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)


## Main Functionalities
Added `stock_qty` to product GraphQl
![image](https://user-images.githubusercontent.com/4007696/134252567-ab20fce9-a0a5-4566-8b68-74d61a620669.png)

Example:
```
{
  products(search: "Black", pageSize: 5) {
    total_count
    items {
      name,
      stock_qty,
      sku
    }
    page_info {
      page_size
      current_page
    }
  }
}
```

## Installation
Run: `composer require magemontreal/stock-qty-graph-ql` and `bin/magento se:up`

### Type 1: Zip file

 - Unzip the zip file in `app/code/MageMontreal/StockQtyGraphQl`
 - Enable the module by running `php bin/magento module:enable MageMontreal_StockQtyGraphQl`
 - Apply database updates by running `php bin/magento setup:upgrade`
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer
 - Install the module composer by running `composer require magemontreal/stock-qty-graph-ql`
 - enable the module by running `php bin/magento module:enable MageMontreal_StockQtyGraphQl`
 - apply database updates by running `php bin/magento setup:upgrade`
 - Flush the cache by running `php bin/magento cache:flush`
 

