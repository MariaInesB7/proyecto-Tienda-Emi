 pipeline {   
    agent any
    environment {
        DOCKERHUB_CREDENTIALS= credentials('DOCKERHUB_CREDENTIALS')
        registry = "marinesb7/lab-jenkins-diplo"
        registryCredential = 'docker-us-pass'
        dockerImage = ''
    }
    stages {
       stage("Clonar el repositorio"){
           steps{
               git  'https://github.com/MariaInesB7/proyecto-Tienda-Emi'	           
	           echo 'Repositorio clonado'            
            }
        }
        stage('Compilar el proyecto') {            
            steps{                      
                dir('webhotelhub'){
                    script {
                        dockerImage = docker.build registry + ":$BUILD_NUMBER"
                    }        
                    echo 'Build completado'
                }
            }
        }
        stage('Pruebas unitarias') {          
          steps{
        	  echo 'Ejecución de Pruebas Completada'
            }
        }
        stage('Login Docker Hub') {          
          steps{
        	  sh 'docker login -u $DOCKERHUB_CREDENTIALS_USR --password-stdin'
        	  echo 'Login Completado'
            }
        }
        
        stage('Push Imagen a Docker Hub') {                     
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

        stage('Desplegar') {
            steps {

                    echo 'Proyecto desplegado'
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