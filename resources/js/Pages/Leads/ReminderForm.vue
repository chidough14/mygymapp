<template>
    <div>
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

            <div v-if="reminder.id">
                 <button class="btn btn-primary" @click="handleAddNewReminder">Add Reminder</button>
                 <inertia-link :href="$route('reminder.note', {lead: lead, reminder: mainReminder})" class="btn btn-warning">Close Reminder</inertia-link>
            </div>

            <div v-else>
                <button  class="btn btn-success" @click="handleSubmit">Save</button>
            </div>


    </div>
</template>

<script>
export default {
    props: {
        mainReminder: Object,
        lead: Object
    },
    methods: {
        handleSubmit () {
            this.$emit('reminderSubmit', this.reminder)
        },
        handleAddNewReminder() {
             this.$emit('addNewReminder', this.reminder)
        }
    },
    created() {
        this.reminder = this.mainReminder
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            }
        }
    },
}
</script>

<style>

</style>
