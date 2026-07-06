@echo off

echo Cleaning Build Folder...

if exist build (
    rmdir /S /Q build
)

mkdir build

echo Cleanup Complete.

exit /b 0