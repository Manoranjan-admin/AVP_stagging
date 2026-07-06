@echo off
setlocal EnableDelayedExpansion

echo ===============================================
echo          ERP ROLLBACK SCRIPT
echo ===============================================
echo.

:: ------------------------------------------------
:: Configuration
:: ------------------------------------------------
set PROJECT_PATH=D:\Xampp-org\htdocs\erp-stagging-new
set BACKUP_ROOT=D:\Xampp-org\htdocs\backup
set LOG_DIR=D:\Xampp-org\htdocs\logs
set LOG_FILE=%LOG_DIR%\rollback.log

:: ------------------------------------------------
:: Create Log Folder
:: ------------------------------------------------
if not exist "%LOG_DIR%" (
    mkdir "%LOG_DIR%"
)

:: ------------------------------------------------
:: Find Latest Backup
:: ------------------------------------------------
set LATEST_BACKUP=

for /f "delims=" %%i in ('dir "%BACKUP_ROOT%" /ad /b /o-d') do (
    set LATEST_BACKUP=%%i
    goto BackupFound
)

:BackupFound

if "%LATEST_BACKUP%"=="" (
    echo [ERROR] No backup found.

    echo ==============================================>>"%LOG_FILE%"
    echo [%DATE% %TIME%] No backup found.>>"%LOG_FILE%"
    echo ==============================================>>"%LOG_FILE%"

    exit /b 1
)

set BACKUP_PATH=%BACKUP_ROOT%\%LATEST_BACKUP%

echo Latest Backup Found:
echo %BACKUP_PATH%
echo.

:: ------------------------------------------------
:: Validate Backup
:: ------------------------------------------------
if not exist "%BACKUP_PATH%\index.php" (

    echo [ERROR] Backup is invalid.

    echo ==============================================>>"%LOG_FILE%"
    echo [%DATE% %TIME%] Invalid backup.>>"%LOG_FILE%"
    echo ==============================================>>"%LOG_FILE%"

    exit /b 2
)

:: ------------------------------------------------
:: Logging
:: ------------------------------------------------
echo ==============================================>>"%LOG_FILE%"
echo Rollback Started : %DATE% %TIME%>>"%LOG_FILE%"
echo Backup Used      : %BACKUP_PATH%>>"%LOG_FILE%"
echo ==============================================>>"%LOG_FILE%"

echo Restoring application...
echo.

:: ------------------------------------------------
:: Restore Files
:: ------------------------------------------------
robocopy "%BACKUP_PATH%" "%PROJECT_PATH%" /E /R:2 /W:2 /LOG+:"%LOG_FILE%"

set ROBOCOPY_EXIT=%ERRORLEVEL%

echo Robocopy Exit Code : %ROBOCOPY_EXIT%
echo Robocopy Exit Code : %ROBOCOPY_EXIT%>>"%LOG_FILE%"

if %ROBOCOPY_EXIT% GEQ 8 (

    echo.
    echo [ERROR] Rollback Failed.

    echo Rollback Failed>>"%LOG_FILE%"
    echo ==============================================>>"%LOG_FILE%"

    exit /b 3
)

echo.
echo [SUCCESS] Rollback Completed Successfully.

echo Rollback Completed Successfully>>"%LOG_FILE%"
echo ==============================================>>"%LOG_FILE%"

exit /b 0