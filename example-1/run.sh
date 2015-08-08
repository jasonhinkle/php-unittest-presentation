# PHREEZE TEST RUNNER
# This is a test runner script for PHREEZE
# See README for setup instructions
#
clear
echo "Cleaning folders..."
rm ./selenium.log 2> /dev/null
rm -rf ./screenshots 2> /dev/null
mkdir screenshots
echo "Starting Selenium Server..."
java -jar ../selenium/selenium-server-standalone-2.46.0.jar &> selenium.log &
sleep 1
# phpunit tests/AllTests.php
phpunit --coverage-html ./coverage tests/AllTests
echo "Shutting Down Selenium Server..."
pkill -f 'selenium'
echo "Testing Complete."
