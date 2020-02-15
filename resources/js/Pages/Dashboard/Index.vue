<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <p>This is Dashboard Welcome {{ fname }} {{ lname }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <remider-list :reminders="reminders"></remider-list>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout.vue'
import RemiderList from './ReminderList.vue'
export default {
    components: {
        Layout, RemiderList
    },
    props: ['fname', 'lname', 'reminders']
}
</script>

<style>

</style>
