<template>
    <div>
        <ul class="list-group">
            <li v-for="(job, index) in jobs" class="list-group-item"  :class="{ active: job.done == 1 }">
                <a @click="changeJobStatus(index, job)" v-model="job.index">
                    {{ job.name }}
                </a>
                <button class="btn btn-sm btn-danger float-right" @click = "deleteJob(index, job)" >Borrar</button>
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
            deleteJob(index, job) {
                this.$emit('delete-job', index, job);
            },
            changeJobStatus(index, job) {
                this.$emit('change-job-status', index, job);
            }
        }
  }
</script>
