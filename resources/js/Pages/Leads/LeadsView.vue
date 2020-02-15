<template>
    <Layout>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h2>Lead Details</h2></div>
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" v-if="lead.reminders.length > 0">
                        <div class="card-header">
                            <h3>Lead Reminders</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                   class="list-group-item list-group-item-action"
                                   v-for="reminder in lead.reminders"
                                   :key="reminder.id">
                                    <div class="row">
                                        <div class="col-md-6">{{ reminder.reminder }}</div>
                                        <div class="col-md-2">{{ reminder.reminder_date }}</div>
                                        <div class="col-md-2"><strong>{{ reminder.status }}</strong></div>
                                        <div class="col-md-2">
                                             <inertia-link :href="$route('reminder.view', {lead: lead, reminder: reminder})" class="float-right">></inertia-link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" v-else>
                        <div class="card-header">
                            <h3>Lead Reminders</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <inertia-link class="btn btn-primary" :href="$route('reminder.add', {lead: lead})">Add Reminder</inertia-link>
                            </div>
                        </div>
                    </div>
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
    props: {
        leadProp: Object
    },
    created() {
        this.lead = this.leadProp
    },
    methods: {
         async handleSubmit() {
             await this.$inertia.post('/leads/update', this.lead)
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
