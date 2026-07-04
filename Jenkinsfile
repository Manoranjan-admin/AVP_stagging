pipeline {
    agent any

    environment {
        PROJECT_NAME = "ERP-STAGGING-NEW"
        BASE_DIR = "D:\\Xampp-org\\htdocs\\erp-stagging-new"
        RELEASE_DIR = "D:\\Xampp-org\\htdocs\\erp-stagging-new\\releases"
        BACKUP_DIR = "D:\\Xampp-org\\htdocs\\backup"
        PHP = "D:\\Software\\Xampp-Dont Delete\\php\\php.exe"
    }

    stages {

        stage('Checkout') {
            steps {
                echo "Checking out source..."
                checkout scm
            }
        }

        stage('Environment Validation') {
            steps {
                bat """
                echo Checking PHP...
                %PHP% -v

                echo Checking Composer...
                composer -V

                echo Checking Git...
                git --version
                """
            }
        }

        stage('PHP Lint') {
            steps {
                bat """
                echo Running PHP lint...
                for /R %%f in (*.php) do (
                    %PHP% -l "%%f"
                    if errorlevel 1 exit /b 1
                )
                """
            }
        }

        stage('Composer Install') {
            steps {
                bat """
                echo Installing dependencies...
                composer install --no-interaction --prefer-dist --no-progress
                if errorlevel 1 exit /b 1
                """
            }
        }

        stage('Build Artifact') {
            steps {
                bat """
                echo Creating build artifact...

                if exist build\\artifact rmdir /S /Q build\\artifact
                mkdir build\\artifact

                robocopy . build\\artifact /E ^
                 /XD vendor .git logs build releases shared ^
                 /XF config\\exclude.txt Jenkinsfile ^
                 /R:2 /W:2 /NFL /NDL /NP

                set RC=%ERRORLEVEL%

                if %RC% GEQ 8 (
                    echo BUILD FAILED with code %RC%
                    exit /b 1
                )

                echo BUILD SUCCESS
                """
            }
        }

        stage('Create Release Version') {
            steps {
                bat """
                for /f "tokens=1-3 delims=/ " %%a in ("%date%") do (
                    set d=%%c.%%b.%%a
                )

                for /f "tokens=1-2 delims=: " %%a in ("%time%") do (
                    set t=%%a%%b
                )

                set RELEASE_ID=%date%_%time%
                set RELEASE_ID=%RELEASE_ID: =0%
                set RELEASE_ID=%RELEASE_ID::=%
                set RELEASE_ID=%RELEASE_ID:/=.%


                echo %RELEASE_ID% > build\\artifact\\VERSION.txt
                echo RELEASE=%RELEASE_ID% > build\\artifact\\release.info

                echo Created release: %RELEASE_ID%
                """
            }
        }

        stage('Backup Current Release') {
            steps {
                bat """
                echo Backing up current deployment...

                if exist "%BASE_DIR%\\current" (
                    if exist "%BACKUP_DIR%\\current" rmdir /S /Q "%BACKUP_DIR%\\current"
                    robocopy "%BASE_DIR%\\current" "%BACKUP_DIR%\\current" /E /R:2 /W:2
                )
                """
            }
        }

        stage('Deploy') {
            steps {
                bat """
                echo Deploying new release...

                set RELEASE_DIR=%BASE_DIR%\\releases

                for /f %%i in ('dir /b /ad /o-n "%RELEASE_DIR%"') do set LATEST=%%i

                if exist "%BASE_DIR%\\current" rmdir "%BASE_DIR%\\current"

                mklink /D "%BASE_DIR%\\current" "%RELEASE_DIR%\\%LATEST%"

                echo Deployment completed: %LATEST%
                """
            }
        }

        stage('Health Check') {
            steps {
                bat """
                echo Running health check...

                if not exist "%BASE_DIR%\\current\\index.php" (
                    echo HEALTH CHECK FAILED
                    exit /b 1
                )

                echo HEALTH CHECK PASSED
                """
            }
        }

    }

    post {
        success {
            echo "Deployment SUCCESS ✔"
        }

        failure {
            echo "Deployment FAILED ❌ - initiating rollback..."

            bat """
            if exist "%BACKUP_DIR%\\current" (
                if exist "%BASE_DIR%" rmdir /S /Q "%BASE_DIR%"
                robocopy "%BACKUP_DIR%\\current" "%BASE_DIR%" /E /R:2 /W:2
            )
            """
        }

        always {
            echo "Cleaning workspace..."
            cleanWs()
        }
    }
}