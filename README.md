# doctrine1024

## install

git clone https://github.com/hong1234/doctrine1024

cd doctrine1024

// C:\HONG\PHPtest\doctrine1024

composer install

## build-in doctrine commands run

php bin/doctrine orm:schema-tool:drop --force

php bin/doctrine orm:schema-tool:create

## custom commands run

php bin/doctrine add-product "<productName>"

php bin/doctrine product-list

php bin/doctrine add-feature <productID> "<featureName>"

php bin/doctrine hello