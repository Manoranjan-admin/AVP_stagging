@echo off
setlocal EnableDelayedExpansion

REM ==========================================
REM Safe Deployment
REM ==========================================

echo.
echo ==========================================
echo DEPLOYING APPLICATION
echo ==========================================

REM ------------------------------------------
REM Paths
REM ------------------------------------------

set "TEMP_DEPLOY=D:\Xampp-org\htdocs\deployment-temp"
set "DEPLOY_PATH=D:\Xampp-org\htdocs\erp-stagging-new"
set "LOG_DIR=logs"

REM ------------------------------------------
REM Create Log Folder
REM ------------------------------------------

if not exist "%LOG_DIR%" (
    mkdir "%LOG_DIR%"
)

echo Deploy Start : %DATE% %TIME%>>"%LOG_DIR%\deployment.log"

echo.
echo ==========================================
echo VERIFYING DEPLOYMENT SOURCE
echo ==========================================

REM ------------------------------------------
REM Verify deployment-temp exists
REM ------------------------------------------

if not exist "%TEMP_DEPLOY%" (

    echo.
    echo [ERROR] Deployment source not found.
    echo Expected:
    echo %TEMP_DEPLOY%

    echo Deployment Source Missing>>"%LOG_DIR%\deployment.log"

    exit /b 1
)

echo [PASS] Deployment source found.

REM ------------------------------------------
REM Verify destination exists
REM ------------------------------------------

if not exist "%DEPLOY_PATH%" (

    echo.
    echo Destination not found.
    echo Creating...

    mkdir "%DEPLOY_PATH%"
)

echo [PASS] Deployment destination ready.

echo.
echo ==========================================
echo COPYING FILES
echo ==========================================

robocopy "%TEMP_DEPLOY%" "%DEPLOY_PATH%" /E /COPY:DAT /R:2 /W:2 /NFL /NDL

set RC=%ERRORLEVEL%

echo Robocopy Exit Code : %RC%>>"%LOG_DIR%\deployment.log"

REM ------------------------------------------
REM Robocopy Exit Codes
REM 0 = Nothing copied
REM 1 = Files copied
REM 2-7 = Success with extras
REM >=8 = Failure
REM ------------------------------------------

if %RC% GEQ 8 (

    echo.
    echo [ERROR] Deployment Failed.

    echo Deployment Failed>>"%LOG_DIR%\deployment.log"

    exit /b 1
)

echo.
echo [PASS] Files copied successfully.

echo Deployment Successful>>"%LOG_DIR%\deployment.log"

echo.
echo ==========================================
echo DEPLOYMENT COMPLETED SUCCESSFULLY
echo ==========================================

exit /b 0