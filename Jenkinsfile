pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Prepare App') {
            steps {
                bat "copy .env.example .env"
                bat "composer install --no-interaction --prefer-dist --optimize-autoloader"
                bat "php artisan key:generate"
            }
        }

//         stage('Unit Tests') {
//             steps {
//                 bat "php artisan test"
//             }
//         }

        stage('Deploy Docker') {
            steps {
                script {
                    //bat "docker-compose down --remove-orphans"
                    //bat "docker-compose up -d --build"
                    bat "docker-compose build --no-cache app"
                    sleep 15
                    //bat "docker exec isi-burger-app php artisan migrate:fresh --seed --force"
                    //bat "docker-compose run --rm app php artisan migrate:fresh --seed --force"
                    bat "docker-compose run --rm app php artisan migrate:fresh --force"
                    bat "docker-compose run --rm app php artisan db:seed --force || echo 'Seeding failed but continuing...'"
                }
            }
        }
    }
}