pipeline {
    agent any
	stages {
        stage('Dependency'){
            steps{
                    withCredentials([string(credentialsId: 'NVD-API-KEY', variable: 'NVD_API_KEY')]) {
                        dependencyCheck additionalArguments: """
                            -o './'
                            -s './'
                            -f 'XML'
                            --prettyPrint
                            --nvdApiKey \${NVD_API_KEY}
                        """, odcInstallation: 'OWASP Dependency-Check Vulnerabilities'
                    }
                //   archiveArtifacts artifacts: 'dependency-check-report.xml', allowEmptyArchive: false
                // dependencyCheckPublisher pattern: '**/dependency-check-report.xml'
                archiveArtifacts artifacts: 'dependency-check-report.html', allowEmptyArchive: false
                // Publish the HTML report
                publishHTML(target: [
                    reportName : 'Dependency-Check Report',
                    reportDir  : '.',
                    reportFiles: 'dependency-check-report.html',
                    keepAll    : true,
                    alwaysLinkToLastBuild: true,
                    allowMissing: false
                ])
            }   
        }
	    
    }
}