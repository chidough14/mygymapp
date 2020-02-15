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
                        Reminder View
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <reminder-form
                               :main-reminder="reminder"
                               :lead="lead"
                               @reminderSubmit="handleFormSubmit"
                               @addNewReminder="handleAddNewReminder">
                            </reminder-form>
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
        lead: Object,
        reminder: Object
    },
    components: {
        Layout, ReminderForm
    },
    methods: {
        handleFormSubmit(postData) {
            console.log('postData', postData);
        },
        handleAddNewReminder(data) {
            const postData =  {
                reminder_id: data.id
            }
            this.$inertia.post(route('reminder.update'), postData)
            //console.log('handleAddNewReminder', postData);
        }

    }
}
</script>

<style>

</style>
