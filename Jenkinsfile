pipeline {
    agent any

    environment {
        PROJECT_NAME = "ERP-STAGGING-NEW"
        DEPLOY_PATH = "D:\\Xampp-org\\htdocs\\erp-stagging-new"
        BACKUP_PATH = "D:\\Xampp-org\\htdocs\\backup"
        BUILD_PATH = "build\\artifact"
        PHP_HOME = "D:\\Software\\Xampp-Dont Delete\\php"
        COMPOSER_PATH = "C:\\composer\\composer.phar"
    }

    stages {

        stage('Checkout') {
            steps {
                echo "Checking out source code..."
                checkout scm
            }
        }

        stage('Validate Environment') {
            steps {
                echo "Validating PHP and Composer..."

                bat """
                %PHP_HOME%\\php.exe -v
                %PHP_HOME%\\php.exe -m
                """
            }
        }

        stage('Composer Install') {
            steps {
                echo "Installing dependencies (locked)..."

                bat """
                %PHP_HOME%\\php.exe %COMPOSER_PATH% install --no-interaction --prefer-dist
                """
            }
        }

        stage('PHP Lint') {
            steps {
                echo "Running PHP syntax check..."

                bat """
                for /R %%f in (*.php) do (
                    %PHP_HOME%\\php.exe -l "%%f"
                )
                """
            }
        }

        stage('Build Artifact') {
            steps {
                echo "Creating build artifact..."

                bat """
                if exist build\\artifact rmdir /S /Q build\\artifact
                mkdir build\\artifact

                xcopy /E /I /Y . build\\artifact ^
                /EXCLUDE:config\\exclude.txt
                """
            }
        }

        stage('Backup Current Deployment') {
            steps {
                echo "Backing up current deployment..."

                bat """
                if exist %BACKUP_PATH%\\current (
                    rmdir /S /Q %BACKUP_PATH%\\current
                )

                xcopy /E /I /Y %DEPLOY_PATH% %BACKUP_PATH%\\current
                """
            }
        }

        stage('Deploy') {
            steps {
                echo "Deploying artifact to production path..."

                bat """
                if exist %DEPLOY_PATH% (
                    rmdir /S /Q %DEPLOY_PATH%
                )

                xcopy /E /I /Y build\\artifact %DEPLOY_PATH%
                """
            }
        }

        stage('Health Check') {
            steps {
                echo "Running health check..."

                bat """
                curl -I http://localhost/erp-stagging-new/index.php
                """
            }
        }
    }

    post {

        success {
            echo "Deployment SUCCESS ✔"
        }

        failure {
            echo "Deployment FAILED ❌ - rolling back..."

            bat """
            if exist %BACKUP_PATH%\\current (
                if exist %DEPLOY_PATH% (
                    rmdir /S /Q %DEPLOY_PATH%
                )
                xcopy /E /I /Y %BACKUP_PATH%\\current %DEPLOY_PATH%
            )
            """
        }

        always {
            echo "Cleaning workspace..."
            cleanWs()
        }
    }
}