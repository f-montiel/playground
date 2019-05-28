<template>
    <div>
        <ul class="list-group">
            <li v-for="(job, index) in jobs" class="list-group-item"  :class="{ active: job.done == 1 }">
                <a @click="changeJobStatus(index, job)" v-model="job.index">
                    {{ job.name }}
                </a>
                <i class="material-icons float-right" @click="delteJob(index, job)">
                    delete
                </i>
            </li>
        </ul>
    </div>
</template>

<script>
  export default {
    props: ['jobs'],
    data(){
        return {

        }
    },
    methods: {
            delteJob(index, job) {
                this.$emit('delete-job', index, job);
            },
            changeJobStatus(index, job) {
                this.$emit('change-job-status', index, job);
            }
        }
  }
</script>
