#
# PHPUNIT TEST RUNNER
#
clear

echo "Cleaning folders..."
rm -rf ./tests-output 2> /dev/null
mkdir tests-output
mkdir tests-output/screenshots

echo "Starting Selenium Server..."
java -jar ../selenium/selenium-server-standalone-2.47.1.jar &> tests-output/selenium.log &
sleep 1

phpunit --coverage-html ./tests-output/coverage tests/

echo "Shutting Down Selenium Server..."
pkill -f 'selenium'

echo "Testing Complete."

sleep 3
open http://localhost/php-unittest-presentation/example-1/tests-output/coverage/
