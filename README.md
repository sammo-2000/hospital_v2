# Project Overview

\[This is hospital management system which I have built as part of my year 1 assessment.\]

## How to Run Using Docker

### Step 1: Clone the Repository

Clone this repository to your local machine using the following command:

    git clone https://github.com/sammo-2000/hospital-system

### Step 2: Create SQL Database

You need to create SQL database, the code to create database can be found in file called `hospital-system.sql`

The default database name should be `hospital-system` if you would like to change it please go to `app/model/dbh.php` and type new name in `$dbName`

This would create 2 default users which are

| Username | Password | Role   |
| -------- | -------- | ------ |
| emily    | 12345678 | admin  |
| john     | 12345678 | doctor |

### Step 2: Build Docker Image

Navigate to the project directory and build the Docker image using the provided Dockerfile. Run the following command:

    docker compose up --build

### Step 3: Access the Application

Once the container is running, you can access the application by opening a web browser and navigating to `http://localhost:3000`.

### Additional Notes

You must have docker installed before hand, if you don't have docker installed please go to [docker install](https://docs.docker.com/engine/install/)
