@echo off
setlocal

echo =====================================
echo VERIFY DEPLOYMENT
echo =====================================

if not exist "D:\Xampp-org\htdocs\erp-stagging-new\index.php" (
    echo ERROR: index.php not found.
    exit /b 1
)

if not exist "D:\Xampp-org\htdocs\erp-stagging-new\composer.json" (
    echo ERROR: composer.json not found.
    exit /b 1
)

echo Verification Successful.

exit /b 0