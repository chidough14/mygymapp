<template>
    <Layout>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="handleSubmit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="" id="name" class="form-control" placeholder="Enter Name" v-model="lead.name" tab-index="1">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="" id="email" class="form-control" placeholder="Enter Email" v-model="lead.email" tab-index="1">
                                </div>
                                <div class="form-group">
                                    <label for="package">Package</label>
                                    <input type="text" name="package" id="package" class="form-control" placeholder="Enter Package" v-model="lead.interested_package" tab-index="1">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="" id="dob" class="form-control" placeholder="Enter Date of Birth" v-model="lead.dob" tab-index="1">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="" id="phone" class="form-control" placeholder="Enter Phone" v-model="lead.phone" tab-index="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <inertia-link class="btn btn-warning" :href="$route('leads.list')">Back</inertia-link>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout.vue'
export default {
    components: {
        Layout
    },
    methods: {
         async handleSubmit() {
            await this.$inertia.post('/leads/save', this.lead)


        }
    },
    data() {
        return {
            lead: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                interested_package: ''
            }
        }
    }
}
</script>

<style>

</style>
