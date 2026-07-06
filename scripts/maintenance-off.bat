@echo off
setlocal

echo.
echo ==========================================
echo DISABLE MAINTENANCE MODE
echo ==========================================

set "DEPLOY_PATH=D:\Xampp-org\htdocs\erp-stagging-new"

if exist "%DEPLOY_PATH%\maintenance.html" (

    del /F /Q "%DEPLOY_PATH%\maintenance.html"

    echo [PASS] Maintenance removed.

) else (

    echo Maintenance file already removed.

)

echo Maintenance Disabled

exit /b 0