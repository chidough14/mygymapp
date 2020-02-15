<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h1>Leads</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div>
                        <inertia-link :href="$route('leads.add')" class="btn btn-primary float-right mb-2">Add Lead</inertia-link>
                        <table class="table table-bordered bg-white">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Package</th>
                                    <th>Added On</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="lead in pagLead" :key="lead.id">
                                    <td scope="row">{{ lead.id }}</td>
                                    <td>{{ lead.name }}</td>
                                    <td>{{ lead.email }}</td>
                                    <td>{{ lead.phone }}</td>
                                    <td>{{ lead.age }}</td>
                                    <td>{{ lead.interested_package }}</td>
                                    <td>{{ lead.created_at }}</td>
                                    <td>
                                        <inertia-link :href="$route('leads.view', {lead: lead})">></inertia-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<!-- <paginate
    :page-count="20"
    :page-range="3"
    :margin-pages="2"
    :click-handler="clickCallback"
    :prev-text="'Prev'"
    :next-text="'Next'"
    :container-class="'pagination'"
    :page-class="'page-item'">
  </paginate> -->
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout.vue'
export default {
    components: {
        Layout
    },
    mounted() {
       this.getResults()
       //console.log(this.leads.data);
    },
    data(){
       return {
           pagLead: {}
       }
    },
    methods: {
        getResults(){
            this.pagLead = this.leads
        },

        /* clickCallback(pnum){
            console.log(pnum);
        } */
    },
    props: ['leads']
}
</script>

<style>

</style>
