<template>
    <div v-if="loadingWeather" class="flex items-center justify-center h-screen">
        <!-- Show loading state -->
        <div class="flex flex-col justify-center items-center h-64">
            <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-gray-900 dark:border-white"></div>
        </div>
    </div>
    <div v-else>
        <div class="flex flex-col overflow-y-auto max-h-[52rem]">
            <h1 class="mt-6 text-5xl font-semibold text-gray-900 dark:text-white mb-4 text-center" v-if="cityName">Weather in {{ cityName }}</h1>
            <div>
                <div v-for="(weatherGroup, date) in weatherLists" :key="date">
                    <h1 class="mt-6 text-3xl text-gray-900 dark:text-slate-200 underline">{{ date }}</h1>
                    <weather-section
                        v-for="weather in weatherGroup"
                        :key="weather.id"
                        :temp="weather.temp"
                        :sea-level="weather.sea_level"
                        :weather-type="weather.weather_type"
                        :wind="weather.wind"
                        :forecasted="weather.forecasted"
                        :humidity="weather.humidity"
                        class="mb-2"
                    ></weather-section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import WeatherSection from './WeatherSection.vue';

export default
{
    components: {
        'weather-section': WeatherSection,
    },
    props: {
        loadingWeather: Boolean,
        cityName: String,
        weatherLists: Object
    }
}

</script>