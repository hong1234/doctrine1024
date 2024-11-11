# doctrine1024

## install

git clone https://github.com/hong1234/doctrine1024.git

cd doctrine1024

// C:\HONG\PHPtest\doctrine1024

composer install

## build-in doctrine commands run

php bin/doctrine orm:schema-tool:create

php bin/doctrine orm:schema-tool:update --force

php bin/doctrine orm:schema-tool:drop --force

## custom commands run

php bin/doctrine add-product "<productName>"

php bin/doctrine add-feature <productID> "<featureName>"

php bin/doctrine show-product-list

php bin/doctrine show-product <productID>

// php bin/doctrine hello

## run tests

php ./vendor/bin/phpunit tests