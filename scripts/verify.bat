@echo off
setlocal EnableDelayedExpansion

echo ==========================================
echo VERIFY ARTIFACT STAGE
echo ==========================================

set "ARTIFACT_DIR=build\artifacts"
set "ZIP_FILE=%ARTIFACT_DIR%\AVP-stagging_%BUILD_NUMBER%.zip"

echo.
echo Verifying build artifacts...
echo.

REM ----------------------------
REM Verify ZIP
REM ----------------------------
if exist "%ZIP_FILE%" (
    echo [PASS] ZIP File Found
) else (
    echo [FAIL] ZIP File Missing
    exit /b 1
)

REM ----------------------------
REM Verify Manifest
REM ----------------------------
if exist "%ARTIFACT_DIR%\manifest.txt" (
    echo [PASS] Manifest Found
) else (
    echo [FAIL] Manifest Missing
    exit /b 1
)

REM ----------------------------
REM Verify SHA256
REM ----------------------------
if exist "%ARTIFACT_DIR%\checksum.sha256" (
    echo [PASS] Checksum Found
) else (
    echo [FAIL] Checksum Missing
    exit /b 1
)

REM ----------------------------
REM Verify Latest
REM ----------------------------
if exist "%ARTIFACT_DIR%\latest.txt" (
    echo [PASS] latest.txt Found
) else (
    echo [FAIL] latest.txt Missing
    exit /b 1
)

echo.
echo ==========================================
echo ARTIFACT VERIFICATION SUCCESSFUL
echo ==========================================

exit /b 0