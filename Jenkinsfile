pipeline {

    agent any

    options {
        disableConcurrentBuilds()
        buildDiscarder(logRotator(numToKeepStr: '10'))
        timeout(time: 30, unit: 'MINUTES')
        timestamps()
    }

    stages {

        stage('Checkout Source') {
            steps {
                checkout scm
            }
        }

        stage('Load Configuration') {
            steps {
                script {

                    def props = readProperties file: 'config/pipeline.properties'

                    env.PROJECT_NAME     = props['PROJECT_NAME']
                    env.DEPLOY_PATH      = props['DEPLOY_PATH']
                    env.BACKUP_PATH      = props['BACKUP_PATH']
                    env.TEMP_DEPLOY_PATH = props['TEMP_DEPLOY_PATH']
                    env.PHP_PATH         = props['PHP_PATH']
                    env.COMPOSER_PATH    = props['COMPOSER_PATH']
                    env.MYSQL_PATH       = props['MYSQL_PATH']
                    env.ENVIRONMENT      = props['ENVIRONMENT']

                    echo "========================================"
                    echo "Configuration Loaded"
                    echo "Project : ${env.PROJECT_NAME}"
                    echo "Environment : ${env.ENVIRONMENT}"
                    echo "========================================"
                }
            }
        }

        stage('Initialize') {
            steps {

                echo "========================================"
                echo "ERP STAGING CI/CD PIPELINE"
                echo "========================================"

                echo "Project      : ${env.PROJECT_NAME}"
                echo "Environment  : ${env.ENVIRONMENT}"
                echo "Build        : ${BUILD_NUMBER}"
                echo "Workspace    : ${WORKSPACE}"
                echo "Node         : ${NODE_NAME}"
            }
        }

        stage('Verify Environment') {
            steps {

                bat "\"${env.PHP_PATH}\" -v"

                bat "\"${env.PHP_PATH}\" \"${env.COMPOSER_PATH}\" --version"

            }
        }

        stage('Composer Install') {
            steps {

                bat "\"${env.PHP_PATH}\" \"${env.COMPOSER_PATH}\" install --no-dev --prefer-dist --optimize-autoloader"

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

        stage('Prepare Deployment') {
            steps {
                bat 'scripts\\prepare-deployment.bat'
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