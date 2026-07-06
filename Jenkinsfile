pipeline {

    agent any

    options {
        disableConcurrentBuilds()
        buildDiscarder(logRotator(numToKeepStr: '10'))
        timeout(time: 30, unit: 'MINUTES')
        timestamps()
    }

    environment {
        PROJECT_NAME = 'AVP-stagging'
        DEPLOY_PATH  = 'D:/Xampp-Dont Delete/htdocs/AVP-stagging'
        BACKUP_PATH  = 'D:/Xampp-Dont Delete/htdocs/backup'
        PHP_PATH     = 'D:/Xampp-Dont Delete/php/php.exe'
    }

    stages {

        stage('Initialize') {
            steps {
                echo "========================================"
                echo "ERP STAGING CI/CD PIPELINE"
                echo "========================================"

                echo "Project   : ${PROJECT_NAME}"
                echo "Build     : ${BUILD_NUMBER}"
                echo "Workspace : ${WORKSPACE}"
                echo "Node      : ${NODE_NAME}"
            }
        }

        stage('Checkout Source') {
            steps {
                checkout scm
            }
        }

        stage('Verify Environment') {
            steps {
                bat 'git --version'
                bat 'php -v'
                bat 'composer --version'
            }
        }

        stage('Composer Install') {
            steps {
                bat 'composer install --no-dev --prefer-dist --optimize-autoloader'
            }
        }

        stage('PHP Lint') {
            steps {
                bat 'scripts\\php-lint.bat'
            }
        }

        stage('Build Package') {
            steps {
                bat 'scripts\\build-package.bat'
            }
        }

        stage('Verify Artifact') {
            steps {
                bat 'scripts\\verify.bat'
            }

        }

        stage('Backup') {
            steps {
                bat 'scripts\\backup.bat'
            }
        }

        stage('Enable Maintenance Mode') {
            steps {
                bat 'scripts\\maintenance-on.bat'
            }
        }

        stage('Deploy (Phase 1)') {

            steps {

                 bat 'scripts\\deploy.bat'

            }

       }

       stage('Verify Deployment') {

            steps {

                bat 'scripts\\verify-deployment.bat'

            }

        }

        stage('Disable Maintenance Mode') {
            steps {
                bat 'scripts\\maintenance-off.bat'
            }
        }

    }

    post {

        success {

            archiveArtifacts artifacts: 'build/artifacts/**', fingerprint: true

            echo "========================================"
            echo "BUILD SUCCESSFUL"
            echo "========================================"
        }

        failure {

            echo "========================================"
            echo "BUILD FAILED"
            echo "========================================"
        }

        cleanup {
            cleanWs()
        }
    }
}