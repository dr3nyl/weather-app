<template>
    <div class="flex justify-center">
        <select 
            v-model="city"
            @change="selectedCity"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
            <option value="">Select City</option>
            <option value="tokyo,JP">Tokyo</option>
            <option value="osaka,JP">Osaka</option>
            <option value="kyoto,JP">Kyoto</option>
            <option value="yokohama,JP">Yokohama</option>
            <option value="sapporo,JP">Sapporo</option>
            <option value="nagoya,JP">Nagoya</option>
        </select>
    </div>
</template>

<script>

export default
{

    data() {
        return {
            city: ''
        }
    },

    methods: {
        selectedCity() {
            this.$emit('selected-city', this.city);
        }
    },
}

</script>