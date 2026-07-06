@echo off
setlocal

echo ==========================================
echo VERIFY DEPLOYMENT
echo ==========================================

set "DEPLOY_PATH=D:\Xampp-org\htdocs\erp-stagging-new"

echo.

if not exist "%DEPLOY_PATH%\index.php" (
    echo [ERROR] index.php missing.
    exit /b 1
)

if not exist "%DEPLOY_PATH%\vendor\autoload.php" (
    echo [ERROR] vendor\autoload.php missing.
    exit /b 1
)

if not exist "%DEPLOY_PATH%\classes" (
    echo [ERROR] classes folder missing.
    exit /b 1
)

if not exist "%DEPLOY_PATH%\modules" (
    echo [ERROR] modules folder missing.
    exit /b 1
)

if not exist "%DEPLOY_PATH%\includes" (
    echo [ERROR] includes folder missing.
    exit /b 1
)

echo.
echo [PASS] Production deployment verified.

exit /b 0