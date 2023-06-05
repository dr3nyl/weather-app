<template>
    <div class="flex scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        <div v-if="loadingPhoto" class="flex items-center justify-center h-screen">
            <!-- Show loading state -->
            <div class="flex flex-col justify-center items-center h-64">
                <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-gray-900 dark:border-white"></div>
            </div>
        </div>
        <div v-else class="mr-4">
            <!-- show photo of place -->
            <img :src="photoDetails.prefix + '230x240' + photoDetails.suffix">
        </div>
        <div class="flex flex-col">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ name }}</h2>
            <div class="flex">
                <!-- show category list -->
                <place-category
                    v-for="category in categories"
                    :key="category.id"
                    :name="category.name">
                </place-category>
            </div>
            <!-- show complete address -->
            <p class="text-gray-500 dark:text-gray-400 text-md leading-relaxed mt-3">{{ location.formatted_address }}</p>
            <!-- show locality -->
            <p class="text-gray-500 dark:text-gray-400 text-md leading-relaxed">Near {{ location.locality }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import PlaceCategory from './PlaceCategory.vue';

export default
{

    components: {
        'place-category': PlaceCategory
    },

    props: {
        name: String,
        categories: Array,
        location: Array,
        id: Number
    },

    mounted() {

        this.loadingPhoto = true;
        this.fetchPlacePhoto();
    },

    data() {
        return {
            photoDetails: [],
            loadingPhoto: false
        }
    },

    methods: {
        // get the photo from api
        fetchPlacePhoto()
        {
            axios.get('/api/place/photo/' + this.id)
                .then(response => {
                    this.photoDetails = response.data[1];
                    this.loadingPhoto = false;
                })
                .catch(error => {
                    console.log(error)
                })
        },
    },
}

</script>