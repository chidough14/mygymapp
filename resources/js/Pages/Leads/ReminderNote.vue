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
                        Add Reminder Note
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Add Note</div>
                        <div class="card-body">
                            <form @submit.prevent="handleAddNote">
                                <div class="form-group">
                                  <label for="note">Note</label>
                                  <textarea class="form-control" name="note" id="note" rows="3" v-model="note"></textarea>
                                  <div v-if="$page.errors.note" class="error">{{ $page.errors.note }}</div>
                                </div>

                                <button type="submit" class="btn btn-primary">Close</button>
                            </form>
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
    props: {
        lead: Object,
        reminder: Object
    },
     components: {
        Layout
    },
    data() {
        return {
            note: ''
        }
    },
    methods: {

        handleAddNote(){
            const postData = {
                reminder_id: this.reminder.id,
                note: this.note
            }

            this.$inertia.post(route('reminder.close'), postData)
        }
    }
}
</script>

<style>

</style>
