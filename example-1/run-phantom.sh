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

# read by phpunit_bootstrap.php (options: firefox or phantomjs)
export UNIT_TEST_BROWSER=phantomjs

phpunit tests/

echo "Shutting Down Selenium Server..."
pkill -f 'selenium'

echo "Testing Complete."
