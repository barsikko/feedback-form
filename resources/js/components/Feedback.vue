<template>
    <v-container >
        <v-row justify="center" align="center">
            <v-col md="4">
                <v-form
                    ref="form"
                    lazy-validation
                >
                    <v-text-field
                        v-model="name"
                        label="Name"
                        :rules="inputRules"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="email"
                        label="E-mail"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="content"
                        label="Content"
                        required
                    ></v-text-field>

                    <v-select
                        v-model="database"
                        :items="[ 's3', 'default']"
                        label="Database"
                        required
                    ></v-select>

                    <v-btn
                        color="success"
                        class="mr-4"
                        @click="handleSave"
                    >
                        Save
                    </v-btn>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
</template>

<script lang="ts">
import {ref} from 'vue'
import axios from 'axios'

export default {
    setup(__, ctx) {
        const name = ref<string>('')
        const email = ref<string>('')
        const content = ref<string>('')
        const database = ref<string>('')

        const handleSave = async () => {
            try {
                const response = await axios.post('/api/feedback', {
                    name: name.value,
                    email: email.value,
                    content: content.value,
                    database: database.value,
                })
                console.log(response)
            } catch (e) {
                alert(e)
            }
        }


        return {
            name,
            database,
            email,
            content,
            handleSave,
        }
    },
}
</script>

<style scoped>

</style>
