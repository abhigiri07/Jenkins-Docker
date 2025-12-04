pipeline {
    agent any

    environment {
        DOCKERHUB = "abhigiri07"      // your Docker Hub username
        IMAGE = "jenkinsdocker"        // your Docker Hub repository name
        EC2_USER = "ubuntu"           
        EC2_HOST = "52.201.238.55"     
    }

    triggers {
        githubPush()
    }
 
    stages {

        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/abhigiri07/Jenkins-Docker.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build -t ${DOCKERHUB}/${IMAGE}:latest ."
                }
            }
        }

        stage('Login to Docker Hub') {
            steps {
                script {
                    withCredentials([usernamePassword(credentialsId: 'dockerhub', usernameVariable: 'USER', passwordVariable: 'PASS')]) {
                        sh """
                        echo $PASS | docker login -u $USER --password-stdin
                        """
                    }
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    sh "docker push ${DOCKERHUB}/${IMAGE}:latest"
                }
            }
        }

        stage('Deploy to EC2') {
            steps {
                script {
                    withCredentials([sshUserPrivateKey(credentialsId: 'ec2key', keyFileVariable: 'SSH_KEY')]) {
                        sh """
                        ssh -o StrictHostKeyChecking=no -i ${SSH_KEY} ${EC2_USER}@${EC2_HOST} '
                            cd /home/ubuntu/app &&
                            ./deploy.sh
                        '
                        """
                    }
                }
            }
        }
    }

    post {
        success {
            echo "Deployment Successful!"
        }
        failure {
            echo "Deployment Failed — Check Console Output."
        }
    }
}
