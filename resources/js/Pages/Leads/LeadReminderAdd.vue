<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <inertia-link :href="$route('leads.list')">Leads</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        <inertia-link :href="$route('leads.view', {lead: lead})">Lead Details</inertia-link>
                        <span class="breadcrumb-sep">/</span>
                        Add Reminder
                    </h1>
                </div>
            </div>

          <!--   <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Reminder</div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="reminder">Reminder</label>
                                    <textarea name="reminder" id="reminder" class="form-control" v-model="reminder.reminder"></textarea>
                                     <div v-if="$page.errors.reminder" class="error">{{ $page.errors.reminder[0] }}</div>
                                </div>

                                <div class="form-group">
                                   <label for="date">Reminder Date</label>
                                   <input name="date" type="date" v-model="reminder.reminder_date" id="date" class="form-control">
                                   <div v-if="$page.errors.reminder_date" class="error">{{ $page.errors.reminder_date[0] }}</div>
                                </div>

                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Reminder</div>
                        <div class="card-body">
                            <reminder-form :main-reminder="reminder" :lead="lead" @reminderSubmit="handleSubmit"></reminder-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout.vue'
import ReminderForm from './ReminderForm.vue'
export default {
    props: {
        lead: Object
    },
    components: {
        Layout, ReminderForm
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            }
        }
    },
    methods: {
         handleSubmit(postData) {
            /* const postData = {
                 reminder: this.reminder.reminder,
                 reminder_date: this.reminder.reminder_date,
                 lead_id: this.lead.id
            }

           this.$inertia.post(route('reminder.save'), postData) */
           postData.lead_id = this.lead.id
            //console.log(postData);
           this.$inertia.post(route('reminder.save'), postData)
        }
    }
}
</script>

<style>

</style>
