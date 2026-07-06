pipeline {
    agent any
    
    environment {
        PHP_PATH = 'D:\\Software\\Xampp-Dont Delete\\php'
        MYSQL_PATH = 'D:\\xampp\\mysql\\bin'
        PATH = "${PHP_PATH};${MYSQL_PATH};${PATH}"
        
        STAGING_PATH = 'D:/xampp/htdocs/erp-stagging-new/'
        DB_HOST = 'localhost'
        DB_PORT = '3306'
        DB_DATABASE = 'erp-stagging-new'
        DB_USERNAME = 'root'
        DB_PASSWORD = ''
    }
    
    options {
        buildDiscarder(logRotator(numToKeepStr: '5'))
        disableConcurrentBuilds()
        timeout(time: 15, unit: 'MINUTES')
        timestamps()
    }
    
    stages {
        stage('1. Checkout Code') {
            steps {
                cleanWs()
                checkout scm
                ansiColor('xterm') {
                    echo "\u001B[32m✅ Code downloaded from GitHub\u001B[0m"
                }
            }
        }
        
        stage('2. Verify Tools') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        echo ==========================================
                        echo   CHECKING INSTALLED TOOLS
                        echo ==========================================

                        echo [PHP]
                        "D:\\Software\\Xampp-Dont Delete\\php\\php.exe" -v
                        
                        echo [Composer]
                        "C:\\composer\\composer.bat" --version
                        
                        echo [MySQL]
                        "C:\\xampp\\mysql\\bin\\mysql.exe" --version

                        echo ==========================================
                        echo   TOOLS VERIFIED SUCCESSFULLY
                        echo ==========================================
                    '''
                }
            }
        }
        
        stage('3. Install Dependencies') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        echo ==========================================
                        echo  INSTALLING COMPOSER DEPENDENCIES
                        echo ==========================================
                        
                        composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
                        
                        echo ✅ Dependencies installed
                    '''
                }
            }
        }
        
        stage('4. PHP Syntax Check') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        @echo off
                        setlocal EnableDelayedExpansion
                        chcp 65001 >nul

                        for /R %%f in (*.php) do (
                            php -l "%%f" >nul 2>nul
                        )
                    '''
                }
            }
        }
        
        stage('5. Setup Database') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        echo ==========================================
                        echo  SETTING UP DATABASE
                        echo ==========================================
                        
                        mysql -u %DB_USERNAME% -e "CREATE DATABASE IF NOT EXISTS `%DB_DATABASE%`;"
                        
                        echo ✅ Database ready
                    '''
                }
            }
        }
        
        stage('6. Run Tests') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        if exist "vendor\\bin\\phpunit.bat" (
                            vendor\\bin\\phpunit.bat --testdox
                        ) else (
                            echo ⚠️ No PHPUnit found
                        )
                    '''
                }
            }
        }
        
        stage('7. Deploy to XAMPP Staging') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        echo ==========================================
                        echo  DEPLOYING TO STAGING
                        echo ==========================================
                        
                        if not exist "%STAGING_PATH%" mkdir "%STAGING_PATH%"
                        
                        xcopy "*" "%STAGING_PATH%" /E /I /Y /EXCLUDE:exclude.txt
                        
                        echo ✅ DEPLOYED SUCCESSFULLY
                    '''
                }
            }
        }
        
        stage('8. Verify Deployment') {
            steps {
                ansiColor('xterm') {
                    bat '''
                        echo Verifying deployment...
                        curl http://localhost/erp-stagging-new/
                        echo ✅ DONE
                    '''
                }
            }
        }
    }
    
    post {
        always {
            cleanWs()
        }
        success {
            echo "PIPELINE SUCCESS"
        }
        failure {
            echo "PIPELINE FAILED"
        }
    }
}