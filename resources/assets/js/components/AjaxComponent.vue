<template>
    <div class="container">
        <div class="row">
            <!-- v-on:click = @click -->
            <button @click="update" class="btn btn-default text mb-1" v-if="!is_refresh">Обновить {{ id }}</button>
            <span class="badge badge-primary mb-1" v-if="is_refresh">..........................</span>

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
        data: function(){
          return {
              urldata: [],
              is_refresh: false,
              id: 0
          }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function() {
                this.is_refresh = true
                axios.get('/start/json').then((response) => {
                    console.log(response)
                    this.urldata = response.data
                    this.is_refresh = false
                this.id++
                });
            }
        }
    }
</script>
