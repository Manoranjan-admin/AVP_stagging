@echo off
setlocal EnableDelayedExpansion

echo ===============================================
echo          ERP BACKUP SCRIPT
echo ===============================================
echo.

:: ------------------------------
:: Configuration
:: ------------------------------
set PROJECT_NAME=AVP-stagging
set PROJECT_PATH=D:\Xampp-Dont Delete\htdocs\AVP-stagging
set BACKUP_ROOT=D:\Xampp-Dont Delete\htdocs\backup

:: ------------------------------
:: Generate Timestamp
:: ------------------------------
for /f %%i in ('powershell -NoProfile -Command "Get-Date -Format yyyy-MM-dd_HH-mm-ss"') do set TIMESTAMP=%%i

set BACKUP_PATH=%BACKUP_ROOT%\%TIMESTAMP%

echo [INFO] Timestamp : %TIMESTAMP%
echo.

:: ------------------------------
:: Create Backup Folder
:: ------------------------------
if not exist "%BACKUP_ROOT%" (
    mkdir "%BACKUP_ROOT%"
)

mkdir "%BACKUP_PATH%"

echo [INFO] Backup Folder Created
echo %BACKUP_PATH%
echo.

:: ------------------------------
:: Copy Project
:: ------------------------------
echo [INFO] Creating Project Backup...
echo.

robocopy "%PROJECT_PATH%" "%BACKUP_PATH%" /E /R:2 /W:2 /XD ".git" ".github" ".vscode" "scripts" "backup" "logs" "build" /XF "Jenkinsfile" ".gitignore" "README.md" /LOG:"%BACKUP_PATH%\backup.log"

:: ------------------------------
:: Check Result
:: ------------------------------
if %ERRORLEVEL% GEQ 8 (
    echo.
    echo [ERROR] Backup Failed.
    exit /b 1
)

echo.
echo [SUCCESS] Backup Completed Successfully.
exit /b 0