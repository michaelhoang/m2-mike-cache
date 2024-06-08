# m2-mike-cache
``mike/cache``
## Main Functionalities
This is a module support customer private data in full page cache mode

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

- Unzip the zip file in `app/code/Mike`
- Enable the module by running `php bin/magento module:enable Mike_Cache`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

### How to use:
- Applied only logged in user (customer)
  + copy private data to registry before cleared by Magento (in FPC mode)
  + then developer can use private data (using registry) even private data cleared
  + use `\Mike\Cache\Helper\Customer::getCustomerIdFromRegistry` instead of `$this->customerSession->getCustomerId()`
