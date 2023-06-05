# Weather App

## Introduction
The Weather App is a Laravel and Vue.js application that provides real-time weather information and nearby places for cities in Japan. This app utilizes external APIs to fetch weather data and location information.

## Features

### 1. City Selection and Weather Display
Upon launching the app, users are presented with a dropdown menu where they can select a city in Japan. Once a city is selected, the app fetches the current weather data for that city and displays it in a visually appealing manner. Users can easily switch between cities to view the weather conditions in different locations.

### 2. Nearby Places Information
In addition to weather data, the app also provides information about places of interest near the selected city. These places can include pubs, parks, restaurants, and more. The app leverages external APIs to gather this data and presents it in a user-friendly format, allowing users to explore and discover nearby attractions.

### 3. Loading Component
To enhance the user experience, the Weather App includes a loading component that appears whenever the app is fetching data from external APIs. This ensures that users are aware that data is being retrieved and provides feedback on the progress of the operation. The loading component helps prevent user frustration by indicating that the app is actively working to fetch the requested information.

## Setup
To set up the Weather App, follow the instructions below:

1. Clone the repository to your local machine.
2. Ensure you have Docker installed and running.
3. Navigate to the project directory.
4. Build the Docker containers using the `docker-compose` command:
