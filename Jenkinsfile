 pipeline {   
    agent any
    environment {
        DOCKERHUB_CREDENTIALS= credentials('docker-us-pass')
        registry = "renatoapaza/webhotelhub-front"
        registryCredential = 'docker-us-pass'
        dockerImage = ''
    }
    stages {
       stage("Git Checkout"){
           steps{
               //git credentialsId: 'gitlabusuario', url: 'https://gitlab.com/uagrm1/mod5/webhotelhub.git'	           
	           echo 'Git Checkout Completed'            
            }
        }
        stage('Build Docker Image') {            
            steps{                      
                dir('webhotelhub'){
                    script {
                        dockerImage = docker.build registry + ":$BUILD_NUMBER"
                    }
	                //sh 'docker build -t renatoapaza/webhotelhub:$BUILD_NUMBER .'           
                    echo 'Build Image Completed'
                }
            }
        }
        stage('Login to Docker Hub') {          
          steps{
        	  //sh 'docker login -u $DOCKERHUB_CREDENTIALS_USR --password-stdin'
        	  echo 'Login Completed'
            }
        }
        
        // Instalar el plugin: Docker Pipeline
        stage('Push Image to Docker Hub') {                     
            steps{
                script {
                        docker.withRegistry( '', registryCredential ) {
                        dockerImage.push()
                        dockerImage.push("latest")
                    }
                }
                echo 'Push Image Completed'  
            }           
        }
        stage('Cleaning up') {
            steps{
                sh "docker rmi $registry:$BUILD_NUMBER"
            }
        }

        stage('Deploying Container to Kubernetes') {
            steps {
                dir('webhotelhub'){
                    withCredentials(bindings: [string(credentialsId: 'kubernete-jenkis-server-account', variable: 'api_token')]) {
                        sh 'kubectl --token $api_token --server https://192.168.49.2:8443 --insecure-skip-tls-verify=true delete -f deployment-app-front-jenkins.yaml '
                        sh 'kubectl --token $api_token --server https://192.168.49.2:8443 --insecure-skip-tls-verify=true apply -f deployment-app-front-jenkins.yaml '
                    }

                    echo 'Deploying Container to Kubernetes'
                }
            }
        }     
    } //stages 
    post{
        always {  
          sh 'docker logout'           
        }      
    }  
}
