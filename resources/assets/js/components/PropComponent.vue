<template>
    <div class="container">
        <div class="row justify-content-center">

            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Ссылка</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in urldata">
                        <td>{{ data.title }}</td>
                        <td>{{ data.url }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'urldata'
        ],
        mounted() {
            this.update()
        },
        methods: {
            update: function() {
                console.log(this.urldata)
            }
        }
    }
</script>
