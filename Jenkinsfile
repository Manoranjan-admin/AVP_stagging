pipeline {

    agent any

    options {
        disableConcurrentBuilds()
        buildDiscarder(logRotator(numToKeepStr: '10'))
        timeout(time: 30, unit: 'MINUTES')
        timestamps()
    }

    environment {

        PROJECT_NAME = 'ERP-STAGGING-NEW'

        DEPLOY_PATH = 'D:/Xampp-org/htdocs/erp-stagging-new'

        BACKUP_PATH = 'D:/Xampp-org/htdocs/backup'

        PHP_PATH = 'D:/Xampp-org/php/php.exe'

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

        stage('Backup') {

            steps {

                bat 'scripts\\backup.bat'

            }

        }

    }

    post {

        success {

            echo 'BUILD SUCCESSFUL'

        }

        failure {

            echo 'BUILD FAILED'

        }

        always {

            cleanWs()

        }

    }

}