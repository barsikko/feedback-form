<template>
    <v-form
        ref="form"
        v-model="valid"
        lazy-validation
    >
        <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Name"
            required
        ></v-text-field>

        <v-text-field
            v-model="email"
            :rules="emailRules"
            label="E-mail"
            required
        ></v-text-field>

        <v-text-field
            v-model="content"
            :rules="ContetnRules"
            label="Content"
            required
        ></v-text-field>

        <v-select
            v-model="database"
            :items="items"
            :rules="[v => !!v || 'Database is required']"
            label="Database"
            required
        ></v-select>

        <v-btn
            :disabled="!valid"
            color="success"
            class="mr-4"
            @click="save"
        >
            Save
        </v-btn>
    </v-form>
</template>

<script lang="ts">
import { ref } from 'vue'

export default {
    setup() {
        const name = ref<string>('');
        console.log(name);
    }
}
</script>

<style scoped>

</style>
