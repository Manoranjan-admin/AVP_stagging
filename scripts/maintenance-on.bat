@echo off
setlocal

echo.
echo ==========================================
echo ENABLE MAINTENANCE MODE
echo ==========================================

set "DEPLOY_PATH=D:\Xampp-Dont Delete\htdocs\AVP-stagging"

if not exist "%DEPLOY_PATH%" (
    echo [ERROR] Deployment path not found.
    exit /b 1
)

copy /Y "scripts\maintenance.html" "%DEPLOY_PATH%\maintenance.html" >nul

echo [PASS] maintenance.html copied.

echo Maintenance Enabled

exit /b 0