@echo off
setlocal EnableDelayedExpansion

echo ==========================================
echo BUILD PACKAGE STAGE
echo ==========================================
echo.

REM =====================================================
REM Configuration
REM =====================================================

set PROJECT_NAME=AVP-stagging

if "%BUILD_NUMBER%"=="" (
    set BUILD_NUMBER=LOCAL
)

set ARTIFACT_DIR=build\artifacts
set ARTIFACT_NAME=%PROJECT_NAME%_%BUILD_NUMBER%.zip
set ARTIFACT_PATH=%ARTIFACT_DIR%\%ARTIFACT_NAME%

echo Project        : %PROJECT_NAME%
echo Build Number   : %BUILD_NUMBER%
echo Artifact Path  : %ARTIFACT_PATH%
echo.

REM =====================================================
REM Create Artifact Directory
REM =====================================================

if not exist "%ARTIFACT_DIR%" (
    echo Creating artifact directory...
    mkdir "%ARTIFACT_DIR%"
)

if not exist "%ARTIFACT_DIR%" (
    echo ERROR: Unable to create artifact directory.
    exit /b 1
)

REM =====================================================
REM Remove Old Artifact
REM =====================================================

if exist "%ARTIFACT_PATH%" (
    del /f /q "%ARTIFACT_PATH%"
)

REM =====================================================
REM Create Deployment ZIP
REM =====================================================

echo Creating deployment package...
echo.

powershell -NoProfile -ExecutionPolicy Bypass ^
"Compress-Archive -Force -DestinationPath '%ARTIFACT_PATH%' -Path 'assets','classes','config','includes','modules','vendor','index.php','composer.json','composer.lock'"

if errorlevel 1 (
    echo.
    echo ERROR: Failed to create deployment package.
    exit /b 1
)

if not exist "%ARTIFACT_PATH%" (
    echo.
    echo ERROR: Artifact ZIP was not created.
    exit /b 1
)

echo ZIP package created successfully.
echo.

REM =====================================================
REM Generate Manifest
REM =====================================================

echo Generating manifest...

(
echo ======================================
echo ERP STAGING BUILD MANIFEST
echo ======================================
echo Project=%PROJECT_NAME%
echo Build=%BUILD_NUMBER%
echo Date=%DATE%
echo Time=%TIME%
echo Computer=%COMPUTERNAME%
echo User=%USERNAME%
)> "%ARTIFACT_DIR%\manifest.txt"

if not exist "%ARTIFACT_DIR%\manifest.txt" (
    echo ERROR: Manifest creation failed.
    exit /b 1
)

echo Manifest created successfully.
echo.

REM =====================================================
REM Generate SHA256
REM =====================================================

echo Generating SHA256 checksum...

certutil -hashfile "%ARTIFACT_PATH%" SHA256 > "%ARTIFACT_DIR%\checksum.sha256"

if errorlevel 1 (
    echo ERROR: Failed to generate checksum.
    exit /b 1
)

if not exist "%ARTIFACT_DIR%\checksum.sha256" (
    echo ERROR: checksum.sha256 was not created.
    exit /b 1
)

echo Checksum created successfully.
echo.

REM =====================================================
REM Generate latest.txt
REM =====================================================

echo Generating latest.txt...

(
echo ======================================
echo LATEST BUILD INFORMATION
echo ======================================
echo Project=%PROJECT_NAME%
echo Build=%BUILD_NUMBER%
echo Artifact=%ARTIFACT_NAME%
echo Date=%DATE%
echo Time=%TIME%
echo Computer=%COMPUTERNAME%
echo Environment=STAGING
)> "%ARTIFACT_DIR%\latest.txt"

if not exist "%ARTIFACT_DIR%\latest.txt" (
    echo ERROR: latest.txt creation failed.
    exit /b 1
)

echo latest.txt created successfully.
echo.


echo ==========================================
echo BUILD PACKAGE COMPLETED SUCCESSFULLY
echo ==========================================

exit /b 0