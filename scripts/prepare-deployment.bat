@echo off
setlocal EnableDelayedExpansion

echo ==========================================
echo PREPARE DEPLOYMENT STAGE
echo ==========================================
echo.

REM ============================================
REM Load deployment paths
REM ============================================

set "DEPLOY_PATH=%DEPLOY_PATH%"
set "TEMP_DEPLOY_PATH=%TEMP_DEPLOY_PATH%"

echo Deployment Path : %DEPLOY_PATH%
echo Temporary Path  : %TEMP_DEPLOY_PATH%
echo.

REM ============================================
REM Verify deployment directory
REM ============================================

if not exist "%DEPLOY_PATH%" (
    echo [ERROR] Deployment directory not found.
    exit /b 1
)

echo [PASS] Deployment directory exists.

REM ============================================
REM Create temporary deployment directory
REM ============================================

if not exist "%TEMP_DEPLOY_PATH%" (
    mkdir "%TEMP_DEPLOY_PATH%"
)

if errorlevel 1 (
    echo [ERROR] Failed to create temporary deployment directory.
    exit /b 1
)

echo [PASS] Temporary deployment directory ready.

echo.
echo ==========================================
echo PREPARE DEPLOYMENT COMPLETED SUCCESSFULLY
echo ==========================================

exit /b 0