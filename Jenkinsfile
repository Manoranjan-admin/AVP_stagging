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

                    props.each { key, value ->
                        env[key] = value
                    }

                    echo "========================================"
                    echo "Configuration Loaded"
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

                bat "\"${env.PHP_PATH}\" \"${env.COMPOSER}\" --version"

            }
        }

        stage('Composer Install') {
            steps {

                bat "\"${env.PHP_PATH}\" \"${env.COMPOSER}\" install --no-dev --prefer-dist --optimize-autoloader"

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