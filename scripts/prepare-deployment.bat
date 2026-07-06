@echo off
setlocal EnableExtensions EnableDelayedExpansion

echo ==========================================
echo PREPARE DEPLOYMENT STAGE
echo ==========================================
echo.

REM =====================================================
REM Configuration
REM =====================================================

set "PROJECT_NAME=AVP-stagging"

if "%BUILD_NUMBER%"=="" (
    set "BUILD_NUMBER=LOCAL"
)

set "ARTIFACT_DIR=build\artifacts"
set "ARTIFACT_NAME=%PROJECT_NAME%_%BUILD_NUMBER%.zip"
set "ARTIFACT_PATH=%ARTIFACT_DIR%\%ARTIFACT_NAME%"

set "TEMP_DEPLOY=D:\Software\Xampp-Dont Delete\htdocs\deployment-temp"
set "LOG_DIR=logs"

REM =====================================================
REM Create Log Directory
REM =====================================================

if not exist "%LOG_DIR%" mkdir "%LOG_DIR%"

echo ==========================================>>"%LOG_DIR%\prepare-deployment.log"
echo Prepare Deployment : %DATE% %TIME%>>"%LOG_DIR%\prepare-deployment.log"

REM =====================================================
REM Validate Artifact Directory
REM =====================================================

if not exist "%ARTIFACT_DIR%" (
    echo [ERROR] Artifact directory not found.
    exit /b 1
)

echo [PASS] Artifact directory found.

REM =====================================================
REM Artifact Information
REM =====================================================

echo Artifact Name : %ARTIFACT_NAME%
echo Artifact Path : %ARTIFACT_PATH%

REM =====================================================
REM Validate ZIP
REM =====================================================

if not exist "%ARTIFACT_PATH%" (
    echo [ERROR] Artifact ZIP not found.
    exit /b 1
)

echo [PASS] Artifact ZIP found.

REM =====================================================
REM Clean Deployment Temp
REM =====================================================

if exist "%TEMP_DEPLOY%" (
    echo Cleaning deployment-temp...
    rmdir /S /Q "%TEMP_DEPLOY%"
)

mkdir "%TEMP_DEPLOY%"

if not exist "%TEMP_DEPLOY%" (
    echo [ERROR] Unable to create deployment-temp.
    exit /b 1
)

echo [PASS] deployment-temp ready.

REM =====================================================
REM Extract ZIP
REM =====================================================

echo.
echo Extracting deployment package...

powershell -NoProfile -ExecutionPolicy Bypass -Command ^
"Expand-Archive -LiteralPath '%ARTIFACT_PATH%' -DestinationPath '%TEMP_DEPLOY%' -Force"

if errorlevel 1 (
    echo [ERROR] Failed to extract artifact.
    exit /b 1
)

echo [PASS] Extraction completed.

REM =====================================================
REM Verify Extraction
REM =====================================================

if not exist "%TEMP_DEPLOY%\index.php" (
    echo [ERROR] index.php missing after extraction.
    exit /b 1
)

if not exist "%TEMP_DEPLOY%\vendor" (
    echo [ERROR] vendor folder missing after extraction.
    exit /b 1
)

echo [PASS] Deployment package verified.

echo.
echo ==========================================
echo PREPARE DEPLOYMENT COMPLETED SUCCESSFULLY
echo ==========================================

echo SUCCESS>>"%LOG_DIR%\prepare-deployment.log"

exit /b 0