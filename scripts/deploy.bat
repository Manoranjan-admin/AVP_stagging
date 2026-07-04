@echo off
setlocal EnableDelayedExpansion

echo ===============================================
echo          ERP DEPLOYMENT SCRIPT
echo ===============================================
echo.

:: -------------------------------------------------
:: Configuration
:: -------------------------------------------------

set SOURCE=D:\JenkinsWorkspace
set DESTINATION=D:\Xampp-org\htdocs\erp-stagging-new

echo Source      : %SOURCE%
echo Destination : %DESTINATION%

echo.

echo Deployment Script Ready.

pause