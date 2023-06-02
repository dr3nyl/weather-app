<template>
    <div class="flex scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        <div>
            <div class="h-16 w-16 flex items-center">
                <div>
                    <h2 class="mt-6 text-4xl font-semibold text-gray-900 dark:text-white">{{ temp }}</h2>
                </div>
                <div>
                    <span class="ml-1 font-semibold text-gray-900 dark:text-white">&#8451;</span>
                </div>
            </div>

            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ forecasted }}</h2>
        </div>

        <div>
            <div class="mt-4 ml-5 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Humidity: {{ humidity }}%
                <br>Sea level: {{ seaLevel }} m
                <br>Wind: {{ wind }} km/h
            </div>
        </div>

        <div class="flex flex-grow justify-end">
            <div>
                <p class="w-64 mt-4 text-right text-gray-500 dark:text-gray-400 text-xl leading-relaxed">{{ weatherType }}</p>
            </div>
        </div>
    </div>
</template>

<script>

export default
{

    props: {
        temp: Number,
        seaLevel: Number,
        weatherType: String,
        wind: Number,
        forecasted: String,
        humidity: Number
    }
}

</script>