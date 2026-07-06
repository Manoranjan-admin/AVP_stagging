@echo off
setlocal

echo.
echo ==========================================
echo ENABLE MAINTENANCE MODE
echo ==========================================

:: Deployment folder
set "DEPLOY_PATH=D:\Software\Xampp-Dont Delete\htdocs\AVP-stagging"

:: Check deployment folder
if not exist "%DEPLOY_PATH%" (
    echo [ERROR] Deployment path not found.
    echo Path: %DEPLOY_PATH%
    exit /b 1
)

:: Copy maintenance page
copy /Y "scripts\maintenance.html" "%DEPLOY_PATH%\maintenance.html" >nul

if errorlevel 1 (
    echo [ERROR] Failed to copy maintenance.html
    exit /b 1
)

echo [PASS] maintenance.html copied.
echo Maintenance Enabled

exit /b 0