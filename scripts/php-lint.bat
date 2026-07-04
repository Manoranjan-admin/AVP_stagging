@echo off
echo ================================
echo PHP LINT VALIDATION (ENTERPRISE MODE)
echo ================================

set BASE_DIR=%cd%
set EXCLUDE_FILE=config\exclude.txt

for /R %%f in (*.php) do (

    set SKIP=0

    for /F "tokens=*" %%e in (%EXCLUDE_FILE%) do (
        echo %%f | findstr /i "%%e" >nul
        if not errorlevel 1 set SKIP=1
    )

    if !SKIP! EQU 0 (
        php -l "%%f"
        if errorlevel 1 exit /b 1
    )
)

echo PHP LINT COMPLETED SUCCESSFULLY
exit /b 0