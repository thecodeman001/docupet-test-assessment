Pet Registry App

This repository contains the source code for a Pet Registry App, consisting of a Symfony backend and a Vue.js frontend.
Prerequisites

Before you begin, ensure you have the following installed:

    Docker: [Install Docker](https://docs.docker.com/engine/install/)

Getting Started

    Clone this repository to your local machine: 
        ``git clone https://github.com/your-username/pet-registry-app.git``
    Navigate to the directory
        ``cd docupet-test-assesssment``

Build and run the Docker containers:

bash

docker-compose up --build

This command will build the images and start the containers for both the Symfony backend and Vue.js frontend.

Access the applications:

    Symfony backend: http://localhost:8000
    Vue.js frontend: http://localhost:8080

The Vue.js frontend depends on the Symfony backend, so ensure the backend is up and running before accessing the frontend.

Stop the containers:

When you're done, you can stop the containers by running:

bash

    docker-compose down

Additional Information

    Symfony Backend: The Symfony backend is accessible at http://localhost:8000. You can explore and interact with the API endpoints.

    Vue.js Frontend: The Vue.js frontend is accessible at http://localhost:8080. Open this link in your browser to view and interact with the frontend of the Pet Registry App.

    Dependencies: The Vue.js frontend depends on the Symfony backend, and Docker Compose takes care of setting up the necessary connections.

    Customization: Feel free to customize the Docker configuration and the source code to fit your specific requirements.

Feel free to add any additional information or instructions specific to your application. This README provides a basic setup guide to help users get started with running your Pet Registry App using Docker.
