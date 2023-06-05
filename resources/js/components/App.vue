<template>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="mx-auto p-6 lg:p-8">
            <!-- select component -->
            <drop-down @selected-city="selectedCity"></drop-down>
            <!-- weather and place component -->
            <div class="mt-14 flex flex-row gap-6 lg:gap-8">
                <weather-container
                    :cityName="cityName"
                    :weatherLists="weatherLists"
                    :loadingWeather="loadingWeather">
                </weather-container>
                <place-container
                    :cityName="cityName"
                    :searchedPlaceLists="searchedPlaceLists"
                    :loadingPlace="loadingPlace">
                </place-container>
            </div>
        </div>
    </div>
</template>

<script>
// axios
import axios from 'axios';
// components
import DropDown from './DropDown.vue';
import WeatherContainer from './WeatherContainer.vue';
import PlaceContainer from './PlaceContainer.vue';

export default
{

    components: {
        'drop-down': DropDown,
        'weather-container': WeatherContainer,
        'place-container': PlaceContainer
    },

    data() {
        return {
            loadingWeather: false,
            loadingPlace: false,
            city: '',
            cityName: '',
            weatherLists: [],
            searchedPlaceLists: []
        }
    },
    
    methods: {
        selectedCity(value)
        {
            if (value != '') {
                this.city = value;
                this.loadingWeather = true;
                this.loadingPlace = true;
                this.fetchWeather();
                this.extractCityName();
                this.fetchSearchedPlace();
            } else {
                this.cityName = '';
                this.weatherLists = [];
                this.searchedPlaceLists = [];
            }
            
        },

        fetchWeather()
        {
            axios.get('/api/weather/' + this.city)
                .then(response => {
                    this.weatherLists = response.data.list;
                    this.loadingWeather = false;
                })
                .catch(error => {
                    console.log(error)
                })
        },

        fetchSearchedPlace()
        {
            axios.get('/api/place/search/' + this.city)
                .then(response => {
                    this.searchedPlaceLists = response.data.results;
                    this.loadingPlace = false;
                })
                .catch(error => {
                    console.log(error)
                })
        },

        extractCityName() 
        {
            const parts = this.city.split(',');
            const cityName = parts[0].trim();
            this.cityName = cityName.charAt(0).toUpperCase() + cityName.slice(1);
        }
    },
}

</script>

<style scoped>
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>