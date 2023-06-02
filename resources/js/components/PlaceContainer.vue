<template>
    <div v-if="loadingPlace" class="flex items-center justify-center h-screen">
        <!-- Show loading state -->
        <div class="flex flex-col justify-center items-center h-64">
            <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-gray-900 dark:border-white"></div>
        </div>
    </div>
    <div v-else>
        <div class="flex flex-col overflow-y-auto max-h-[52rem]">
            <h1 class="mt-6 mb-12 text-5xl font-semibold text-gray-900 dark:text-white mb-4 text-center" v-if="cityName">Places in {{ cityName }}</h1>
            <div class="mt-5">
                <place-section
                    v-for="searchedPlace in searchedPlaceLists"
                    :key="searchedPlace.fsq_id"
                    :id="searchedPlace.fsq_id"
                    :name="searchedPlace.name"
                    :categories="searchedPlace.categories"
                    :location="searchedPlace.location"
                    class="mb-2"
                ></place-section>
            </div>
        </div>
    </div>
</template>

<script>
import PlaceSection from './PlaceSection.vue';

export default
{

    components: {
        'place-section': PlaceSection,
    },

    props: {
        loadingPlace: Boolean,
        cityName: String,
        searchedPlaceLists: Array
    }
}

</script>